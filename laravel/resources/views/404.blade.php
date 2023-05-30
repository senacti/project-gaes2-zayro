<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>404 Error - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{asset('css/404.css')}}">
    <link rel="icon" type="image/png" href="{{asset('images/logo2.png')}}">
</head>

<body>
    <h1>Oops no fue posible encontrar la página que buscas, disfruta de la compañía por ahora...</h1>
    <a href="javascript:setTimeout(()=>{window. location = '/' },500);l">
        <button class="bubbly-button">Volver al Inicio</button>
    </a>
</body>
<script src="{{ asset('js/404.js')}}"></script>

</html>
