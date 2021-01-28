<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    protected $table = "table_persediaan";
    protected $fillable = ['namastok'];
    use HasFactory;


    public function pembeliandetail()
    {
        return $this->hasMany('App\PembelianDetail', 'id_persediaan');
    }
}
