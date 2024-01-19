<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MobilController extends Controller
{
    
    public function index()
    {
      $mobil = DB::table('mobils')->get();
      $brand = DB::table('brands')->get();
      return view('pages.admin.mobil.mobil', ['mobil' => $mobil,'brand' => $brand]);
      
    }

    public function simpan_mobil(Request $request)
    {
        DB::table('mobils')->insert([ 
            'id' => $request->id,
            'brand_id' => $request->brand_id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'status' => $request->status
        ]);

        $mobil = DB::table('mobils')->get();
        $brand = DB::table('brands')->get();
        return view('pages.admin.mobil.mobil', ['mobil' => $mobil,'brand' => $brand]);
    }


    public function view()
    {
        
        return view('pages.admin.mobil.mobil');

    }


    public function show()
    {
        $data = MObil::all();
        return view('pages.admin.mobil.mobil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mobil.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
        ]);

        $mobil = new Mobil();
        $mobil->nama = $request->nama;
        $mobil->save();

        return response()->redirectTo('/mobil');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        return view('mobil.update', compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update_mobil(Request $request,$id)
     {
       session()->start();

        $preferences = DB::table('mobils')->where('id', $id)
       ->update([
        'id' => $request->id,
        'brand_id' => $request->brand_id,
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'status' => $request->status
       ]);
 
       $mobil = DB::table('mobils')->get();
       $brand = DB::table('brands')->get();
       return view('pages.admin.mobil.mobil', ['mobil' => $mobil,'brand' => $brand]);
    
    }
       
    

    /**
     * Remove the specified resource from storage.
     */
    public function hapus_mobil($id)
    {
        session()->start();
        $mobil = DB::table('mobils')->where('id', $id)->delete();
        $mobil = DB::table('mobils')->get();
        $brand = DB::table('brands')->get();
        return view('pages.admin.mobil.mobil', ['mobil' => $mobil,'brand' => $brand]);
        
    }
}
