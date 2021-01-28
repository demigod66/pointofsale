<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    
    {
        $pelanggan = Pelanggan::simplePaginate(5);
        return view('admin.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        return view('admin.pelanggan.create', compact('pelanggan'));
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
            'kode' => 'required|between:2,5|numeric',
            'nama' => 'required|min:3|max:12',
            'alamat' => 'required',
            'nohp' => 'required',
            'namapimpinan' => 'required',
            'namaadmin' => 'required'
        ]);


       

        $pelanggan = Pelanggan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' =>$request->nohp,
            'namapimpinan' => $request->namapimpinan,
            'namaadmin' => $request->namaadmin
        ]);

        return redirect()->route('pelanggan.index')->with('success','Data Berhasil di Update');
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
        $pelanggan = Pelanggan::findorfail($id);
        return view('admin.pelanggan.edit', compact('pelanggan'));

        return redirect()->route('pelanggan.index')->with('success','Data Berhasil di Update');
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
            'namapimpinan' =>'required',
            'namaadmin' =>'required',
        ]);

        $pelanggan_data = [
            'id' => $id,
            'kode' => request()->kode,
            'nama' => request()->nama,
            'alamat' => request()->alamat,
            'nohp' => request()->nohp,
            'namapimpinan' => request()->namapimpinan,
            'namaadmin' => request()->namaadmin,
        ];

        Pelanggan::whereId($id)->update($pelanggan_data);

        return redirect()->route('pelanggan.index')->with('success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findorfail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success','Data Berhasil Dihapus');
        
    }
}