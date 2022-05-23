<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\DB as FacadesDB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller {
    public function add_category_product () {
        return view('admin.add_category_product');
    }

    public function all_category_product () {

        $all_product = DB::table('tac_gia')->get();
        $manager_product = view('admin.all_category_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_product);
    }

    public function save_category_product (Request $request) {
        $data = array();
        $data['ten_tac_gia'] = $request->ten_tac_gia;

        DB::table('tac_gia')->insert($data);
        return Redirect::to('all-category-product');
         
    }

    public function edit_category_product($category_product_id) {
        $edit_category_product = DB::table('tac_gia')->where('id',$category_product_id)->get();
        $manager_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_product);
    }

    public function update_category_product(Request $request, $category_product_id) {
        $data = array();
        $data['ten_tac_gia'] = $request->ten_tac_gia;
        DB::table('tac_gia')->where('id', $category_product_id)->update($data);
        // Session::put('msg', 'Cập nhật danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');
    }

    public function delete_category_product($category_product_id) {
        DB::table('tac_gia')->where('id', $category_product_id)->delete();
        return Redirect::to('all-category-product');
    }
}