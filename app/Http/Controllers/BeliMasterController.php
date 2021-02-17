<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BeliMaster;
use App\Pembelian;
use App\PembelianDetail;
use App\Pemasok;
use App\Persediaan;

class BeliMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelian = Pembelian::all();
        $pembeliand = PembelianDetail::all();
        $belimaster = BeliMaster::paginate(5);
        $pemasok = Pemasok::all();
        return view('admin.belimaster.index', compact('belimaster', 'pembelian', 'pembeliand', 'pemasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $belimaster = BeliMaster::findorfail($id);
        $pembelian = Pembelian::all();
        $pemasok = Pemasok::all();
        $pembeliand = PembelianDetail::all();
        $persediaan = Persediaan::all();
        return view('admin.belimaster.edit', compact('belimaster', 'pembelian', 'pembeliand', 'pemasok', 'persediaan'));
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
        $this->validate($request, [
            'tanggal' => 'required',
            'idpem' => 'required',
            'ket' => 'required|min:3|max:30'
        ]);


        $belimaster_data = [
            'tanggal' => $request->kode,
            'idpem' => $request->idpem,
            'ket' => $request->ket,
        ];

        BeliMaster::whereId($id)->update($belimaster_data);
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
