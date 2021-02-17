<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemasok;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasok = Pemasok::all();
        return view('admin.pemasok.index', compact('pemasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemasok.create');
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
            'kode' => 'required',
            'nama' => 'required|min:3',
            'alamat' => 'required',
            'nohp' => 'required',
            'namapimpinan' => 'required',
            'namaadmin' => 'required'
        ]);


        Pemasok::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'namapimpinan' => $request->namapimpinan,
            'namaadmin' => $request->namaadmin
        ]);

        return redirect()->route('pemasok.index')->with('success', 'Data Berhasil di Update');
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
        $pemasok = Pemasok::findorfail($id);
        return view('admin.pemasok.edit', compact('pemasok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        Request()->validate([
            'kode' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'namapimpinan' => 'required',
            'namaadmin' => 'required',
        ]);

        $pemasok_data = [
            'id' => $id,
            'kode' => request()->kode,
            'nama' => request()->nama,
            'alamat' => request()->alamat,
            'nohp' => request()->nohp,
            'namapimpinan' => request()->namapimpinan,
            'namaadmin' => request()->namaadmin,
        ];

        Pemasok::whereId($id)->update($pemasok_data);

        return redirect()->route('pemasok.index')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasok = Pemasok::findorfail($id);
        $pemasok->delete();
        return redirect()->route('pemasok.index')->with('success', 'Data Berhasil Dihapus');
    }
}
