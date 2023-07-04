@extends('layouts.app')

@section('head')
    <title>Marketing - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/marketing.css') }}">
    <link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/85807/font-awesome.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:700'>
    <link rel="stylesheet" href="{{ asset('css/dashboard/marketing.css') }}">
@endsection

@section('content')
    <div class="statCont clearfix" id="line_chart">
        <div class="legend">
            <ul class="clearfix">
                <li><span class="one"></span>Qué significa la gráfica 1</li>
                <li> <span class="two"></span>Qué significa la gráfica 2</li>
            </ul>
        </div>
        <div class="lineChartCont">
            <canvas id="canvas"></canvas>
        </div>
        <div class="leftStats statsCol">
            <div class="stat1 stat"><span class="num">15</span><span class="term">Clicks</span></div>
            <div class="stat2 stat"><span class="num">20</span><span class="term">Usuarios</span></div>
            <div class="stat3 stat"><span class="num">30</span><span class="term">Vistas Página</span></div>
        </div>
        <div class="rightStats statsCol">
            <div class="stat1 stat"><span class="num">22</span><span class="term">Clicks</span></div>
            <div class="stat2 stat"><span class="num">40</span><span class="term">Usuarios</span></div>
            <div class="stat3 stat"><span class="num">82</span><span class="term">Vistas Página</span></div>
        </div>
    </div>
    <div class="statCont clearfix" id="pie_chart">
        <div class="pieChartCont">
            <canvas id="pieChart" width="300" height="300"></canvas>
        </div>
        <div class="legend">
            <h4>Estadistícas Totales</h4>
            <ul>
                <li><i class="fa fa-envelope"></i><span>300</span>Enviados</li>
                <li><i class="fa fa-thumbs-up"></i><span>120</span>Aceptados</li>
                <li><i class="fa fa-eye"></i><span>100</span>Vistos</li>
                <li><i class="fa fa-folder-open"></i><span>50</span>Atraidos</li>
                <li><i class="fa fa-ban"></i><span>129</span>Saltados</li>
                <li><i class="fa fa-bar-chart"></i><span>-33</span>Crecimiento</li>
                <li><i class="fa fa-exclamation"></i><span>2</span>Marcado como Spam</li>
            </ul>
        </div>
        <div class="pieOptions">
            <h4>Optiones</h4><a href="#"><i class="fa fa-download"></i>Descargar CSV</a><a href="#"><i
                    class="fa fa-pie-chart"></i>Creat Clone</a><a href="#"><i class="fa fa-calendar"></i>Ver Fechas</a><a href="#"><i class="fa fa-share"></i>Compartir</a><a href="#"> <i
                    class="fa fa-trash"></i>Borrar</a>
        </div>
    </div>
    <div class="statCont" id="bar_chart">
        <div class="barChartCont">
            <canvas id="barChart"></canvas>
        </div>
        <div class="legend clearfix">
            <h4>Totales</h4>
            <div class="items clicks"><span class="co">1120</span><span class="cl">CLICKS</span></div>
            <div class="items conversions"><span class="co">657</span><span class="cl">CONVERSIONES</span></div>
            <h4>Promedios</h4>
            <div class="items avgClicks"><span class="co">48</span><span class="cl">Promedio Clicks</span></div>
            <div class="items avgConvs"><span class="co">38</span><span class="cl">Promedio Conversiones</span></div>
        </div>
    </div>
    <div class="statCont clearfix" id="email_lists">
        <h4>Listas de Emails</h4>
        <ul class="emailLists">
            <li>ALL<span>2934</span></li>
            <li>Black Friday<span>1102</span><a href="#">Borrar</a></li>
            <li class="selected">Navidad<span>670</span><a href="#">Borrar</a></li>
            <li>Campaña X<span>862</span><a href="#">Borrar</a></li>
            <li>Reunión Negocios<span>300</span><a href="#">Borrar</a></li>
        </ul>
        <div class="indivEmailsTop clearfix">
            <div class="info infoSent"><span class="num">2934</span><span class="info">ENVIADOS</span></div>
            <div class="info infoAccepted"><span class="num">2882</span><span class="info">RECIBIDOS</span></div>
            <div class="info infoBounced"><span class="num">52</span><span class="info">ATRAIDOS</span></div>
        </div>
        <ul class="indivEmailsBottom">
            <li>somedude@fake.com</li>
            <li>madeupperson@notreal.com</li>
            <li>johnsmith@sesamestreet.com</li>
            <li>joeblow@nobody.com</li>
            <li>somedude@fake.com</li>
            <li>madeupperson@notreal.com</li>
            <li>johnsmith@sesamestreet.com</li>
            <li>joeblow@nobody.com</li>
            <li>somedude@fake.com</li>
            <li>madeupperson@notreal.com</li>
            <li>johnsmith@sesamestreet.com</li>
            <li>joeblow@nobody.com</li>
        </ul>
        <div class="options"><a class="share" href="#"><i class="fa fa-share"></i>Share</a><a class="export"
                href="#"><i class="fa fa-download"></i>Exportar</a><a class="add" href="#"><i
                    class="fa fa-edit"></i>Agregar Contactos</a></div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/dashboard/marketing.js') }}"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/85807/Chart.js'></script>
@endsection
