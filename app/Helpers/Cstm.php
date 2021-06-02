<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\User;

class Cstm {

    public static function getBiodataPengajuan($id) {

        $query = "SELECT b.*, jk.jeniskeahlian, l.lokasi, jp.jenjangpendidikan FROM biodata b JOIN jeniskeahlian jk using(idkeahlian)
        JOIN lokasi l using(idlokasi) JOIN jenjangpendidikan jp using(idjenjang)
        WHERE b.iduser = ".$id;

        return DB::select($query) ? DB::select($query)[0] : null;
    }
}