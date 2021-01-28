<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    protected $table = 'table_pemasok';
    protected $fillable = ['kode', 'nama', 'alamat', 'nohp', 'namapimpinan', 'namaadmin'];

    public function pembelian()
    {
        return $this->hasOne('App\Pembelian');
    }

    public function belimaster()
    {
        return $this->hasOne('App\BeliMaster', 'idpem');
    }
}
