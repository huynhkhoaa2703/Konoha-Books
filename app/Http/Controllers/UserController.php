<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\DB as FacadesDB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class UserController extends Controller {
   
    public function login(Request $request) {
        $email = $request->email;
        $password = ($request->matkhau);

        $rs = DB::table('khach_hang')->where('email', $email)->where('matkhau', $password)->first();

        if($rs) {
             Session::put('ten',$rs->hoten_khachhang);
            return Redirect::to('/');
        }
    }
    public function logout() {
        Session::put('ten', null);
        return Redirect::to('/');
    }

    public function register_post(Request $request) {
        $ten = "";
        $ten = "user" . rand(10,10000);
        $data = array();
        $data['hoten_khachhang'] =$ten;
        $data['email'] = $request->email;
        $data['matkhau'] = $request->matkhau;
        $data['xacnhanmk'] = $request->xacnhanmk;

        $customer_id = DB::table('khach_hang')->insertGetId($data);

        Session::put('id',$customer_id);
        return Redirect::to('/');
    }
}