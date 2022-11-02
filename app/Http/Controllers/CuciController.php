<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cuci;
use App\Http\Requests\CuciRequest;

class CuciController extends Controller
{
    public function index(){
        return Cuci::all();
    }


    public function store(CuciRequest $request){
        try{
           
            //create barang
            Cuci::create([
                'nama' =>$request->nama,
                'nomor_hp'=> $request->nomor_hp,
                'jenis' => $request->jenis
                
            ]);
             return Cuci::create($request->all());
       
        
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
        $cuci = Cuci::find($id);
        if(!$cuci) {
            return response()->json([
                'message' => "Pertanyaan tidak Ditemukan"
            ],404);
        }

        

        //delete barang
        $cuci->delete();

        return response()->json([
            'message' => "pertanyaan berhasil di hapus"
        ]);
    }
}
