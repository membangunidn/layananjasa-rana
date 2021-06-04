<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategorijasa';
    protected $primaryKey = 'idkategori';

    protected $fillable = array(
        'kodekategori', 'kategorijasa', 'created_by', 'created_at', 'updated_at', 'slug'
    );
}
