<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->latest()
            ->paginate(10);

        return view('products', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required|numeric|not_in:0',
            ],
            [
                'name.required' => 'The product name is required',
                'name.unique' => 'The product name must be unique, it already exists',

                'price.required' => 'The product price is required',
                'price.numeric' => 'The product price must be a number',
                'price.not_in' => 'The product price must be greater than 0',
            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();

        return response()->json([
            'status' => 'success',
        ]);
    }
}
