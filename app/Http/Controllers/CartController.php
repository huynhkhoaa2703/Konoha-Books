<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\DB as FacadesDB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;

class CartController extends Controller {
    public function save_cart(Request $request) {
        $quantity = $request->quantity;
        $productID = $request->productid_hidden;
       
        $product_info = DB::table('sach')->where('id', $productID)->first();

        $data['id'] = $productID;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->ten;
        $data['price'] = $product_info->gia;
        $data['options']['image']=$product_info->hinhanh;
        $data['weight'] = 1;
        Cart::add($data);
        // Cart::destroy();
        return Redirect()->back();
    }

    public function show_cart(){
    
    	return view('pages.cart.show_cart');
    }

    public function update_cart_qty(Request $request) {
        $rowId = $request->rowId_cart;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }

    public function remove_cart($rowId){
    	Cart::update($rowId,0);
    	return Redirect::to('/show-cart');
    }
}