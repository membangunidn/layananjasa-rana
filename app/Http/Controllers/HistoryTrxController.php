<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use Auth;
use App\Helpers\Tanggal;
use DataTables;

class HistoryTrxController extends Controller
{

    public function load_data(Request $request) {

        if(!$request->ajax()) {
            abort(404);
        }

        if(Auth::user()->role->role == 'ADMIN') {
            $trx = Transaksi::with([
            'layananjasa' => function($q) {
                $q->select('idlayanan', 'layanan');
            }, 
            'seller' => function($q) {
                $q->select('iduser', 'namalengkap');
            }
            ])->get();
        }
        else {
            $trx = Transaksi::with([
                'layananjasa' => function($q) {
                    $q->select('idlayanan', 'layanan');
                }, 
                'seller' => function($q) {
                    $q->select('iduser', 'namalengkap');
                }
            ])
                ->where('idpenyediajasa', Auth::user()->id)
                ->get();
        }

        return DataTables::of($trx)
            ->addColumn('_status', function ($trx) {

                if($trx->idpenyediajasa == Auth::user()->id) {
                    if($trx->status == 'P') {
                        $_status = '<span style="cursor:pointer" id="modalstatus" data-invoice="'.$trx->invoice.'" 
                        data-status="'.$trx->status.'"    
                        class="label label-warning label-inline font-weight-bolder">Pending</span>';
                    }
                    else {
                        $_status = '<span style="cursor:pointer" class="label label-success label-inline font-weight-bolder">Lunas</span>';
                    }
                } 
                else {
                    if($trx->status == 'P') {
                        $_status = '<span class="label label-dark label-inline font-weight-bolder">Pending</span>';
                    }else {
                    $_status = '<span class="label label-dark label-inline font-weight-bolder">Lunas</span>';
                    }
                }
            return $_status;
            })
            ->addColumn('aksi', function ($trx) {
                return '<button id="tombol_detail" type="button" class="btn btn-sm btn-success font-weight-bold btn-icon" 
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

    public function index() {
        return view('content.list_historitransaksi');
    }

    public function update_status(Request $request) {

        Transaksi::where('invoice', $request->invoice)
            ->update([
                'status' => $request->status,
                'accepted_at' => $this->date(),
                'accepted_by' => Auth::user()->biodata->namalengkap
            ]);

        return response()->json([
                'msg' => 'Berhasil mengubah status',
            ], 201);
    }

    public function detail(Request $request) {
        $trx = Transaksi::with([
            'layananjasa' => function($q) {
                $q->select('idlayanan', 'layanan');
            }, 
            'seller' => function($q) {
                $q->select('iduser', 'namalengkap' , 'notelp');
            },
            'lokasi'
        ])->where('invoice', $request->invoice)
        ->first();

        return view('popup.pop_detailtransaksi', compact('trx'));

        // $this->debug($trx); die;
    }
}
