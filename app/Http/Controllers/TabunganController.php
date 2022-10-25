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
}
