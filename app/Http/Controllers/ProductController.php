<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make(
            $request->all(),
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

        if ($validator->passes()) {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;

            $product->save();

            return response()->json([
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all(),
            ]);
        }
    }

    public function update(Request $request)
    {
        $id = $request->update_id;

        $validator = Validator::make(
            $request->all(),
            [
                'update_name' => 'required|unique:products,name,' . $id,
                'update_price' => 'required|numeric|not_in:0',
            ],
            [
                'update_name.required' => 'The product name is required',
                'update_name.unique' => 'The product name must be unique, it already exists',

                'update_price.required' => 'The product price is required',
                'update_price.numeric' => 'The product price must be a number',
                'update_price.not_in' => 'The product price must be greater than 0',
            ]
        );

        if ($validator->passes()) {
            Product::query()
                ->where('id', $id)
                ->update([
                    'name' => $request->update_name,
                    'price' => $request->update_price,
                ]);

            return response()->json([
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all(),
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        Product::query()
            ->where('id', $id)
            ->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function pagination()
    {
        $products = Product::query()
            ->latest()
            ->paginate(10);

        return view('paginate-products', compact('products'))->render();
    }

    public function search(Request $request)
    {
        $search = $request->search_string;

        $products = Product::query()
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('price', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        if ($products->count() > 0) {
            return view('paginate-products', compact('products'))->render();
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No products found',
            ]);
        }
    }
}
