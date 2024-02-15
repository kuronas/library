<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function store(Request $request){
        $ulasan = new Ulasan();
        $ulasan->buku_id = $request->input('buku_id');
        $ulasan->rating = $request->input('rating');
        $ulasan->ulasan = $request->input('ulasan');
        $ulasan->user_id = Auth::user()->id;
        $ulasan->save();
        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }
}
