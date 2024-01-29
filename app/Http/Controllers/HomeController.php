<?php

namespace App\Http\Controllers;

use App\Models\Buku;

use App\Models\User;

use App\Models\kategoriBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index ()
    {
  
   $usertype=Auth::user()->usertype;

   if($usertype=='admin')
   {
    $bukuCount = Buku::count();
    $kategoriCount = kategoriBuku::count();
    $userCount = User::count();
     return view('admin.home',['buku_count' => $bukuCount, 'kategori_count' => $kategoriCount,
     'user_count' => $userCount
 ]);;
   }
   else if($usertype=='petugas')
   {
    return view('petugas.home');
   }
   else
   {
    return view('dashboard');
   }


}

}

