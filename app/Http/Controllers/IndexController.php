<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class IndexController extends Controller
{
    public function index()
    {
        $hitung_rental = DB::table('rentals')->get()->count();
        $hitung_mobil = DB::table('mobils')->get()->count();
        $mobil = DB::table('mobils')->get();
        return view('index', ['mobil' => $mobil, 'hitung_rental'=>$hitung_rental, 'hitung_mobil'=> $hitung_mobil]);
    }

}