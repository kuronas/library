<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\KoleksiPribadi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    public function index(){
        $userId = auth()->user()->id;
        $buku = Buku::all();
        $koleksi = KoleksiPribadi::where('user_id', $userId)->with(['user', 'buku'])->get();
        return view('user.koleksi', ['koleksi' => $koleksi,'buku' => $buku ] );
    }

    public function store(Request $request){
        $userId = Auth::id();
        $bookId = $request->buku_id;
        $existingKoleksi = KoleksiPribadi::where('user_id', $userId)
            ->where('buku_id', $bookId)
            ->first();
    
        if ($existingKoleksi) {
            return redirect('home')->with('status', 'this book already yours favorite.');
        }
        $request['user_id'] = $userId;
        
        $koleksi = KoleksiPribadi::create($request->all());
        return redirect('home')->with('status', 'Data added successfully!');
    }

    public function delete($id){
        $koleksi = $deleted = DB::table('koleksipribadi')->where('id', $id)->delete();
        return redirect('koleksi')->with('alert', 'kategori sudah dihapus');
    }
}
