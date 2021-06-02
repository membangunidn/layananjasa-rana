<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';

    protected $fillable = array(
        'iduser', 'namalengkap', 'nik', 'notelp', 'npwp', 'pendidikanterakhir','jeniskelamin'
        ,'created_at', 'updated_at', 'avatar', 'isajukan', 'isapprove', 'idlokasi', 'idjenjang', 'alamat', 'pengalamankerja',
        'sertifikasi'
    );

    protected $primaryKey = 'idbiodata';

   
}
