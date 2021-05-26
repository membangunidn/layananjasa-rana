<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenpen extends Model
{
    protected $table = 'jenjangpendidikan';
    protected $primaryKey = 'idjenjang';

    protected $fillable = array(
        'kodejenjang', 'jenjangpendidikan', 'created_by', 'created_at', 'updated_at'
    );
}
