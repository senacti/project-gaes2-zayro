@extends('layouts.app')

@section('head')
    <title>Facturación - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/factura.css') }}">
@endsection

@section('page-title', 'Facturación')

@section('content')
    <div class="switch" id="switch">
        <div id="toggle">
        </div>
    </div>
    <div class="cards">
        <div class="card-single">
            <div>
                <h1 id="customer"></h1>
                <span>Facturas realizadas de ventas en el día</span>
            </div>
            <div>
                <span class="fas fa-users"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1 id="project"></h1>
                <span>Facturas realizadas de alquiler en el día</span>
            </div>
            <div>
                <span class="fas fa-clipboard"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1 id="order"></h1>
                <span>Facturas impresas</span>
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
                <span>Facturas enviadas al correo</span>
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
                    <h3 class="heading">Plantilla Factura Venta</h3>
                </div>
                <div class="container" id="app">
                    <div class="logo">
                        <h1>Logo</h1><img src="{{ asset('img/logo2.png') }}" alt="Logo" />
                    </div>
                    <div class="company">
                        <div class="phone"><a href="{{ url('tel:1-555-555-1234') }}">(555) 555-1234</a>
                        </div>
                        <div class="email"><a
                                href="{{ url('mailto:zayrodisfraces@email.com') }}">zayrodisfraces@email.com</a>
                        </div>
                        <div class="address"><a href="{{ url('https://goo.gl/maps') }}" target="_blank">Bogotá</a></div>
                    </div>
                    <div class="invoice-info">
                        <div class="invoice-number">Factura: #AB00022</div>
                        <div class="date-created">Fecha creada: 28/03/23</div>
                    </div>
                    <div class="invoice-due">
                        <div class="total-due">Precio Total: &#65284;
                            <script>
                                totalDue | currency
                            </script>
                        </div>
                        <div class="date-due">Fecha Pago: 29/03/23</div>
                    </div>
                    <div class="table invoice-list">
                        <div class="th tr">
                            <div class="td">Producto</div>
                            <div class="td">Precio</div>
                            <div class="td">Cantidad</div>
                            <div class="td">Precio</div>
                            <div class="td th-remove"></div>
                        </div>
                        <div class="tr item" v-for="(item, index) in items">
                            <div class="td">
                                <input v-model="item.name" />
                            </div>
                            <div class="td">&#65284;
                                <input type="number" v-model="item.cost" />
                            </div>
                            <div class="td">
                                <input type="number" v-model="item.quantity" />
                            </div>
                            <div class="td">
                                &#65284;
                                <script>
                                    (item.cost * item.quantity) | currency
                                </script>
                            </div>
                            <div class="td">
                                <div class="remove" @click="removeItem(index)">✕</div>
                            </div>
                        </div>
                    </div>
                    <div class="add-item">
                        <button @click="addItem">&#43; Agregar nuevo producto</button>
                    </div>
                    <div class="invoice-total">
                        <div class="sub-total">Sub-Total: &#65284;
                            <script>
                                subTotal
                            </script>
                        </div>
                        <div class="tax">IVA: &#65284;
                            <script>
                                salesTax | currency
                            </script>
                        </div>
                        <div class="total">Total: &#65284;
                            <script>
                                totalDue | currency
                            </script>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


@section('scripts')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js'></script>
    <script src="{{ asset('js/dashboard/factura.js') }}"></script>
@endsection
