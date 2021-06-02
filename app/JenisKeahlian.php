<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKeahlian extends Model
{
    protected $table = 'jeniskeahlian';

    protected $fillable = array(
        'jeniskeahlian','created_at', 'updated_at', 'created_by'
    );

    protected $primaryKey = 'idkeahlian';
}
