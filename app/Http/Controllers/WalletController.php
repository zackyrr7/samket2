<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Http\Requests\WalletRequest;

class WalletController extends Controller
{
    public function index(){
        return Wallet::all();
    }


    public function store(WalletRequest $request){
        try{
           
            //create barang
            Wallet::create([
                'nama' =>$request->nama,
                'nomor_hp'=> $request->nomor_hp,
                'jenis' => $request->jenis,
                'total' => $request->total,
                'no_wallet' => $request->no_wallet
                
            ]);
             return Wallet::create($request->all());
       
        
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
        $wallet = Wallet::find($id);
        if(!$wallet) {
            return response()->json([
                'message' => "Transaksi tidak Ditemukan"
            ],404);
        }

        

        //delete barang
        $wallet->delete();

        return response()->json([
            'message' => "Transaksi berhasil di hapus"
        ]);
    }
}
