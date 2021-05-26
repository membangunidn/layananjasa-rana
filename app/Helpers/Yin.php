<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\User;

class Yin {

    public static function Check() {
        $messages = [
            // 'required' => ':attribute wajib diisi',
            // 'numeric' => ':attribute berupa angka',
            // 'unique' => ':attribute sudah digunakan, coba lagi',
            // 'min' => ':attribute harus diisi minimal :min karakter',
            // 'max' => ':attribute harus diisi maksimal :max karakter',
            // 'image' => ':attribute hanya boleh berupa jpeg/png/jpg'

            'accepted' => ':attribute harus diterima.',
            'active_url' => ':attribute bukan URL yang valid.',
            'after' => ':attribute harus tanggal setelah :date.',
            'after_or_equal' => ':attribute harus berupa tanggal setelah atau sama dengan tanggal :date.',
            'alpha' => ':attribute hanya boleh berisi huruf.',
            'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, dan strip.',
            'alpha_num' => ':attribute hanya boleh berisi huruf dan angka.',
            'array' => ':attribute harus berupa sebuah array.',
            'before' => ':attribute harus tanggal sebelum :date.',
            'before_or_equal' => ':attribute harus berupa tanggal sebelum atau sama dengan tanggal :date.',
            'between' => [
                'numeric' => ':attribute harus antara :min dan :max.',
                'file' => ':attribute harus antara :min dan :max kilobytes.',
                'string' => ':attribute harus antara :min dan :max karakter.',
                'array' => ':attribute harus antara :min dan :max item.',
            ],
            'boolean' => ':attribute harus berupa true atau false',
            'confirmed' => 'Konfirmasi :attribute tidak cocok.',
            'date' => ':attribute bukan tanggal yang valid.',
            'date_format' => ':attribute tidak cocok dengan format :format.',
            'different' => ':attribute dan :other harus berbeda.',
            'digits' => ':attribute harus berupa angka :digits.',
            'digits_between' => ':attribute harus antara angka :min dan :max.',
            'dimensions' => ':attribute tidak memiliki dimensi gambar yang valid.',
            'distinct' => ':attribute memiliki nilai yang duplikat.',
            'email' => ':attribute harus berupa alamat surel yang valid.',
            'exists' => ':attribute yang dipilih tidak valid.',
            'file' => ':attribute harus berupa sebuah berkas.',
            'filled' => ':attribute harus memiliki nilai.',
            'image' => ':attribute harus berupa gambar.',
            'in' => ':attribute yang dipilih tidak valid.',
            'in_array' => ':attribute tidak terdapat dalam :other.',
            'integer' => ':attribute harus merupakan bilangan bulat.',
            'ip' => ':attribute harus berupa alamat IP yang valid.',
            'ipv4' => ':attribute harus berupa alamat IPv4 yang valid.',
            'ipv6' => ':attribute harus berupa alamat IPv6 yang valid.',
            'json' => ':attribute harus berupa JSON string yang valid.',
            'max' => [
                'numeric' => ':attribute seharusnya tidak lebih dari :max.',
                'file' => ':attribute seharusnya tidak lebih dari :max kilobytes.',
                'string' => ':attribute seharusnya tidak lebih dari :max karakter.',
                'array' => ':attribute seharusnya tidak lebih dari :max item.',
            ],
            'mimes' => ':attribute harus dokumen berjenis : :values.',
            'mimetypes' => ':attribute harus dokumen berjenis : :values.',
            'min' => [
                'numeric' => ':attribute harus minimal :min.',
                'file' => ':attribute harus minimal :min kilobytes.',
                'string' => ':attribute harus minimal :min karakter.',
                'array' => ':attribute harus minimal :min item.',
            ],
            'not_in' => ':attribute yang dipilih tidak valid.',
            'numeric' => ':attribute harus berupa angka.',
            'present' => ':attribute wajib ada.',
            'regex' => 'Format :attribute tidak valid.',
            'required' => ':attribute wajib diisi.',
            'required_if' => ':attribute wajib diisi bila :other adalah :value.',
            'required_unless' => ':attribute wajib diisi kecuali :other memiliki nilai :values.',
            'required_with' => ':attribute wajib diisi bila terdapat :values.',
            'required_with_all' => ':attribute wajib diisi bila terdapat :values.',
            'required_without' => ':attribute wajib diisi bila tidak terdapat :values.',
            'required_without_all' => ':attribute wajib diisi bila tidak terdapat ada :values.',
            'same' => ':attribute dan :other harus sama.',
            'size' => [
                'numeric' => ':attribute harus berukuran :size.',
                'file' => ':attribute harus berukuran :size kilobyte.',
                'string' => ':attribute harus berukuran :size karakter.',
                'array' => ':attribute harus mengandung :size item.',
            ],
            'string' => ':attribute harus berupa string.',
            'timezone' => ':attribute harus berupa zona waktu yang valid.',
            'unique' => ':attribute sudah ada sebelumnya.',
            'uploaded' => ':attribute gagal diunggah.',
            'url' => 'Format :attribute tidak valid.',

        ];

        return $messages;
    }


    public static function withValidator(){
        $messages = [
            // 'required' => 'Form diatas wajib diisi',
            // 'numeric' => 'Form diatas berupa angka',
            // 'unique' => 'Form diatas sudah digunakan, coba lagi',
            // 'min' => 'Form diatas harus diisi minimal :min karakter',
            // 'max' => 'Form diatas harus diisi maksimal :max karakter',
            // 'image' => 'Form diatas hanya boleh berupa jpeg/png/jpg'

            'accepted' => 'Form diatas harus diterima.',
            'active_url' => 'Form diatas bukan URL yang valid.',
            'after' => 'Form diatas harus tanggal setelah :date.',
            'after_or_equal' => 'Form diatas harus berupa tanggal setelah atau sama dengan tanggal :date.',
            'alpha' => 'Form diatas hanya boleh berisi huruf.',
            'alpha_dash' => 'Form diatas hanya boleh berisi huruf, angka, dan strip.',
            'alpha_num' => 'Form diatas hanya boleh berisi huruf dan angka.',
            'array' => 'Form diatas harus berupa sebuah array.',
            'before' => 'Form diatas harus tanggal sebelum :date.',
            'before_or_equal' => 'Form diatas harus berupa tanggal sebelum atau sama dengan tanggal :date.',
            'between' => [
                'numeric' => 'Form diatas harus antara :min dan :max.',
                'file' => 'Form diatas harus antara :min dan :max kilobytes.',
                'string' => 'Form diatas harus antara :min dan :max karakter.',
                'array' => 'Form diatas harus antara :min dan :max item.',
            ],
            'boolean' => 'Form diatas harus berupa true atau false',
            'confirmed' => 'Konfirmasi Form diatas tidak cocok.',
            'date' => 'Form diatas bukan tanggal yang valid.',
            'date_format' => 'Form diatas tidak cocok dengan format :format.',
            'different' => 'Form diatas dan :other harus berbeda.',
            'digits' => 'Form diatas harus berupa angka :digits.',
            'digits_between' => 'Form diatas harus antara angka :min dan :max.',
            'dimensions' => 'Form diatas tidak memiliki dimensi gambar yang valid.',
            'distinct' => 'Form diatas memiliki nilai yang duplikat.',
            'email' => 'Form diatas harus berupa alamat surel yang valid.',
            'exists' => 'Form diatas yang dipilih tidak valid.',
            'file' => 'Form diatas harus berupa sebuah berkas.',
            'filled' => 'Form diatas harus memiliki nilai.',
            'image' => 'Form diatas harus berupa gambar.',
            'in' => 'Form diatas yang dipilih tidak valid.',
            'in_array' => 'Form diatas tidak terdapat dalam :other.',
            'integer' => 'Form diatas harus merupakan bilangan bulat.',
            'ip' => 'Form diatas harus berupa alamat IP yang valid.',
            'ipv4' => 'Form diatas harus berupa alamat IPv4 yang valid.',
            'ipv6' => 'Form diatas harus berupa alamat IPv6 yang valid.',
            'json' => 'Form diatas harus berupa JSON string yang valid.',
            'max' => [
                'numeric' => 'Form diatas seharusnya tidak lebih dari :max.',
                'file' => 'Form diatas seharusnya tidak lebih dari :max kilobytes.',
                'string' => 'Form diatas seharusnya tidak lebih dari :max karakter.',
                'array' => 'Form diatas seharusnya tidak lebih dari :max item.',
            ],
            'mimes' => 'Form diatas harus dokumen berjenis : :values.',
            'mimetypes' => 'Form diatas harus dokumen berjenis : :values.',
            'min' => [
                'numeric' => 'Form diatas harus minimal :min.',
                'file' => 'Form diatas harus minimal :min kilobytes.',
                'string' => 'Form diatas harus minimal :min karakter.',
                'array' => 'Form diatas harus minimal :min item.',
            ],
            'not_in' => 'Form diatas yang dipilih tidak valid.',
            'numeric' => 'Form diatas harus berupa angka.',
            'present' => 'Form diatas wajib ada.',
            'regex' => 'Format Form diatas tidak valid.',
            'required' => 'Form diatas wajib diisi.',
            'required_if' => 'Form diatas wajib diisi bila :other adalah :value.',
            'required_unless' => 'Form diatas wajib diisi kecuali :other memiliki nilai :values.',
            'required_with' => 'Form diatas wajib diisi bila terdapat :values.',
            'required_with_all' => 'Form diatas wajib diisi bila terdapat :values.',
            'required_without' => 'Form diatas wajib diisi bila tidak terdapat :values.',
            'required_without_all' => 'Form diatas wajib diisi bila tidak terdapat ada :values.',
            'same' => 'Form diatas dan :other harus sama.',
            'size' => [
                'numeric' => 'Form diatas harus berukuran :size.',
                'file' => 'Form diatas harus berukuran :size kilobyte.',
                'string' => 'Form diatas harus berukuran :size karakter.',
                'array' => 'Form diatas harus mengandung :size item.',
            ],
            'string' => 'Form diatas harus berupa string.',
            'timezone' => 'Form diatas harus berupa zona waktu yang valid.',
            'unique' => 'Form diatas sudah ada sebelumnya.',
            'uploaded' => 'Form diatas gagal diunggah.',
            'url' => 'Format Form diatas tidak valid.',

        ];

        return $messages;
    }

    public static function debug($var, $die=FALSE)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        if ($die) die;
    }

}
