<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerjaan;
use Carbon\Carbon;

class NewController extends Controller
{
    public function done($id){
        $pekerjaan = Pekerjaan::find($id)->update([
            'status' => "Sudah"
        ]);
        return back();
    }

    public function cash($id){
        $pekerjaan = Pekerjaan::find($id)->update([
            'pembayaran' => "Cash"
        ]);
        return back();
    }

    public function tf($id){
        $pekerjaan = Pekerjaan::find($id)->update([
            'pembayaran' => "Transfer"
        ]);
        return back();
    }

    public function today(){
        $todayDate = date("Y-m-d");
        $pekerjaan = Pekerjaan::whereDate('kapan','=', $todayDate)->orderBy('kapan','desc')->get();
        // $pekerjaan = Pekerjaan::orderBy('kapan','desc')->get();

        return view('asia.pekerjaans.index', compact('pekerjaan'))->with(
            'hari',
            'Pekerjaan Untuk Tanggal!'
        );
    }

    public function bayar(){
        $pekerjaan = Pekerjaan::where('pembayaran', 'Belum')->orderBy('kapan','desc')->get();

        return view('asia.pekerjaans.index', compact('pekerjaan'))->with(
            'hari',
            'Pekerjaan Untuk Tanggal!'
        );
    }

    public function teknisi($id){
        $pekerjaan = Pekerjaan::whereHas('teknisi', function ($query) use($id) {
            return $query->where('teknisi_id', '=', $id);
        })->get();
        
        return view('asia.pekerjaans.index', compact('pekerjaan'));
    }
}
