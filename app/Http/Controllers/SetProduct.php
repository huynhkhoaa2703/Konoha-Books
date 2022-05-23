<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\DB as FacadesDB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SetProduct extends Controller {
    public function add_set_product () {
        return view('admin.add_set_product');
    }

    public function all_set_product () {

        $all_set_product = DB::table('bo_sach')->get();
        $manager_set_product = view('admin.all_set_product')->with('all_set_product', $all_set_product);
        return view('admin_layout')->with('admin.all_set_product', $manager_set_product);
    }

    public function save_set_product (Request $request) {
        $data = array();
        $data['ten_bo_sach'] = $request->ten_bo_sach;

        DB::table('bo_sach')->insert($data);
        return Redirect::to('all-set-product');

         
    }

    public function edit_set_product($set_product_id) {
        $edit_set_product = DB::table('bo_sach')->where('id',$set_product_id)->get();
        $manager_set_product = view('admin.edit_set_product')->with('edit_set_product', $edit_set_product);
        return view('admin_layout')->with('admin.edit_set_product', $manager_set_product);
    }

    public function update_set_product(Request $request, $set_product_id) {
        $data = array();
        $data['ten_bo_sach'] = $request->ten_bo_sach;
        DB::table('bo_sach')->where('id', $set_product_id)->update($data);
        return Redirect::to('all-set-product');
    }

    public function delete_set_product($set_product_id) {
        DB::table('bo_sach')->where('id', $set_product_id)->delete();
        return Redirect::to('all-set-product');
    }
}
