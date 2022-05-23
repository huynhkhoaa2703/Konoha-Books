@extends('welcome')
@section ('content')
        <div class="modal-login-register modal-content">
        <div class ="auth-form">
            <div class="auth-form__header">
            <h3>Xin chào,</h3>
            <p>Bạn hiện tại chưa đăng nhập,</p>
                <button class = "btn-form btn-form__login">Đăng nhập</button> hoặc
                <button  class = "btn-form btn-form__register">Tạo tài khoản</button>
            </p>
            </div>
            <div class = "auth-form__form" method = "POST">
            
            <form class = "auth-form_group form-login" id ="login" action = "{{URL::to('/add-customer')}} " method ="post">
                {{csrf_field()}}
                <input type = "email" class = "auth-form__input" placeholder ="Email" name = "email">
                <input type = "password" class = "auth-form__input" placeholder ="Mật khẩu" name = "matkhau">
                <input class = "auth-form__login" type = "submit" value="Đăng nhập"> 
            </form>

            <form class = "auth-form_group form-register" id ="register" onSubmit ="handleSubmit()" action ="{{URL::to('/add-customer')}}" method ="post">
                {{csrf_field()}}
                <input type = "text" class = "auth-form__input" placeholder ="Email" name ="email">
                <input type = "password" class = "auth-form__input" placeholder ="Mật khẩu" name = "matkhau">
                <input type = "password" class = "auth-form__input" placeholder ="Nhập lại mật khẩu" name = "xacnhanmk">
                <input class = "auth-form__register" type = "submit" value="Đăng ký"> 
            </form>
                
            </div> 
        </div>
        </div>
@endsection