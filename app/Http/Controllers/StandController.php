<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stand;

class StandController extends Controller
{
    
    public function index()
    {
        //GET
        $stand = Stand::all();
        
        return response()->json($stand, 200);

    }
   
    public function store(Request $request)
    {
        //POST
        $stand = new Stand;
        $stand->nama_stand = $request->nama_stand;
        $success = $stand->save();

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
        $stand = Stand::find($id);

        if(is_null($stand)){
            return response()->json('Not Found', 404);
        }
        else   
            return response()->json($stand, 200);

    }

     

    
    public function update(Request $request, $id)
    {
        // Update / Edit

        $stand = Stand::find($id);
        
        if(!is_null($request->nama_stand)){
            $stand->nama_stand = $request->nama_stand;
        }

        $success = $stand->save();

        if(!$success){
            return response()->json('Error Update', 500);

        }
        else
            return response()->json('Success',200);
    }

    
    public function destroy($id)
    {
        // Delete
        $stand = Stand::find($id);

        if(!is_null($stand)){
            return response()->json('Not Found', 404);
        }

        $success = $stand->delete();

        if(!success){
            return response()->json('Error Deleting', 500);
          }
          else

          return response()->json('Success',200);
    }
}
