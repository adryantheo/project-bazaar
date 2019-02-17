<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        //GET
        $product = Product::all();
        
        return response()->json($product, 200);

    }
   
    public function store(Request $request)
    {
        //POST
        $product = new Product;
        $product->nama_produk = $request->nama_produk;
        $product->stok = $request->stok;
        $product->harga = $request->harga;
        $success = $product->save();

        if(!$success){
            return response()->json('Error Saving', 500);
        }
        else{
            return response()->json('Success', 201);
        }
    }

    
    public function show($id)
    {
        //GET by ID
        $product = Product::find($id);

        if(is_null($product)){
            return response()->json('Not Found', 404);
        }
        else   
            return response()->json($product, 200);

    }

     

    
    public function update(Request $request, $id)
    {
        // Update / Edit

        $product = Product::find($id);
        
        if(!is_null($request->nama_produk)){
            $product->nama_produk = $request->nama_produk;
        }

        if(!is_null($request->stok)){
            $product->stok = $request->stok;
        }

        if(!is_null($request->harga)){
            $product->harga = $request->harga;
        }

        $success = $product->save();

        if(!$success){
            return response()->json('Error Update', 500);

        }
        else
            return response()->json('Success',200);
    }

    
    public function destroy($id)
    {
        // Delete
        $product = Product::find($id);

        if(is_null($product)){
            return response()->json('Not Found', 404);
        }
        else   
           $success =  $product->delete();

        if(!$success){
            return response()->json('Error Deleting', 500);
        }
        else
            return response()->json('Success',200);

    }
}
