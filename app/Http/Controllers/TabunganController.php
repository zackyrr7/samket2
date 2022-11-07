<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TabunganController extends Controller
{
    public function index()
    {
        $tabungans = Tabungan::all();
        return $tabungans;
    }

    public function store(Request $request)
    {
        $tabungans = new Tabungan();
        $tabungans->user_id = Auth::id();
        $tabungans->total = $request->total;
        $tabungans->tanggal = $request->tanggal;
        $tabungans->save();
    }
    public function update(Request $request, $id){
        try{
            //menemukan pertanyaan
            $tabungans = Tabungan::find($id);
            if(!$tabungans){
                return response()->json([
                    'message' => 'tabungan tidak ditemukan'
                ],404);
            }

            $tabungans->total = $request->total;
            $tabungans->tanggal= $request->tanggal;

            

            
            //update pertanyaan
            $tabungans->save();

            //respon json
            return response()->json([
                'message' => 'Tabungan berhasil diupdate'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'message' => "Something went really wrong"
            ]);
        }
    }
}
