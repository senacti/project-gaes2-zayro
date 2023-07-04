@extends('layouts.main')

@section('head')
    <title>Disfraces - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/inicio/disfraces.css') }}">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.2.4/css/simple-line-icons.min.css'>
@endsection

@section('content')
    <div class='container'>
        @foreach ($productos as $producto)
            <div class='product'>
                <h2 class='header'>{{ $producto->NOMBRE_DISFRAZ }}</h2>
                <img src='https://ik.imagekit.io/Bc/disfraz-{{ $producto->ID_PRODUCTO }}.jpeg' alt="{{ $producto->DESCRIPCION }}">
                <p class='description'>{{ $producto->DESCRIPCION }}</p>
                <p class='price'>${{ $producto->inventario->PRECIO_UNITARIO }}</p>
                <form action="" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/inicio/disfraces.js') }}"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
@endsection
