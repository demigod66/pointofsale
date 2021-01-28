<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;

class Pembelian extends Model
{

    protected $table = "table_belim";
    protected $fillable = ['nobuk', 'tanggal', 'idpem', 'ket', 'total'];



    public function pemasok()
    {
        return $this->belongsTo('App\Pemasok');
    }
}

Blade::directive('currency', function ($expression) {
    return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
});
