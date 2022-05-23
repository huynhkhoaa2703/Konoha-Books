@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật tên tác giả
                    </header>
                    <div class="panel-body">
                        @foreach($edit_category_product as $edit_category_product => $edit_value)
                        <div class="position-center">
                            <form role="form" action = "{{URL::to('/update-category-product/'.$edit_value->id)}}" method = "post">
                                {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tác giả</label>
                                <input type="text" value = "{{$edit_value->ten_tac_gia}}" name ="ten_tac_gia"class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <button type="submit" class="btn btn-info" name = "update_category_product">Cập nhật</button>
                        </form>
                        </div>
                        @endforeach
                    </div>
                </section>
        </div>
    </div>
@endsection