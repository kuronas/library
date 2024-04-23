<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function admin(){
        $peminjaman = Peminjaman::with(['user','buku'])->get();
        return view('admin.peminjaman',['peminjaman' => $peminjaman]);
    }
    public function index($id){
        $bukus = Buku::all();    
        return view('user.home',['bukus' => $bukus]);
    }

 


    public function store(Request $request)
{
    $userId = Auth::id();
    $userBookCount = Peminjaman::where('user_id', $userId)->count();

    // if ($userBookCount >= 3) {
    //     return redirect('home')->with('status', 'You have reached the maximum limit of 3 books.');
    // }

    // $bookId = $request->buku_id;
    // $existingPeminjaman = Peminjaman::all()
    //     ->where('buku_id', $bookId)
    //     ->first();

    // if ($existingPeminjaman) {
    //     return redirect('home')->with('status', 'Someone has already borrowed this book.');
    // }

    $request['name'] = Auth::user()->name;
    $request['user_id'] = $userId;
    $request['tanggal_peminjaman'] = Carbon::now()->toDateString();
    $request['tanggal_pengembalian'] = Carbon::now()->addDay(7)->toDateString();
    $request->status = 'In Progress';

    $peminjaman = Peminjaman::create($request->all());
    return redirect('home')->with('status', 'Data added successfully!');
}


public function datapeminjaman()
{
    $userId = auth()->user()->id;
    $peminjaman = Peminjaman::where('user_id', $userId)->with(['user', 'buku'])->get();
    return view('user.datapeminjaman', ['peminjaman' => $peminjaman]);
}


    public function approved($id){

        $peminjaman = Peminjaman::find($id);
        $peminjaman->status='sedang dipinjam';
        $peminjaman->save();
        return redirect()->back();
    }

    public function notapproved($id){

        $peminjaman = Peminjaman::find($id);
        $peminjaman->status='tidak disetujui';
        $peminjaman->save();
        return redirect()->back();
    }

    public function back($id){

        $peminjaman = Peminjaman::find($id);
        $peminjaman->status='telah dikembalikan';
        $peminjaman->save();
        return redirect()->back();
    }

    public function exportpdf(){
        $data = Peminjaman::all();

        view()->share('data' ,$data);
        $pdf = Pdf::loadview('admin/datapeminjaman-pdf');
        return $pdf->download('data.pdf');
    }
}
