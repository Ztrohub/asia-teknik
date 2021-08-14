<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerjaan;
use App\Teknisi;
use Carbon\Carbon;
use DB;

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
        $teknisi = Teknisi::all();

        $todayDate = date("Y-m-d");
        $pekerjaan = Pekerjaan::whereDate('kapan','=', $todayDate)->orderBy('kapan','desc')->get();
        // $pekerjaan = Pekerjaan::orderBy('kapan','desc')->get();

        return view('asia.pekerjaans.index', compact('pekerjaan', 'teknisi'))->with(
            'hari',
            'Pekerjaan Untuk Tanggal!'
        );
    }

    public function bayar(){
        $teknisi = Teknisi::all();

        $pekerjaan = Pekerjaan::where('pembayaran', 'Belum')->orderBy('kapan','desc')->get();

        return view('asia.pekerjaans.index', compact('pekerjaan', 'teknisi'))->with(
            'hari',
            'Pekerjaan Untuk Tanggal!'
        );
    }

    public function teknisi($id){
        $teknisi = Teknisi::all();

        $pekerjaan = Pekerjaan::whereHas('teknisi', function ($query) use($id) {
            return $query->where('teknisi_id', '=', $id);
        })->get();
        
        return view('asia.pekerjaans.index', compact('pekerjaan', 'teknisi'));
    }

    public function buatTeknisi(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

        $query = DB::table('teknisis')->insert([
            "name" => $request["name"]
        ]);

        return redirect('/pekerjaans')->with(
            'disimpan',
            'Teknisi berhasil disimpan'
        );
    }

    public function bikinTeknisi(){
        $teknisi = Teknisi::all();

        return view('asia.teknisi.create', compact('teknisi'));
    }
}
