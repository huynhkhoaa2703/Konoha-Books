@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm tên tác giả
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action = "{{URL::to('/save-category-product')}}" method = "post">
                                {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tác giả</label>
                                <input type="text" name ="ten_tac_gia"class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <button type="submit" class="btn btn-info" name = "add_category_product">Thêm</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
    </div>
@endsection