<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\DB as FacadesDB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
{
    public function product_detail($id)
    {
        $product = DB::table('sach')->join('tac_gia', 'sach.id_tacgia', '=', 'tac_gia.id')->join('bo_sach', 'sach.id_bosach', '=', 'bo_sach.id')->where('sach.id', $id)->select('sach.id','sach.ten','sach.gia','sach.hinhanh','bo_sach.ten_bo_sach','tac_gia.ten_tac_gia')->get();
        return view('product_detail')->with('product', $product);
    }

    public function all_product() 
    {
        $all_product = DB::table('sach')->join('tac_gia', 'sach.id_tacgia', '=', 'tac_gia.id')->join('bo_sach', 'sach.id_bosach', '=', 'bo_sach.id')->orderby('sach.ngaythem', 'asc')->select('sach.id','sach.ten','sach.gia','sach.hinhanh','bo_sach.ten_bo_sach','tac_gia.ten_tac_gia')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);

        return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function add_product()
    {
        $cate_product = DB::table('tac_gia')->orderby('id', 'desc')->get();
        $set_product = DB::table('bo_sach')->orderby('id', 'desc')->get();

        return view('admin.add_product')->with('cate_product', $cate_product)->with('set_product', $set_product);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['ten'] = $request->ten;
        $data['gia'] = $request->gia;
        $data['hinhanh'] = $request->hinhanh;
        $data['id_tacgia'] = $request->id_tacgia;
        $data['id_bosach'] = $request->id_bosach;
        $data['ngaythem'] = date("Y-m-d H:i:s");
        $get_img = $request->file('hinhanh');

        if ($get_img) {
            $get_name_img = $get_img->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $new_img = $name_img . rand(0, 99) . '.' . $get_img->getClientOriginalExtension();
            $get_img->move('public/up/product', $new_img);
            $data['hinhanh'] = $new_img;
            DB::table('sach')->insert($data);
            return Redirect::to('add-product');
        }

        $data['hinhanh'] = '';
        DB::table('sach')->insert($data);

        return Redirect::to('add-product');
    }

    public function edit_product($product_id)
    {
        $cate_product = DB::table('tac_gia')->orderby('id')->get();
        $set_product = DB::table('bo_sach')->orderby('id')->get();

        $edit_product = DB::table('sach')->where('id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product)->with('set_product', $set_product);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['ten'] = $request->ten;
        $data['gia'] = $request->gia;
        $data['hinhanh'] = $request->hinhanh;
        $data['id_tacgia'] = $request->id_tacgia;
        $data['id_bosach'] = $request->id_bosach;
        $get_img = $request->file('hinhanh');

        if($get_img){
            $get_name_img = $get_img->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $new_img = $name_img . rand(0, 99) . '.' . $get_img->getClientOriginalExtension();
            $get_img->move('public/up/product', $new_img);
            $data['hinhanh'] = $new_img;
            DB::table('sach')->where('id',$product_id)->update($data);
            return Redirect::to('all-product');
        }


        DB::table('sach')->where('id', $product_id)->update($data);
        return Redirect::to('all-product');

        // DB::table('bo_sach')->where('id', $product_id)->update($data);

        // return Redirect::to('all-product');
    }

    public function delete_product($product_id)
    {
        DB::table('sach')->where('id', $product_id)->delete();
        return Redirect::to('all-product');
    }
}
