<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index () {
        return Product::all();
    }

    public function store (Request $request) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        return Product::create($request->all());
    }

    public function show (Product $product) {
        return $product;
    }

    public function update (Product $product, Request $request) {
        $product = $product->update($request->all());
        return $product;
    }

    public function destroy (Product $product) {
        return $product->delete();
    }


    /**
    * Search for a name
    * 
    * @param str $name
    * @return Illuminate\Http\Response
    * 
    */

    public function search ($name) {
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
