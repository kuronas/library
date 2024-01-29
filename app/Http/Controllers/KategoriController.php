<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategoris = KategoriBuku::all();
        return view('admin.kategori',['kategoris' => $kategoris]);
    }

    public function tambah(){
     
        return view('admin.tambah_kategori');
    }

    public function store(Request $request){
     
        $validated = $request->validate([
            'name' => 'required|unique:kategoribuku|max:255',
           
        ]);
        $kategori = KategoriBuku::create($request -> all());
        return redirect('kategori')->with('status', 'Data add Succesfully!');
    }

    public function edit($slug){

        $kategori = KategoriBuku::where('slug',$slug)->first();
        return view('admin.edit_kategori',['kategori' => $kategori]);
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required|unique:kategoribuku|max:255',
        ]);
    
        $kategori = KategoriBuku::where('slug', $slug)->first();

        $kategori->update($request->all());
        return redirect('kategori')->with('status', 'Data update Succesfully!');
  
    }
    public function delete($slug){

        $kategori = KategoriBuku::where('slug', $slug)->first();
        return view('admin.kategori-delete' ,['kategori' => $kategori]);
     
    }
    public function destroy($slug){
        $kategori = KategoriBuku::where('slug', $slug)->first();
        $kategori->delete();
        return redirect('kategori')->with('alert', 'kategori sudah dihapus');
    }
}
