<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Models\KoleksiPribadi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $newName='';
        if($request->file('image')){
            $extension = $request->file('image')->getCLientOriginalExtension();
            $newName = $request->judul.'.'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }
        $request['cover'] = $newName;
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
   
 
       if($request->file('image')){
        $extension = $request->file('image')->getCLientOriginalExtension();
        $newName = $request->judul.'.'.now()->timestamp.'.'.$extension;
        $request->file('image')->storeAs('cover', $newName);
        $request['cover'] = $newName;
       }
       $buku = Buku::where('slug', $slug)->first();
   
      $buku->update($request->all());

    $buku = Buku::where('slug', $slug)->first();
    if($request->kategoris){
        $buku->kategoris()->sync($request->kategoris);
     }
 
       return redirect('buku')->with('status', 'buku sudah di update');
    }
    public function delete($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        return view('admin.delete-buku' ,['buku' => $buku]);
    }

    
    public function destroy($slug){
        $buku = Buku::where('slug', $slug)->first();
        $buku ->delete();

        return redirect('buku')->with('status', 'buku sudah dihapus');
    }

    public function deletedbuku(){

        $deletedBuku = Buku::onlyTrashed()->get();
        return view('admin.buku-sampah',['deletedbuku' => $deletedBuku]);
    }
    public function restore($slug){

        $buku = Buku::withTrashed()->where('slug', $slug)->first();
        $buku->restore();
        return redirect('buku')->with('status', 'buku sudah di kembalikan');
    }
    public function forceDelete($slug){

        $buku = Buku::withTrashed()->where('slug', $slug)->first();
        $buku->forceDelete();
        return redirect('buku')->with('status', 'buku sudah di kembalikan');
    }


    public function detailbuku($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        $bukus = Buku::all();
        $kategoris = Kategoribuku::all();
       

        // Get the user's favorite book IDs
        $userId = Auth::id();
        $ulasan = Ulasan::where('user_id', $userId)->with(['user', 'buku'])->get();
        $koleksipribadi = KoleksiPribadi::where('user_id', $userId)->pluck('buku_id')->toArray();
        return view('user.detail-buku', ['kategoris' => $kategoris, 'buku' => $buku, 'koleksipribadi' => $koleksipribadi, 'ulasan' => $ulasan]);
    }

    public function exportpdfs(){
        $data = Buku::all();

        view()->share('data' ,$data);
        $pdf = Pdf::loadview('admin/databuku-pdf');
        return $pdf->download('data.pdf');
    }
}




