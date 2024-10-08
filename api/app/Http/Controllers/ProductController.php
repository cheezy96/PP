<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function getAll() {
        return Product::with(['category', 'store', 'status'])->get();
    }

    public function get($product_id) {
        $product = Product::with(['category', 'store'])->findOrFail($product_id);
        return $product;
        // $product = Product::findOrFail($product_id);
        // return $product;

    }

    public function create(Request $request) {
        $product = new Product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->category_id = $request->category_id;
        $product->store_id = $request->store_id;
        $product->status_id = $request->status_id;
        $product->is_active = $request->is_active;
        $product->save();
        return $product;
    } 

    public function delete($product_id){
        $product = Product::find($product_id);
        if($product){
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully'], 200);
        }
        // $product->delete();
        // return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    public function update(Request $request){
        $product = Product::find($request->id);
        $product->code = $request->code;
        $product->name = $request->name;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->category_id = $request->category_id;
        $product->store_id = $request->store_id;
        $product->created_at = $product->created_at; // Add this line to retain the original created_at value
        $product->save();
        return $product;
    }

    // public function store(Request $request){

    //     // dd($request->all());
    //     $filename = '';

    //     if($request->hasFile('img')){

    //         $filename = $request->getSchemeAndHttpHost(). '/assets/img/' . time() . '.' . $request->img->extension();

    //         $request->img->move(public_path('/assets/img/'), $filename);
    //     }
    // }    

}
