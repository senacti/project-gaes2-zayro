@extends('layouts.app')

@section('head')
    <title>Panel de control - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
@endsection

@section('page-title', 'Panel de Control')

@section('content')
    <div class="switch" id="switch">
        <div id="toggle">
        </div>
    </div>
    <div class="cards">
        <div class="card-single">
            <div>
                <h1 id="customer"></h1>
                <span>Clientes</span>
            </div>
            <div>
                <span class="fas fa-users"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1 id="project"></h1>
                <span>Informes</span>
            </div>
            <div>
                <span class="fas fa-clipboard"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1 id="order"></h1>
                <span>Pedidos realizados</span>
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
                <span>disfraces por reabastecer</span>
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
                    <h3 class="heading">Últimos pedidos</h3>
                    <button>Ver todos <span class="fas fa-arrow-right"></span></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>Tipo de pedido</td>
                                    <td>Fecha</td>
                                    <td>Estado</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Alquiler</td>
                                    <td>20/03/2023</td>
                                    <td>
                                        <span class="status purple"></span>entregado
                                    </td>
                                </tr>
                                <tr>
                                    <td>Venta</td>
                                    <td>19/03/2023</td>
                                    <td>
                                        <span class="status pink"></span>pendiente
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alquiler</td>
                                    <td>17/03/2023</td>
                                    <td>
                                        <span class="status orange"></span>en camino
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alquiler</td>
                                    <td>17/03/2023</td>
                                    <td>
                                        <span class="status purple"></span>entregado
                                    </td>
                                </tr>
                                <tr>
                                    <td>Venta</td>
                                    <td>15/03/2023</td>
                                    <td>
                                        <span class="status pink"></span>pendiente
                                    </td>
                                </tr>
                                <tr>
                                    <td>Venta</td>
                                    <td>15/03/2023</td>
                                    <td>
                                        <span class="status orange"></span>en camino
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alquiler</td>
                                    <td>15/03/2023</td>
                                    <td>
                                        <span class="status purple"></span>entregado
                                    </td>
                                </tr>
                                <tr>
                                    <td>Venta</td>
                                    <td>14/03/2023</td>
                                    <td>
                                        <span class="status pink"></span>pendiente
                                    </td>
                                </tr>
                                <tr>
                                    <td>Venta</td>
                                    <td>10/03/2023</td>
                                    <td>
                                        <span class="status orange"></span>en camino
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alquiler</td>
                                    <td>10/03/2023</td>
                                    <td>
                                        <span class="status purple"></span>entregado
                                    </td>
                                </tr>
                                <tr>
                                    <td>Venta</td>
                                    <td>10/03/2023</td>
                                    <td>
                                        <span class="status pink"></span>pendiente
                                    </td>
                                </tr>
                                <tr>
                                    <td>Venta</td>
                                    <td>10/03/2023</td>
                                    <td>
                                        <span class="status orange"></span>en camino
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="customers">
            <div class="card">
                <div class="card-header">
                    <h3 class="heading">Nuevos clientes</h3>
                    <button>Ver todos<span class="fas fa-arrow-right"></span></button>
                </div>

                <div class="card-body">
                    <div class="customer">
                        <div class="info">
                            <img src="{{ asset('img/user-solid.svg') }}" alt="usuario">
                            <div>
                                <h4>
                                    Calvito Perez</h4>
                                <small>11/06/2023 15:50</small>
                            </div>
                        </div>
                        <div class="contact">
                            <span class="fas fa-user-circle"></span>
                            <span class="fas fa-envelope"></span>
                            <span class="fas fa-flag"></span>
                        </div>
                    </div>

                    <div class="customer">
                        <div class="info">
                            <img src="{{ asset('img/user-solid.svg') }}" alt="usuario">
                            <div>
                                <h4>Simon Estrada</h4>
                                <small>20/03/2023 14:45
                                </small>
                            </div>
                        </div>
                        <div class="contact">
                            <span class="fas fa-user-circle"></span>
                            <span class="fas fa-envelope"></span>
                            <span class="fas fa-flag"></span>
                        </div>
                    </div>

                    <div class="customer">
                        <div class="info">
                            <img src="{{ asset('img/user-solid.svg') }}" alt="usuario">
                            <div>
                                <h4>Felipe Alvarez</h4>
                                <small>20/03/2023 14:30</small>
                            </div>
                        </div>
                        <div class="contact">
                            <span class="fas fa-user-circle"></span>
                            <span class="fas fa-envelope"></span>
                            <span class="fas fa-flag"></span>
                        </div>
                    </div>

                    <div class="customer">
                        <div class="info">
                            <img src="{{ asset('img/user-solid.svg') }}" alt="usuario">
                            <div>
                                <h4>Andres Figueroa</h4>
                                <small>19/03/2023 20:44</small>
                            </div>
                        </div>
                        <div class="contact">
                            <span class="fas fa-user-circle"></span>
                            <span class="fas fa-envelope"></span>
                            <span class="fas fa-flag"></span>
                        </div>
                    </div>

                    <div class="customer">
                        <div class="info">
                            <img src="{{ asset('img/user-solid.svg') }}" alt="usuario">
                            <div>
                                <h4>Carolina Gomez</h4>
                                <small>19/03/2023 20:40</small>
                            </div>
                        </div>
                        <div class="contact">
                            <span class="fas fa-user-circle"></span>
                            <span class="fas fa-envelope"></span>
                            <span class="fas fa-flag"></span>
                        </div>
                    </div>

                    <div class="customer">
                        <div class="info">
                            <img src="{{ asset('img/user-solid.svg') }}" alt="usuario">
                            <div>
                                <h4>Daniela Coha</h4>
                                <small>19/03/2023 15:44</small>
                            </div>
                        </div>
                        <div class="contact">
                            <span class="fas fa-user-circle"></span>
                            <span class="fas fa-envelope"></span>
                            <span class="fas fa-flag"></span>
                        </div>
                    </div>

                    <div class="customer">
                        <div class="info">
                            <img src="{{ asset('img/user-solid.svg') }}" alt="usuario">
                            <div>
                                <h4>Karla Montoya</h4>
                                <small>14/03/2023 20:30</small>
                            </div>
                        </div>
                        <div class="contact">
                            <span class="fas fa-user-circle"></span>
                            <span class="fas fa-envelope"></span>
                            <span class="fas fa-flag"></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection