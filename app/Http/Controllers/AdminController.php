<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\DB as FacadesDB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index() {
        return view('admin_login');
    }

    public function show_dashboard() {

        return view('admin.dashboard');
    }

    public function dashboard(Request $request) {
        $email = $request->email;
        $password = ($request->matkhau);

        $rs = DB::table('nhan_vien')->where('email', $email)->where('matkhau', $password)->first();
        
        if ($rs) {
            Session::put('ten',$rs->ten);
            Session::put('id',$rs->id);
    		return Redirect::to('/dashboard');
        }else{
            Session::put('msg',"Mật khẩu hoặc tài khoản không đúng! Vui lòng nhập lại");
            return Redirect::to('/admin');
          }
     }

     public function logout() {
        session_destroy();
        return Redirect::to('/admin');
     }
}