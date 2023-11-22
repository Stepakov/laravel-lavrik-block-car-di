<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CarsConotroller extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view( 'public.cars.index', compact( 'cars' ) );
    }

    public function show( Car $car )
    {
        return view( 'public.cars.show', compact( 'car' ) );
    }
}
