<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmasRequest;
use App\Models\Emas;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class EmasController extends Controller
{
    public function index(){
        return Emas::all();
    }


    public function store(EmasRequest $request){
        try{
           
            //create barang
            Emas::create([
                'nama' =>$request->nama,
                'gold'=> $request->gold,
                'nomor_hp' => $request->nomor_hp,
                
            ]);
             return Emas::create($request->all());
       
        
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

    
    public function show($id)
    {
        //return pertanyaan::find($id);
        //detail pertanyaan
        $emas = Emas::find($id);
        if (!$emas){
            return response()->json([
                'message' => 'pertanyaan Tidak ditemukan'
            ],404);
        }return response() ->json([
            'emas' => $emas
        ]);
    }

    
    public function destroy($id)
    {
        $emas = Emas::find($id);
        if(!$emas) {
            return response()->json([
                'message' => "Transaksi tidak Ditemukan"
            ],404);
        }

        

        //delete barang
        $emas->delete();

        return response()->json([
            'message' => "pertanyaan berhasil di hapus"
        ]);
    }
}
