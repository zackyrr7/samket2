<?php

namespace App\Http\Controllers;

use App\Http\Requests\PertanyaanRequest;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class PertanyaanController extends Controller
{
    public function index(){
        return Pertanyaan::all();
    }


    public function store(PertanyaanRequest $request){
        try{
           
            //create barang
            Pertanyaan::create([
                'judul' =>$request->judul,
                'jawaban'=> $request->jawaban,
                
            ]);
             return Pertanyaan::create($request->all());
       
        
            //Json Response
            return response()->json([
                'message' => "Pertanyaan berhasil ditambahkan"
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
        $pertanyaan = Pertanyaan::find($id);
        if (!$pertanyaan){
            return response()->json([
                'message' => 'pertanyaan Tidak ditemukan'
            ],404);
        }return response() ->json([
            'pertanyaan' => $pertanyaan
        ]);
    }

    public function update(Request $request, $id){
        try{
            //menemukan pertanyaan
            $pertanyaan = Pertanyaan::find($id);
            if(!$pertanyaan){
                return response()->json([
                    'message' => 'pertanyaan tidak ditemukan'
                ],404);
            }

            $pertanyaan->judul = $request->judul;
            $pertanyaan->jawaban= $request->jawaban;

            
            //update pertanyaan
            $pertanyaan->save();

            //respon json
            return response()->json([
                'message' => 'Pertanyaan berhasil diupdate'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'message' => "Something went really wrong"
            ]);
        }
    }
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        if(!$pertanyaan) {
            return response()->json([
                'message' => "Pertanyaan tidak Ditemukan"
            ],404);
        }

        

        //delete barang
        $pertanyaan->delete();

        return response()->json([
            'message' => "pertanyaan berhasil di hapus"
        ]);
    }
}
