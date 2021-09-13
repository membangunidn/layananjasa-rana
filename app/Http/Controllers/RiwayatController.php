<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Transaksi;
use DataTables;
use App\Helpers\Tanggal;
class RiwayatController extends Controller
{
    public function load_data(Request $request) {

        if(!$request->ajax()) {
            abort(404);
        }
        $trx = Transaksi::with(['layananjasa'])
            ->where('idcustomer', Auth::user()->id)
            ->get();

        return DataTables::of($trx)
        ->addColumn('_status', function ($trx) {
           if($trx->status == 'P') {
                $_status = '<span class="label label-warning label-inline font-weight-bolder">Pending</span>';
           }
           else {
               $_status = '<span class="label label-success label-inline font-weight-bolder">Lunas</span>';
           }
           return $_status;
        })
        ->addColumn('aksi', function ($trx) {
            return '<button id="tombol_detail" type="button" class="btn btn-sm btn-primary font-weight-bold btn-icon" 
                        data-invoice="'.$trx->invoice.'" title="Lihat Detail">
                        <i class="fas fa-eye"></i>
                    </button>';
        })
        ->editColumn('harga', function($trx) {
            return 'Rp. '.number_format($trx->harga, 2);
        })
        ->addIndexColumn()
        ->rawColumns(['aksi', '_status', 'isaktif'])
        ->make(true);
    }

    public function list_riwayatpesanan(){
        return view('content.list_riwayatpesanan');
    }

    public function detail(Request $request) {
        
        $trx = Transaksi::with(['layananjasa'])
            ->where('invoice', $request->invoice)->first()->toArray();

        return view('popup.pop_detailpemesanan', compact('trx'));
    }
}
