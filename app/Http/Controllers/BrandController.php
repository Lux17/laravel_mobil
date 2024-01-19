<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BrandController extends Controller
{
    
    public function index()
    {
      $brand = DB::table('brands')->get();
      return view('pages.admin.brand.brand', ['brand' => $brand]);
      
    }

    public function simpan_brand(Request $request)
    {
        DB::table('brands')->insert([ 
            'id' => $request->id,
            'nama' => $request->nama
        ]);
        $brand = DB::table('brands')->get();
        return view('pages.admin.brand.brand', ['brand' => $brand]);
    }


    public function view()
    {
        
        return view('pages.admin.brand.brand');

    }


    public function show()
    {
        $data = Brand::all();
        return view('pages.admin.brand.brand', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
        ]);

        $brand = new Brand();
        $brand->nama = $request->nama;
        $brand->save();

        return response()->redirectTo('/brand');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brand.update', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update_brand(Request $request,$id)
     {
       session()->start();

        $preferences = DB::table('brands')->where('id', $id)
       ->update([
       'id'=> request()->id,
       'nama'=> request()->nama
       ]);
 
       $brand = DB::table('brands')->get();
       return view('pages.admin.brand.brand', ['brand' => $brand]);
    
    }
       
    

    /**
     * Remove the specified resource from storage.
     */
    public function hapus_brand($id)
    {
        session()->start();
        $brand = DB::table('brands')->where('id', $id)->delete();
        $brand = DB::table('brands')->get();
        return view('pages.admin.brand.brand', ['brand' => $brand]);
        
    }
}
