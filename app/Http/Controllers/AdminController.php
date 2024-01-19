<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        
        $hitung_rental = DB::table('rentals')->get()->count();
        $hitung_biaya = DB::table('rentals')->sum('biaya');
        $brio = DB::table('rentals')->where('mobil_id', 'brio')->count();
        $civic = DB::table('rentals')->where('mobil_id', 'civic')->count();
        $city = DB::table('rentals')->where('mobil_id', 'city')->count();
        $agya = DB::table('rentals')->where('mobil_id', 'agya')->count();
        $ertiga = DB::table('rentals')->where('mobil_id', 'ertiga')->count();
        $alves = DB::table('rentals')->where('mobil_id', 'alves')->count();
        $stargazer = DB::table('rentals')->where('mobil_id', 'stargazer')->count();
        $ionic = DB::table('rentals')->where('mobil_id', 'ionic 5')->count();
        $rental = DB::table('rentals')->get();
        $hitung_mobil = DB::table('mobils')->get()->count();
        $mobil = DB::table('mobils')->get();
        return view('layouts.index', ['rental' => $rental, 'mobil' => $mobil, 'hitung_rental'=> $hitung_rental, 'hitung_mobil' => $hitung_mobil, 'hitung_biaya'=> $hitung_biaya, 'brio'=> $brio, 'civic'=> $civic,  'city'=> $city, 'agya'=> $agya, 'ertiga'=> $ertiga, 'alves'=> $alves, 'stargazer'=> $stargazer, 'ionic'=> $ionic]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'nama' => 'required|string',
            'status' => 'required|boolean'
        ]);

        $admin = new Admin();
        $admin->username = $request->usermame;
        $admin->password = $request->password;
        $admin->nama = $request->nama;
        $admin->status = $request->status;
        $admin->save();

        return response()->redirectTo('/admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.update', compact('admin'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'nama' => 'required|string',
            'status' => 'required|boolean'
        ]);

        $admin = new Admin();
        $admin->username = $request->usermame;
        $admin->password = $request->password;
        $admin->nama = $request->nama;
        $admin->status = $request->status;
        $admin->save();

        return response()->redirectTo('/admin');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return response()->redirectTo('/admin');
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('');

    }
}