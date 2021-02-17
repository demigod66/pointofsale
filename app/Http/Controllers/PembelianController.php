<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use App\Pembelian;
use App\Pemasok;
use App\Persediaan;
use App\PembelianDetail;
use App\BeliMaster;


class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembeliand = PembelianDetail::all();
        $pemasok = Pemasok::all();
        $pembelian = Pembelian::all();
        $persediaan = Persediaan::all();
        $belimaster = BeliMaster::all();
        $nouser = "001";
        $tanggal = "INK" . date('YmdHis') . $nouser;
        return view('admin.pembelian.index', compact('pembelian', 'pemasok', 'pembeliand', 'persediaan', 'tanggal', 'belimaster'));
    }




    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nobuk' => 'required',
            'tanggal' => 'required',
            'idpem' => 'required',
            'ket'  => 'required',
            'qty' => 'required|numeric',
            'harga' => 'required|numeric',
            'persediaan_id' => 'required'
        ]);

        PembelianDetail::create([
            'nobukti' => $request->nobuk,
            'qty' => $request->qty,
            'persediaan_id' => $request->persediaan_id,
            'harga' => $request->harga,
        ]);

        BeliMaster::create([
            'nobuk' => $request->nobuk,
            'tanggal' => $request->tanggal,
            'idpem' => $request->idpem,
            'ket' => $request->ket

        ]);



        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nobukti)
    {
        $pembeliand = PembelianDetail::findorfail($nobukti);
        $pemasok = Pemasok::all();
        return view('admin.pembelian.print', compact('pembeliand', 'pemasok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembeliand = PembelianDetail::findorfail($id);
        $pembeliand->delete();
        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil Dihapus');
    }
}
