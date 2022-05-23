<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\DB as FacadesDB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller {
    public function login_checkout() {
        return view('pages.checkout.login_checkout');
    }


    public function new_customer(Request $request) {
        $ten = "";
        $ten = "user" . rand(10,10000);
        $data = array();
        $data['hoten_khachhang'] =$ten;
        $data['email'] = $request->email;
        $data['matkhau'] = $request->matkhau;

        $n_customer_id = DB::table('khach_hang')->insertGetId($data);
        Session::put('id',$n_customer_id);
        return Redirect::to('/checkout');
    }

    public function add_customer(Request $request) {
        $ten = "";
        $ten = "user" . rand(10,10000);
        $data = array();
        $data['hoten_khachhang'] =$ten;
        $data['email'] = $request->email;
        $data['matkhau'] = $request->matkhau;
        $data['xacnhanmk'] = $request->xacnhanmk;

        $customer_id = DB::table('khach_hang')->insertGetId($data);

        Session::put('id',$customer_id);
        return Redirect::to('/checkout');
    }

    public function checkout() {
        return view('pages.checkout.checkout');
    }

    public function save_checkout_customer(Request $request) {

        $data = array();
        $data['ten_kh'] = $request->ten_kh;
        $data['email_kh'] = $request->email_kh;
        $data['diachi_kh'] = $request->diachi_kh;
        $data['sdt_kh'] = $request->sdt_kh;

        $shipping_id = DB::table('don_hang')->insertGetId($data);
        Session::put('id', $shipping_id);
        return Redirect::to('/pay');
    }

    public function pay() {
        return view('pages.checkout.pay');
    }


    public function order_place() {
        
        // $data = array();
        // if($data['phuongthuc_thanhtoan'])==1 {
        //     return view('pages.checkout.thanks');
        // }
        // $content = Cart::content();
        // echo $content;
        // $data = array();
        // $data['phuongthuc_thanhtoan'] = $request->pay_option;
        // $data['tinhtrang_thanhtoan'] = 'Đang chờ xử lý';
        // $pay_id = DB::table('thanh_toan')->insertGetId($data);

        // $order_data = array();
        // $order_data['id_khachhang'] = Session::get('id_khachhang');
        // $order_data['id_donhang'] = Session::get('id_donhang');
        // $order_data['id_thanhtoan'] = $pay_id;
        // $order_data['tong_donhang'] = Cart::total();
        // $order_data['tinhtrang_donhang'] = 'Đang chờ xử lý';
        // $order_id = DB::table('gio_hang')->insertGetId($order_data);

        // $content = Cart::content();
        // foreach($content as $v_content){
        //     $order_detail_data['id'] = $id;
        //     $order_detail_data['id_sach'] = $v_content->id;
        //     $order_detail_data['ten'] = $v_content->name;
        //     $order_detail_data['gia'] = $v_content->price;
        //     $order_detail_data['soluong'] = $v_content->qty;
        //     DB::table('chitiet_giohang')->insert($order_detail_data);
        // }
        Cart::destroy();
         return view('pages.checkout.thanks');
    }
}