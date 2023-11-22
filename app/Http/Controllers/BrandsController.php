<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brand\StoreRequest;
use App\Http\Requests\Brand\UpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::with( 'country' )->get();

        return view( 'brands.index', compact( 'brands' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transmissions = config( 'app-brand.transmissions' );

        return view( 'brands.create', compact( 'transmissions' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $brand = Brand::create( $request->validated() );

        return redirect()->route( 'brands.show', $brand->id )
            ->with( 'message', trans( 'notifications.brand.created' ) );
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view( 'brands.show', compact( 'brand' ) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $transmissions = config( 'app-brand.transmissions' );

        return view( 'brands.edit', compact( 'brand', 'transmissions' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Brand $brand)
    {
        $brand->update( $request->validated() );

        return redirect()->route( 'brands.show', $brand->id )
            ->with( 'message', trans( 'notifications.brand.updated' ) );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->back();
    }

    public function trashed()
    {
        $brands = Brand::onlyTrashed()->get();

        return view( 'brands.trashed', compact( 'brands' ) );
    }

    public function forceDelete(Brand $brand)
    {
        $brand->forceDelete();

        return redirect()->back()
            ->with( 'message', trans( 'notifications.brand.deleted' ) );
    }

    public function restore(Brand $brand)
    {
//        if( Brand::where( 'vin', $brand->vin )->get()->count() )
//        {
//            return redirect()->back()
//                ->with( 'message', trans( 'notifications.brand.vin-fail-restore', [ 'vin' => $brand->vin ] ) );
//        }

        $brand->restore();

        return redirect()->back()
            ->with( 'message', trans( 'notifications.brand.restored' ) );
    }
}
