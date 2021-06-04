<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'idlokasi';

    protected $fillable = array(
        'kodelokasi', 'lokasi', 'created_by', 'created_at', 'updated_at', 'slug'
    );
}
