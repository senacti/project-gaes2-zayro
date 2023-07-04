@extends('layouts.app')

@section('head')
    <title>Inventario - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/inventory.css') }}">
@endsection

@section('page-title', 'Inventario')

@section('content')
    <div class="cards">
        <div class="card-single">
            <div>
                <h1 id="customer"></h1>
                <span>Nuevos clientes</span>
            </div>
            <div>
                <span class="fas fa-users"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1 id="project"></h1>
                <span>Nuevos productos</span>
            </div>
            <div>
                <span class="fas fa-clipboard"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1 id="order"></h1>
                <span>Interacciones en la base de datos</span>
            </div>
            <div>
                <span class="fas fa-shopping-bag"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1>
                    <p id="income"></p>
                </h1>
                <span>Registros sin guardar</span>
            </div>
            <div>
                <span class="fas fa-theater-masks"></span>
            </div>
        </div>
    </div>
    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3 class="heading">Inventario Productos</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Image URL</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->image_url }}</td>
                                    <td>
                                        <a href="/inventory/{{ $product->id }}/edit">Edit</a>
                                        <a href="/inventory/{{ $product->id }}/delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                
                        <a href="/inventory/create">Create new product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection