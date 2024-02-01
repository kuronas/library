<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        
            $users = User::where('role', 2)->get();
            return view('admin.user',['users' => $users]);
     
    }

    public function show($slug){
        
        $users = User::where('slug',$slug)->first();
        return view('admin.detail-user',['users' => $users]);
 
}
public function delete($slug){
        
    $users = User::where('slug',$slug)->first();
    return view('admin.delete-user',['users' => $users]);

}

public function destroy($slug){
        
    $deleteusers = $deleted = DB::table('users')->where('slug', $slug)->delete();
    return redirect('user')->with('alert', 'kategori sudah dihapus');

}
}
