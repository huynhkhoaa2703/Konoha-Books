<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;  
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{   
    public function index(){
        
    	$pro_new = DB::table('sach')->orderby('ngaythem','desc')->limit(10)->get();
        $combo = DB::table('sach')->where('combo', '1')->limit(5)->get();
        $comic = DB::table('sach')->where('comic', '1')->limit(10)->get();
        $doraemon = DB::table('sach')->where('doraemon', '1')->limit(5)->get();
        
    
    	return view('pages.home')->with('pro_new',$pro_new)->with('combo',$combo)->with('comic',$comic)->with('doraemon',$doraemon);

    }

    public function search (Request $request) {
        $keywords = $request->keywords_submit;
        $search_product = DB::table('sach')->where('ten', 'like', '%'.$keywords.'%')->get();

    	return view('pages.sanpham.search')->with('search_product', $search_product);
    }

    
    
}
