@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action = "{{URL::to('/save-product')}}" method = "post" enctype = "multipart/form-data">
                                {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name ="ten"class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" name ="gia"class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                                <input type="file" name = "hinhanh"class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục tác giả</label>
                                <select name = "id_tacgia" class = "form-control input-sm m-bot15" style= "height: 40px;">   
                                    @foreach($cate_product as $cate_product => $cate)
                                        <option value ="{{$cate->id}}">{{$cate->ten_tac_gia}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục bộ sách</label>
                                <select name = "id_bosach" class = "form-control input-sm m-bot15" style= "height: 40px;">   
                                    @foreach($set_product as $set_product => $set)
                                        <option value = "{{$set->id}}">{{$set->ten_bo_sach}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for = "exampleInputPassword1">Hiển thị</label>
                                    <select name = "tinhtrang_sanpham" class = "form-control input-sm m-bot15" style= "height: 40px;">   
                                        <option value = "0">Ẩn</option>
                                        <option value = "1">Hiển thị</option>
                                    </select>
                            </div>

                            <button type="submit" class="btn btn-info" name = "add_category_product">Thêm sản phẩm</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
    </div>
@endsection