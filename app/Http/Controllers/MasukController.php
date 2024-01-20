<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class MasukController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('admin');
        }else{
            return view('login');
        }
        return view('login');
    }

    public function actionlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            // Validasi berhasil, cek apakah pengguna memiliki peran admin
            if (Auth::user()->rolename === 'admin') {
                session()->start();

                $hitung_biaya = DB::table('rentals')->sum('biaya');
                $hitung_rental = DB::table('rentals')->get()->count();
                $rental = DB::table('rentals')->get();
                $hitung_mobil = DB::table('mobils')->get()->count();
                $brio = DB::table('rentals')->where('mobil_id', 'brio')->count();
                $civic = DB::table('rentals')->where('mobil_id', 'civic')->count();
                $city = DB::table('rentals')->where('mobil_id', 'city')->count();
                $agya = DB::table('rentals')->where('mobil_id', 'agya')->count();
                $ertiga = DB::table('rentals')->where('mobil_id', 'ertiga')->count();
                $alves = DB::table('rentals')->where('mobil_id', 'alves')->count();
                $stargazer = DB::table('rentals')->where('mobil_id', 'stargazer')->count();
                $ionic = DB::table('rentals')->where('mobil_id', 'ionic 5')->count();
                $mobil = DB::table('mobils')->get();
                return view('layouts.index', ['rental' => $rental, 'mobil' => $mobil, 'hitung_rental'=> $hitung_rental, 'hitung_mobil' => $hitung_mobil, 'hitung_biaya' => $hitung_biaya, 'brio'=> $brio, 'civic'=> $civic,  'city'=> $city, 'agya'=> $agya, 'ertiga'=> $ertiga, 'alves'=> $alves, 'stargazer'=> $stargazer, 'ionic'=> $ionic]);

                // return view('admin.dashboard');
            }else {

                // Jika pengguna bukan admin, logout dan arahkan ke halaman lain
              
                return view('user.layouts.index' );
            }
        } else {

            // Jika validasi gagal, kembalikan ke halaman login dengan pesan error
            return redirect()->back()->withInput($request->only('email'))->with('error', 'Login gagal! Cek kembali email dan password Anda.');
        }
    }


    public function actionlogout()
    {
        Auth::logout();
        return redirect('');

    }
}