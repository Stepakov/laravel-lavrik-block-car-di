<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view( 'auth.login' );
    }

    public function store( StoreRequest $request )
    {
        $request->checkCredentials();

        $request->session()->regenerate();

        return redirect()->intended( 'cars' );
    }
}
