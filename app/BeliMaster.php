<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeliMaster extends Model
{
    protected $table = 'table_belim';
    protected $fillable = ['nobuk', 'tanggal', 'idpem', 'ket'];
    use HasFactory;

    public function pemasok()
    {

        return $this->belongsTo('App\Pemasok', 'idpem');
    }
}
