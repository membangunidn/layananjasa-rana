<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayananJasa extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'idlayanan';

    protected $fillable = array(
        'iduser', 'idkategori', 'layanan', 'deskripsilayanan', 
        'hargalayanan', 'rating', 'displaylayanan', 'isaktif',
        'created_by', 'created_at', 'updated_at'
    );
}
