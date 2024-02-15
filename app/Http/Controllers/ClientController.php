<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $bukus = Buku::all();
    
        return view('user.list-buku',['bukus' => $bukus]);
    }
}
