@extends('layouts.main')

@section('head')
    <title>Error 500 - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/500.css') }}">
@endsection

@section('content')
    <div class="error-bodycont">
        <div class="container">
            <div class="error">
                <h1>500</h1>
                <h2>error</h2>
                <p>Oh oh, algo no está bien... ¡Nosotros nos encargaremos de solucionarlo!</p>
                <a href="javascript:setTimeout(()=>{window. location = '/' },500);l">
                    <button class="bubbly-button">Volver al Inicio</button>
                </a>
            </div>
            <div class="stack-container">
                <div class="card-container">
                    <div class="perspec" style="--spreaddist: 125px; --scaledist: .75; --vertdist: -25px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="perspec" style="--spreaddist: 100px; --scaledist: .8; --vertdist: -20px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="perspec" style="--spreaddist:75px; --scaledist: .85; --vertdist: -15px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="perspec" style="--spreaddist: 50px; --scaledist: .9; --vertdist: -10px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="perspec" style="--spreaddist: 25px; --scaledist: .95; --vertdist: -5px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="perspec" style="--spreaddist: 0px; --scaledist: 1; --vertdist: 0px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/500.js') }}"></script>
@endsection
