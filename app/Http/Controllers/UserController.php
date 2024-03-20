<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

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

public function add(){
    return view('admin.add-user');
}


public function store(Request $request){

    
     
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'nama_lengkap' => ['required', 'string', 'max:255'],
        'alamat' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Password::defaults()],
        'usertype' => ['required', 'string', 'max:255'],
    ]);
    $buku = User::create($request -> all());

    return redirect('user')->with('status', 'Data add Succesfully!');
}
}
