<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerjaan;
use App\Teknisi;
use App\Jenis;


class PekerjaansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!empty($request -> from_date)){
            if($request -> from_date === $request -> to_date){
                $pekerjaan = Pekerjaan::whereDate('kapan','=', $request-> from_date)->orderBy('kapan','desc')->get();
            } else {
                $pekerjaan = Pekerjaan::whereBetween('kapan', array($request->from_date, $request->to_date))->orderBy('kapan', 'desc')->get();
            }
        } else {
            $pekerjaan = Pekerjaan::orderBy('kapan', 'desc')->get();
        }

        return view('asia.pekerjaans.index', compact('pekerjaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asia.pekerjaans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $teknisi = $request['teknisis_id'];

        $jenis = $request['jenis_id'];
        // dd($teknisi);

        $pekerjaan = Pekerjaan::create([
            "name" => $request['name'],
            "alamat" => $request['alamat'],
            "kapan" => $request['kapan'],
            "pekerjaan" => $request['pekerjaan'],
            "nominal" => $request['nominal'],
            "status" => "Belum",
            "pembayaran" => "Belum"
        ]);

        $pekerjaan->teknisi()->sync($teknisi);
        $pekerjaan->jenis()->sync($jenis);

        return redirect('/pekerjaans')->with(
            'disimpan',
            'Pekerjaan Berhasil Disismpan!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pekerjaan = Pekerjaan::find($id);

        return view('asia.pekerjaans.show', compact('pekerjaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pekerjaan = Pekerjaan::find($id);

        return view('asia.pekerjaans.edit', compact('pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teknisi = $request['teknisis_id'];

        $jenis = $request['jenis_id'];
        // dd($teknisi);

        $pekerjaan = Pekerjaan::find($id)->update([
            "name" => $request['name'],
            "alamat" => $request['alamat'],
            "kapan" => $request['kapan'],
            "pekerjaan" => $request['pekerjaan'],
            "nominal" => $request['nominal'],
        ]);

        $pekerjaan->teknisi()->sync($teknisi);
        $pekerjaan->jenis()->sync($jenis);

        return redirect('pekerjaans')->with(
            'diedit',
            'Pekerjaan Berhasil Diedit!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pekerjaan::destroy($id);

        return redirect('/pekerjaans')->with(
            'dihapus',
            'Pekerjaan Berhasil Dihapus!'
        );
    }
}
