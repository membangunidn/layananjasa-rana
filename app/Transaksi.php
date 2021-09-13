<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'idtransaksi';
    protected $guarded = [];
    public $timestamps = false;

    public function layananjasa() {
        return $this->belongsTo(LayananJasa::class, 'idlayanan');
    }

    public function seller() {
        return $this->belongsTo(Biodata::class, 'idpenyediajasa', 'iduser');
    }

    public function lokasi() {
        return $this->belongsTo(Lokasi::class, 'idlokasicustomer', 'idlokasi');
    }
}
