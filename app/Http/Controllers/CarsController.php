<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\StoreRequest;
use App\Http\Requests\Car\UpdateRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Tag;
use App\Services\AddressParser\ParserInterface;
use App\Services\Enum\Status;
use Dadata\DadataClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( /*ParserInterface $dadata*/ )
    {


//        $dadata = new \Dadata\DadataClient( config( 'dadata.token'), config( 'dadata.secret' ) );

//        $result = $dadata->clean("мск сухонска 11/-89" );
//        dd( $result );

//        dd( Status::DRAFT );

//        $cars = Car::with( 'brand.country', 'tags' )
//            ->orderByDesc( 'created_at' )
//            ->where( 'status', Status::ACTIVE )
//            ->get();

        $cars = Car::active()
            ->with( 'brand.country', 'tags' )
            ->orderByDesc( 'created_at' )
            ->get();

        return view( 'cars.index', compact( 'cars' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transmissions = config( 'app-car.transmissions' );
        $brands = Brand::all()->pluck( 'title', 'id');
        $tags = Tag::all()->pluck( 'title', 'id');

        return view( 'cars.create', compact( 'transmissions', 'brands', 'tags' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $car = null;

        DB::transaction( function() use ( $request, &$car ){
            $tags = $request->get( 'tags' );
            $car = Car::create( $request->except( 'tags' ) );
            $car->tags()->attach( $tags );
        });


        return redirect()->route( 'cars.show', $car->id )
            ->with( 'message', trans( 'notifications.car.created' ) );
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view( 'cars.show', compact( 'car' ) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $transmissions = config( 'app-car.transmissions' );
        $brands = Brand::all()->pluck( 'title', 'id');
        $tags = Tag::all()->pluck( 'title', 'id');

        return view( 'cars.edit', compact( 'car', 'transmissions', 'brands', 'tags' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Car $car)
    {
        DB::transaction( function() use ( $request, &$car ){
            $tags = $request->get( 'tags' );
            $car->update( $request->except( 'tags' ) );
            $car->tags()->sync( $tags );
        });

        return redirect()->route( 'cars.show', $car->id )
            ->with( 'message', trans( 'notifications.car.updated' ) );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if( $car->cantDelete )
        {
            return redirect()->back()
                ->with( 'message', trans( 'Cant delete' ) );
        }

        $car->delete();

        return redirect()->back()
            ->with( 'message', trans( 'notifications.car.deleted' ) );
    }

    public function trashed()
    {
        $cars = Car::onlyTrashed()->get();

        return view( 'cars.trashed', compact( 'cars' ) );
    }

    public function forceDelete(Car $car)
    {
        $car->forceDelete();

        return redirect()->back()
            ->with( 'message', trans( 'notifications.car.deleted' ) );
    }

    public function restore(Car $car)
    {
        if( Car::where( 'vin', $car->vin )->get()->count() )
        {
            return redirect()->back()
                ->with( 'message', trans( 'notifications.car.vin-fail-restore', [ 'vin' => $car->vin ] ) );
        }

        $car->restore();

        return redirect()->back()
            ->with( 'message', trans( 'notifications.car.restored' ) );
    }
}
