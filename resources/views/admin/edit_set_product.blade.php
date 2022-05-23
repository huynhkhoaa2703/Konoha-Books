@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật tên bộ sách
                    </header>
                    <div class="panel-body">
                        @foreach($edit_set_product as $edit_set_product => $edit_value)
                        <div class="position-center">
                            <form role="form" action = "{{URL::to('/update-set-product/'.$edit_value->id)}}" method = "post">
                                {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bộ sách</label>
                                <input type="text" value = "{{$edit_value->ten_bo_sach}}" name ="ten_bo_sach"class="form-control" id="exampleInputEmail1">
                            </div>
                            <button type="submit" class="btn btn-info" name = "update_set_product">Cập nhật</button>
                        </form>
                        </div>
                        @endforeach
                    </div>
                </section>
        </div>
    </div>
@endsection