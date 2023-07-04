<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        // Retrieve the cart data from the database
        $cartData = Cart::all();

        // Define the products key
        $products = $cartData['products'];

        // Pass the products key to the view
        return view('cart.index', ['cartData' => $cartData, 'products' => $products]);
    }

    public function addToCart(Request $request, $productId)
    {
        // Get the product from the database
        $product = Product::find($productId);

        // Create a new cart item
        $cartItem = new Cart();
        $cartItem->product_id = $product->id;
        $cartItem->quantity = $request->input('quantity', 1); // Default quantity is 1
        $cartItem->price = $product->price;

        // Save the cart item to the database
        $cartItem->save();

        return redirect()->back()->with('success', 'Item added to cart.');
    }

    public function updateCartItemQuantity(Request $request, $cartItemId)
    {
        // Get the cart item from the database
        $cartItem = Cart::find($cartItemId);

        // Update the quantity
        $cartItem->quantity = $request->input('quantity');

        // Save the updated cart item
        $cartItem->save();

        return redirect('/cart')->with('success', 'Cart item quantity updated.');
    }

    public function removeCartItem($cartItemId)
    {
        // Get the cart item from the database
        $cartItem = Cart::find($cartItemId);

        // Delete the cart item
        $cartItem->delete();

        return redirect('/cart')->with('success', 'Cart item removed.');
    }

    public function clearCart()
    {
        // Delete all cart items
        Cart::truncate();

        return redirect('/cart')->with('success', 'Cart cleared.');
    }

}
