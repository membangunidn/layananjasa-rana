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

    public static function slug($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}