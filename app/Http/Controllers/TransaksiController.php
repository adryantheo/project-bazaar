<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Transaksi;

class TransaksiController extends Controller
{
    
    public function index()
    {
        //GET
        $transaksi = Transaksi::all();
        
        return response()->json($transaksi, 200);
    }

    
       
    public function store(Request $request)
    {
        //POST
        $transaksi = new Transaksi;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->harga = $request->harga;
        $success = $transaksi->save();

        if(!$success){
            return response()->json('Error Saving', 500);
        }
        else{
            return response()->json('Success', 201);
        }
    }

   
    public function show(Transaksi $id)
    {
        //GET by ID
        $transaksi = Transaksi::find($id);

        if(is_null($transaksi)){
            return response()->json('Not Found', 404);
        }
        else   
            return response()->json($transaksi, 200);
    }
    
    public function update(Request $request, Transaksi $id)
    {
         // Update / Edit

         $transaksi = Transaksi::find($id);
        
         if(!is_null($request->jumlah)){
             $transaksi->jumlah = $request->jumlah;
         }
         if(!is_null($request->harga)){
            $transaksi->harga = $request->harga;
        } 
        $success = $transaksi->save();
 
         if(!$success){
             return response()->json('Error Update', 500);
 
         }
         else
             return response()->json('Success',200);
    }

    public function destroy(Transaksi $id)
    {
        // Delete
        $transaksi = Transaksi::find($id);

        if(is_null($transaksi)){
            return response()->json('Not Found', 404);
        }
        else   
           $success =  $transaksi->delete();

        if(!$success){
            return response()->json('Error Deleting', 500);
        }
        else
            return response()->json('Success',200);    
    }
}
