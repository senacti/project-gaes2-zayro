<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'NOMBRE' => ['required', 'string', 'max:255'],
            'E_MAIL' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'CONTRASEÑA' => ['required', 'string', 'min:8', 'confirmed'],
            'FECHA_NACIMIENTO' => ['nullable', 'date'],
            'TELEFONO_1' => ['nullable', 'string', 'max:255'],
            'DIRECCION_BOGOTA' => ['nullable', 'string', 'max:255'],
            'ID_ROL' => ['required', 'integer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Usuario
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'NOMBRE' => $data['NOMBRE'],
            'E_MAIL' => $data['E_MAIL'],
            'CONTRASEÑA' => Hash::make($data['CONTRASEÑA']),
            'FECHA_NACIMIENTO' => $data['FECHA_NACIMIENTO'],
            'TELEFONO_1' => $data['TELEFONO_1'],
            'DIRECCION_BOGOTA' => $data['DIRECCION_BOGOTA'],
            'ID_ROL' => $data['ID_ROL'],
        ]);
    }
}