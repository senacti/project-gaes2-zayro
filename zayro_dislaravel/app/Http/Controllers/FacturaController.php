<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $items = [
            ['name' => 'Hombre araña', 'cost' => 130000, 'quantity' => 1],
            ['name' => 'Hulk', 'cost' => 120000, 'quantity' => 1],
            ['name' => 'Enfermera', 'cost' => 150000, 'quantity' => 1]
        ];

        $totalDue = $this->calculateTotalDue($items);

        return view('dashboard.factura', compact('items', 'totalDue'));
    }

    private function calculateTotalDue($items)
    {
        $subTotal = array_reduce($items, function ($accumulator, $item) {
            return $accumulator + ($item['cost'] * $item['quantity']);
        }, 0);

        $salesTax = $subTotal * 0.08875;

        return $subTotal + $salesTax;
    }
}


