<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Redirect;

class PesanController extends Controller
{
    public function index(Request $request)
    {
        $brand = $request->id;
        $mobil = DB::table('mobils')->where('id',$brand)->get();
        $rental = DB::table('rentals')->get();
        return view('pesan', ['mobil' => $mobil,'rental' => $rental ]);

      
    }
        
    public function simpan_customer(Request $request)
    {
        DB::table('rentals')->insert([ 
            'id' => $request->id,
            'mobil_id' => $request->mobil_id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'tanggal_sewa' => $request->tanggal_sewa,
            'sampai_tanggal_sewa' => $request->sampai_tanggal_sewa,
            'biaya' => $request->biaya
        ]);

        return redirect('/rental');
    }
    public function directwa(Request $request)
    {

            $mobil = $request->mobil;
            $nama  = $request->nama;
            $tanggal_sewa = $request->tanggal_sewa;
            $sampai_tanggal_sewa = $request->sampai_tanggal_sewa;
            $biaya = $request->biaya;
            $toDate = Carbon::parse($tanggal_sewa);
            $fromDate = Carbon::parse($sampai_tanggal_sewa);
            $hari = $toDate->diffInDays($fromDate);
            $biaya1 = $biaya * $hari;
    
            $url="https://api.whatsapp.com/send?phone=6283827911549&text=Hallo Saya ingin sewa mobil dengan rincian Sebagai Berikut: Nama : $nama, Jenis Mobil : $mobil , Tanggal : $tanggal_sewa, Sampai tanggal : $sampai_tanggal_sewa, Total : $biaya1";
        return Redirect::to($url);
    }




}