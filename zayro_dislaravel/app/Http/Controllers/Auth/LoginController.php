<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ], [
            $this->username() . '.required' => 'El correo electrónico es obligatorio',
            'password.required' => 'El campo contraseña es obligatorio',
        ]);
    }

    /**
     * Handle a successful login.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */


    protected function authenticated(Request $request, $usuario)
    {
        return redirect()->route('disfraces');
    }

}