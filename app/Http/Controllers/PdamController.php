<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdam;
use App\Http\Requests\PdamRequest;

class PdamController extends Controller
{
    public function index(){
        return Pdam::all();
    }


    public function store(PdamRequest $request){
        try{
           
            //create barang
            Pdam::create([
                'nama' =>$request->nama,
                'nomor_hp'=> $request->nomor_hp,
                'air' => $request->air
                
            ]);
             return Pdam::create($request->all());
       
        
            //Json Response
            return response()->json([
                'message' => "Transaksi berhasil ditambahkan"
            ],200);
        }catch(\Exception $e) {
            return response()->json([
                'message' => "something went really wrong"
            ],500);
        }
    }

    public function destroy($id)
    {
        $lampu = Pdam::find($id);
        if(!$lampu) {
            return response()->json([
                'message' => "Transaksi tidak Ditemukan"
            ],404);
        }

        

        //delete barang
        $lampu->delete();

        return response()->json([
            'message' => "Transaksi berhasil di hapus"
        ]);
    }
}
