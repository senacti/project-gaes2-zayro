@extends('layouts.main')

@section('head')
    <title>Zayro Disfraces - Nosotros</title>
    <link rel="stylesheet" href="{{ asset('css/inicio/nosotros.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1 id="title4">Sobre Nosotros</h1>

        <hr class="hr2">

        <div class="content">
            <p>
                Zayro Disfraces es una empresa especializada en la venta y alquiler de disfraces para diversas ocasiones y eventos.
                Nos enorgullece ofrecer una amplia variedad de opciones para que encuentres el disfraz perfecto que se ajuste a tus necesidades y preferencias.
                Ya sea para una fiesta de disfraces, Halloween, carnaval o cualquier otra celebración, estamos aquí para ayudarte a lucir increíble y divertido.
            </p>
        </div>

        <h2 id="title3">Nuestros Servicios</h2>

        <hr class="hr2">

        <div class="content">
            <h3 class="subtitle2">Venta de Disfraces</h3>
            <p>
                En Zayro Disfraces, contamos con una amplia selección de disfraces a la venta.
                Nuestro catálogo incluye disfraces para todas las edades, desde niños hasta adultos, y abarca una gran variedad de temáticas y personajes.
                Trabajamos con los mejores proveedores para garantizar la calidad de nuestros productos y ofrecer opciones que se adapten a diferentes presupuestos.
            </p>
        </div>

        <hr class="hr2">

        <div class="content">
            <h3 class="subtitle2">Alquiler de Disfraces</h3>
            <p>
                Además de la venta, también ofrecemos el servicio de alquiler de disfraces.
                Esta opción es ideal si buscas lucir un disfraz espectacular sin tener que realizar una inversión completa.
                Contamos con un amplio inventario de disfraces de alta calidad disponibles para alquiler, para que puedas disfrutar de tu evento sin preocupaciones.
            </p>
        </div>
    </div>
@endsection