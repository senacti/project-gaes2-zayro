<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('usuarios'),
                'regex:/^.+@.+\..+$/i' // Email format validation
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/u' // Password requirements validation
            ],
            'FECHA_NACIMIENTO' => ['required', 'date'],
            'TELEFONO_1' => [
                'required',
                'max:10',
                'regex:/^(?:(?:\+|00)?57)?[1-9]{1}[0-9]{7,}$/u' // Colombia telephone number format validation
            ],
            'DIRECCION_BOGOTA' => [
                'required',
                'regex:/^((?:Calle|Carrera|Diagonal|Transversal|Av|Cl|Kr)\s\d{1,4}\s?(?:[A-Z])?(?:\s\#\s\d{1,4}\-\d{1,4})?\s(?:[A-Z][a-zA-Z]{1,7})?\s?\d{1,4}?)$/u' // Bogota address format validation
            ],            
            'ID_ROL' => ['required', 'integer'],
        ], [
            'NOMBRE.required' => 'El nombre completo es obligatorio.',
            'NOMBRE.string' => 'El nombre completo debe ser una cadena de texto.',
            'NOMBRE.max' => 'El nombre completo no puede exceder los 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.max' => 'El correo electrónico no puede exceder los 255 caracteres.',
            'email.unique' => 'El correo electrónico ya ha sido registrado.',
            'email.regex' => 'El correo electrónico no tiene un formato válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de contraseña no coincide.',
            'password.regex' => 'La contraseña no cumple con los requisitos de seguridad.',
            'FECHA_NACIMIENTO.required' => 'La fecha de nacimiento es obligatoria.',
            'FECHA_NACIMIENTO.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'TELEFONO_1.required' => 'El teléfono es obligatorio.',
            'TELEFONO_1.max' => 'El teléfono no puede exceder los 10 caracteres.',
            'TELEFONO_1.regex' => 'El teléfono debe tener un formato válido para Colombia.',
            'DIRECCION_BOGOTA.required' => 'La dirección en Bogotá es obligatoria.',
            'DIRECCION_BOGOTA.regex' => 'La dirección en Bogotá no tiene un formato válido. (Ejemplo: Calle 123 # 45-67 Casa 89)',
            'ID_ROL.required' => 'El ID de rol es obligatorio.',
            'ID_ROL.integer' => 'El ID de rol debe ser un número entero.',
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
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'FECHA_NACIMIENTO' => $data['FECHA_NACIMIENTO'],
            'TELEFONO_1' => $data['TELEFONO_1'],
            'DIRECCION_BOGOTA' => $data['DIRECCION_BOGOTA'],
            'ID_ROL' => $data['ID_ROL'],
        ]);
    }
}