<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Public\CarsConotroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get( 'secret', function(){
    return 'secret page';
})->middleware( [ 'auth', 'verified' ]);

Route::middleware( [ 'auth' ] )->prefix( 'admin' )->group( function(){

    Route::resource( 'posts', PostsController::class );

    Route::middleware('can:cars')->group(function () {
        Route::get( 'cars/trashed', [ CarsController::class, 'trashed' ] )->name( 'cars.trashed' );
        Route::put( 'cars/restore/{car}', [ CarsController::class, 'restore' ] )->name( 'cars.restore' )->withTrashed();
        Route::delete( 'cars/force-delete/{car}', [ CarsController::class, 'forceDelete' ] )->name( 'cars.force-delete' )->withTrashed();
    });

    Route::resource( 'cars', CarsController::class );

    Route::get( 'brands/trashed', [ BrandsController::class, 'trashed' ] )->name( 'brands.trashed' );
    Route::put( 'brands/restore/{brand}', [ BrandsController::class, 'restore' ] )->name( 'brands.restore' )->withTrashed();
    Route::delete( 'brands/force-delete/{brand}', [ BrandsController::class, 'forceDelete' ] )->name( 'brands.force-delete' )->withTrashed();
    Route::resource( 'brands', BrandsController::class );

});


Route::middleware( [ 'guest' ] )->group( function(){
    Route::get( 'login', [ UserController::class, 'create' ] )->name( 'auth.login.create' );
    Route::post( 'login', [ UserController::class, 'store' ] )->name( 'auth.login.store' );
});

Route::get( 'catalog', [ CarsConotroller::class, 'index' ] )->name( 'public.cars.index' );
Route::get( 'catalog/{car}', [ CarsConotroller::class, 'show' ] )->name( 'public.cars.show' );

Route::post( 'comments', [ CommentsController::class, 'store' ] )->name( 'comments.store' );
