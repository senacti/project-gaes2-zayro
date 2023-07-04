@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Cart</h1>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartData['products'] as $product)
                    <tr>
                        <td>{{ $product }}</td>
                        <td>{{ $cartData['quantities'][$product] }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $cartData['quantities'][$product] * $product->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Total price: {{ $cartData['totalPrice'] }}</p>
        <a href="/">Continue shopping</a>
        <a href="/cart/checkout">Checkout</a>
    </div>
@endsection
