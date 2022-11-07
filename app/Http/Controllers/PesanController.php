<?php

namespace App\Http\Controllers;
use App\Models\Pesan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\PesanRequest;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        return Pesan::all();
    }

    public function store(PesanRequest $request)
    {
        // return Barang::create($request->all());

      
        //     //$imageName = Str::random(32).".".$request->foto->getClientOriginalExtension();

        //     //create barang
        //     Pesan::create([
        //         'nama' =>$request->nama,
        //         'barang'=> $request->barang,
        //         //'foto' => $imageName,
        //         'nomor_hp' => $request->nomor_hp,
        //         'alamat'=> $request->alamat,
        //         'tanggal' => $request->tanggal

        //     ]);
        //     // return Barang::create($request->all());
       
        //     ///Folder simpan foto
        //     // Storage::disk('public') -> put($imageName, file_get_contents($request->foto));
        //     // $url = Storage::url("/storage/app/{$imageName}");
        //     // $path = public_path($url);

        //     //Json Response
        //     return response()->json([
        //         'message' => "Barang berhasil ditambahkan",
        //         //'foto' => $path
                
        //     ],200);
        // }catch(\Exception $e) {
        //     return response()->json([
        //         'message' => "something went really wrong"
        //     ],500);
        // }

        try{
           
            //create barang
            Pesan::create([
                'nama' =>$request->nama,
                'barang'=> $request->barang,
                 //'foto' => $imageName,
                 'nomor_hp' => $request->nomor_hp,
                 'alamat'=> $request->alamat,
                 'tanggal' => $request->tanggal
                
            ]);
             return Pesan::create($request->all());
       
        
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


      
    

    // public function destroy($id)
    // {
    //     $pesan = Pesan::find($id);
    //     if(!$pesan) {
    //         return response()->json([
    //             'message' => "pesan tidak Ditemukan"
    //         ],404);
    //     }

    //     //hapus storage
    //     $storage = Storage::disk('public');

    //     //hapus gambar
    //     if($storage->exists($pesan->foto))
    //     $storage->delete($pesan->foto);

    //     //delete barang
    //     $pesan->delete();

    //     return response()->json([
    //         'message' => "pesan berhasil di hapus"
    //     ]);
    // }
    public function destroy($id)
    {
        $pesan = Pesan::find($id);
        if(!$pesan) {
            return response()->json([
                'message' => "Pertanyaan tidak Ditemukan"
            ],404);
        }

        

        //delete barang
        $pesan->delete();

        return response()->json([
            'message' => "pertanyaan berhasil di hapus"
        ]);
    }
}
