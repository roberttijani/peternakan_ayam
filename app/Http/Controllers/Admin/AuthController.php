<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest')->except('logout');
    	$this->middleware('auth')->only('logout');
    	$this->model=new User;
    }

    public function index()
    {
    	return view('admin.auth.login');
    }

    public function loginProses(Request $request)
    {
    	$data=$request->only('email','password');
    	$berhasil=Auth::attempt($data);

    	if ($berhasil) {
    		return redirect()->route('admin');
    	}else{
    		return redirect()->back();
    	}
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'no_hp'=>'required',
            'password'=>'required',
            'alamat'=>'required',
            'role'=>'required',
        ]);

        $this->model->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'password'=>bcrypt($request->password),
            'alamat'=>$request->alamat,
            'role'=>$request->role,
        ]);

        return redirect()->back()->with('berhasil','berhasil membuat akun silahkan login');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
