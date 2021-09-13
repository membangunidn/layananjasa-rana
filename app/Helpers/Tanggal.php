<?php

namespace App\Helpers;

use DateTime;
use Illuminate\Support\Carbon;

class Tanggal {

    public static function getBulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}

    public static function getTanggalIndo($tgl) {
        $ubah = date($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = self::getBulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun;
    }

    public static function getNamaHari($tanggal) {
        $ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
    }

    public static function WaktuMundur($wkt) {
        date_default_timezone_set("Asia/Bangkok");
        $today = strtotime(date('Y-m-d H:i:s'));
        $waktu = strtotime($wkt);
        $diff = $today - $waktu;

        $jam   = floor($diff / (60 * 60));
        $menit = $diff - $jam * (60 * 60);
        $akhir = $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit yang lalu';

        return $akhir;
    }

    public static function tanggal_indo($tanggal){
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $tanggal)->format('Y-m-d');
		$time = Carbon::createFromFormat('Y-m-d H:i:s', $tanggal)->format('H:i:s');  
	
		return self::getNamaHari($date).', '.self::getTanggalIndo($date). ', '.$time;
	}

	public static function only_tanggal($tanggal, $hari = true) {
		$time = Carbon::createFromFormat('Y-m-d H:i:s', $tanggal)->format('H:i:s');  
		$date = Carbon::createFromFormat('Y-m-d H:i:s', $tanggal)->format('Y-m-d');
		return self::getTanggalIndo($date);
		
        if($hari == true) {
			$date = Carbon::createFromFormat('Y-m-d', $tanggal)->format('Y-m-d');
            return self::getNamaHari($date).', '.self::getTanggalIndo($date);
        }
	
	}

	/** konversi bulan tahun
	 * format default dari @param tglthn = 01-2020
	 */
	public static function bulanTahun($tglthn) {
		$bulan = substr($tglthn, 0,2);
		$tahun = substr($tglthn, 3);
		$bln = '';
		switch ($bulan) {
			case '01':
				$bln = 'Januari';
				break;
			case '02':
				$bln = 'Pebruari';
				break;
			case '03':
				$bln = 'Maret';
				break;
			case '04':
				$bln = 'April';
				break;
			case '05':
				$bln = 'Mei';
				break;
			case '06':
				$bln = 'Juni';
				break;
			case '07':
				$bln = 'Juli';
				break;
			case '08':
				$bln = 'Agustus';
				break;
			case '09':
				$bln = 'September';
				break;
			case '10':
				$bln = 'Oktober';
				break;
			case '11':
				$bln = 'Nopember';
				break;
																																							
			case '12':
				$bln = 'Desember';
				break;
		}

		return $bln.', '.$tahun;
	}
}