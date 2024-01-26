<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        return view('product.index', compact('categories','products'));
    }

    function create()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        return view('product.create', compact('categories','products'));
    }

    function store(Request $products){

        $products->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
        ], [

            // 'category_name.required' => 'CUSTOM MESSAGE',
            // 'category_name.unique' => 'CUSTOM MESSAGE'

        ]);

        Product::insert([
            'category_id' => $products->category_id,
            'name' => $products->product_name,
            'price' => $products->product_price,
            'quantity' => $products->product_quantity,
            'created_at' => Carbon::now()
        ]);

        return back()->with('status', 'Item Added Successfully!');

    }

    function edit($product_id){
        $products = Product::find($product_id);
        $categories = Category::latest()->get();
        return view('product.edit', compact('categories','products'));
    }

    function update(Request $products){

        if ( $products->name ){
            $product = Product::find($products->id);
            $product->name = $products->name;
            $product->save();
        }elseif( $products->price ){
            $product = Product::find($products->id);
            $product->price = $products->price;
            $product->save();
        }elseif( $products->quantity ){
            $product = Product::find($products->id);
            $product->quantity = $products->quantity;
            $product->save();
        }elseif( $products->category_id ){
            $product = Product::find($products->id);
            $product->category_id = $products->category_id;
            $product->save();
        }

        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        return view('product.index', compact('categories','products'));
    }

    function destroy($id)
    {
        Product::find($id)->delete();
        return back();
    }

}
