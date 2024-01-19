<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RentalController extends Controller
{
    
    public function index()
    {
      $rental = DB::table('rentals')->get();
      $mobil = DB::table('mobils')->get();
      
      return view('pages.admin.rental.rental', ['rental' => $rental, 'mobil' => $mobil]);
      
    }

    public function simpan_rental(Request $request)
    {
        DB::table('rentals')->insert([ 
            'id' => $request->id,
            'mobil_id' => $request->mobil_id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'tanggal_sewa' => $request->tanggal_sewa,
            'sampai_tanggal_sewa' => $request->sampai_tanggal_sewa,
            'biaya' => $request->biaya
        ]);
        $rental = DB::table('rentals')->get();
        $mobil = DB::table('mobils')->get();
        return view('pages.admin.rental.rental', ['rental' => $rental, 'mobil' => $mobil]);
    }


    public function view()
    {
        
        return view('pages.admin.rental.rental');

    }


    public function show()
    {
        $data = Rental::all();
        return view('pages.admin.rental.rental', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rental.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
        ]);

        $rental = new Rental();
        $rental->nama = $request->nama;
        $rental->save();

        return response()->redirectTo('/rental');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        return view('rental.update', compact('rental'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update_rental(Request $request,$id)
     {
       session()->start();

        $preferences = DB::table('rentals')->where('id', $id)
       ->update([
        'id' => $request->id,
        'mobil_id' => $request->mobil_id,
        'nama_pelanggan' => $request->nama_pelanggan,
        'tanggal_sewa' => $request->tanggal_sewa,
        'sampai_tanggal_sewa' => $request->sampai_tanggal_sewa,
        'biaya' => $request->biaya
       ]);
       $rental = DB::table('rentals')->get();
       $mobil = DB::table('mobils')->get();
       return view('pages.admin.rental.rental', ['rental' => $rental, 'mobil' => $mobil]);
    
    }
       
    

    /**
     * Remove the specified resource from storage.
     */
    public function hapus_rental($id)
    {
        session()->start();
        $rental = DB::table('rentals')->where('id', $id)->delete();
        $rental = DB::table('rentals')->get();
        $mobil = DB::table('mobils')->get();
        return view('pages.admin.rental.rental', ['rental' => $rental, 'mobil' => $mobil]);
        
    }
}
