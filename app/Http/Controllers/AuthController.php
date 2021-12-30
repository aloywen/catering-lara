<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->all());
        // $web = User::find(4);
        $user = User::where('email', $request->email)->first();
        // dd($user);

        // if($user == null){
            if(\Hash::check($request->password, $user->password)){
                if ($user->role == 'customer') {
                    \Session::put('user', $user);

                    return redirect('/home');
                } if($user->role == 'admin'){

                    \Session::put('user', $user);

                    return redirect('/dashboard');
                }
                
            }else {
                \Session::flash('pass', 'Password Salah!');
                
                return redirect('/log');
            }
        // } else {
        //     \Session::flash('email', 'Email Anda Salah');
            
        //     return redirect('/log'); 
        // }
            
        
        // dd($request->all());
    }

    public function addUser(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'no_hp' => 'required',
        ]);

        $user = $request->all();
        $user['password'] = \Hash::make($request->password);
        $user['alamat'] = "";
        $user['role'] = "customer";
        User::create($user);
        // dd($request->all());

        \Session::flash('msg', 'Akun Berhasil Dibuat! Silahkan Login');
        
        return redirect('/log'); 
 
    }

    public function logout()
    {
        \Session::flush();;

        return redirect('/');
    }
}
