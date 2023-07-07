<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Usuario;
use App\Models\RolSistema;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the usuarios.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $usuarios = Usuario::with('rolSistema')->get();

        $totalUsuarios = Usuario::count();
        $totalClientes = Usuario::whereHas('rolSistema', function ($query) {
            $query->where('DESCRIPCION_ROLES', 'CLIENTE');
        })->count();
        $totalVendedores = Usuario::whereHas('rolSistema', function ($query) {
            $query->where('DESCRIPCION_ROLES', 'VENDEDOR');
        })->count();

        return view('usuarios.index', compact('usuarios', 'totalUsuarios', 'totalClientes', 'totalVendedores'));
    }

    /**
     * Show the form for creating a new usuario.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $roles = RolSistema::all();

        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created usuario in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'NOMBRE' => 'required',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required',
            'FECHA_NACIMIENTO' => 'required|date',
            'TELEFONO_1' => 'required',
            'TELEFONO_2' => 'nullable',
            'DIRECCION_BOGOTA' => 'required',
            'ID_ROL' => 'required',
        ], [
            'NOMBRE.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'FECHA_NACIMIENTO.required' => 'El campo fecha de nacimiento es obligatorio.',
            'FECHA_NACIMIENTO.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'TELEFONO_1.required' => 'El campo teléfono es obligatorio.',
            'DIRECCION_BOGOTA.required' => 'El campo dirección es obligatorio.',
            'ID_ROL.required' => 'El campo rol es obligatorio.',
        ]);

        Usuario::create($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario created successfully.');
    }

    /**
     * Display the specified usuario.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\View\View
     */
    public function show(Usuario $usuario): View
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified usuario.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\View\View
     */
    public function edit(Usuario $usuario): View
    {
        $roles = RolSistema::all();

        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified usuario in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Usuario $usuario): RedirectResponse
    {
        $request->validate([
            'NOMBRE' => 'required',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->ID_USUARIO . ',ID_USUARIO',
            'password' => 'nullable',
            'FECHA_NACIMIENTO' => 'required|date',
            'TELEFONO_1' => 'required',
            'TELEFONO_2' => 'nullable',
            'DIRECCION_BOGOTA' => 'required',
            'ID_ROL' => 'required|exists:rol_sistemas,ID_ROL',
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario updated successfully.');
    }

    /**
     * Remove the specified usuario from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Usuario $usuario): RedirectResponse
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario deleted successfully.');
    }
}