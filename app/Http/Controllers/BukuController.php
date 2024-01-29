<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $bukus = Buku::all();
        return view('admin.buku',['bukus' => $bukus]);
    }

    public function tambah(){

        $kategoris = KategoriBuku::all();
        return view('admin.add-bku',['kategoris' => $kategoris]);
    }

    public function store(Request $request){

    
     
        $validated = $request->validate([
            'judul' => 'required|unique:buku|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahunterbit' => 'required|max:255',
        ]);
        $buku = Buku::create($request -> all());
        $buku->kategoris()->sync($request->kategoribuku);
        return redirect('buku')->with('status', 'Data add Succesfully!');
    }

    public function edit($slug){
        $buku = Buku::where('slug', $slug)->first();
        $kategoris = Kategoribuku::all();
        return view('admin.edit-buku',['kategoris' => $kategoris, 'buku' => $buku]);
    }

    public function update(Request $request,$slug){
       
       $buku = Buku::where('slug', $slug)->first();
   
       $buku->update($request->all());

       if($request->kategoris){
        $buku->kategoris()->sync($request->ketegoris);
        return redirect('buku')->with('status', 'Data update Succesfully!');
       }
    }
}
