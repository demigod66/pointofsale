<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    protected $table = 'table_belid';
    protected $fillable = ['nobukti', 'qty', 'harga', 'subtotal', 'persediaan_id'];

    public function persediaan()
    {
        return $this->belongsTo('App\Persediaan', 'persediaan_id');
    }

    public function belimaster()
    {
        return $this->belongsTo('App\BeliMaster');
    }

    use HasFactory;
}
