@extends('admin_layout')
@section('admin_content')
    <h3>Chào mừng <?php 
        $ten = Session::get('ten');
        if ($ten) {
            echo $ten;
        }
    ?> đến với trang Admin</h3>
@endsection 