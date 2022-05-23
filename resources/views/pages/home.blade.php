
@extends('welcome')
@section ('content')
<div>
    <div class="w3-content w3-section slide" style="max-width:2000px; height: 100%;">
      <img class="mySlides" src="{{asset('public/frontend/img/banner1.jpg')}}" style="width:100%">
      <img class="mySlides" src="{{asset('public/frontend/img/banner2.jpg')}}" style="width:100%">
      <img class="mySlides" src="{{asset('public/frontend/img/banner3.jpg')}}" style="width:100%">
      <img class="mySlides" src="{{asset('public/frontend/img/banner4.jpg')}}" style="width:100%">
      <img class="mySlides" src="{{asset('public/frontend/img/banner5.jpg')}}" style="width:100%">
      <img class="mySlides" src="{{asset('public/frontend/img/banner6.jpg')}}" style="width:100%">
      <img class="mySlides" src="{{asset('public/frontend/img/banner7.jpg')}}" style="width:100%">
      <img class="mySlides" src="{{asset('public/frontend/img/jjk_banner.jpg')}}" style="width:100%">
      <img class="mySlides" src="{{asset('public/frontend/img/naruto_banner.jpg')}}" style="width:100%">   
    </div>
  <div id="modal" class="modal">
    <div class="modal-login-register modal-content">
      <span class="close">&times;</span>
      <div class ="auth-form">
        <div class="auth-form__header">
          <?php $name = Session::get('ten');
            if($name == NULL){  
          ?>
          <h3>Xin chào,</h3>
          <?php
            $msg = Session::get('msg');
            if($msg) {
                echo '<span class = "text-not">'.$msg.'</span>'; 
                Session::put('msg', null);
		        }
	        ?>
          <p>
            <button class = "btn-form btn-form__login">Đăng nhập</button> hoặc
            <button  class = "btn-form btn-form__register">Tạo tài khoản</button>
          </p>
        </div>
        <div class = "auth-form__form" method = "POST">
           
          <form class = "auth-form_group form-login" id ="login" action = "{{URL::to('/login')}} " method ="post">
            {{csrf_field()}}
            <input type = "email" class = "auth-form__input" placeholder ="Email" name = "email">
            <input type = "password" class = "auth-form__input" placeholder ="Mật khẩu" name = "matkhau">
            <input class = "auth-form__login" type = "submit" value="Đăng nhập"> 
          </form>

          <form class = "auth-form_group form-register" id ="register" onSubmit ="handleSubmit()" action ="{{URL::to('/register')}}" method ="post">
            {{csrf_field()}}
            <input type = "text" class = "auth-form__input" placeholder ="Email" name ="email">
            <input type = "password" class = "auth-form__input" placeholder ="Mật khẩu" name = "matkhau">
            <input type = "password" class = "auth-form__input" placeholder ="Nhập lại mật khẩu" name = "xacnhanmk">
            <input class = "auth-form__register" type = "submit" value="Đăng ký"> 
          </form>
         
          <?php }?>         
        </div> 
      </div>
    </div>
  </div>
  <div class = "title"><h3>SÁCH MỚI PHÁT HÀNH</h3></div>
  <div class="cards">
    @foreach ($pro_new as $p )
        
    
    <div class="card">
      <a href = "{{URL::to('/product-detail='.$p->id)}}"><img
        src="{{"public/up/product/".$p->hinhanh}}"
        alt=""
        class="card-image"
      /></a>
      <div class="card-content">
        <div class="card-top">
          <h3 class="card-title">{{$p->ten}}</h3>
        </div>
        <div class="card-bottom">
          <div class="card-price">{{number_format($p->gia). " VNĐ"}}</div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class = "banner-product">
    <a href ="manga.html" target = "_blank" >
        <img src = "{{asset("public/frontend/img/bannervd.jpg")}}" width = "100%">
    </a>
</div>
  <div class = "title"><h3>COMBO</h3></div>
  <div class="cards">
    @foreach ($combo as $combo)
      <div class="card">
        <a href = "{{URL::to('/product-detail='.$combo->id)}}">
        <img
          src="{{"public/frontend/img/".$combo->hinhanh}}"
          alt=""
          class="card-image"
        /></a>
        <div class="card-content">
          <div class="card-top">
            <h3 class="card-title">{{$combo->ten}}</h3>
          </div>
          <div class="card-bottom">
            <div class="card-price">{{number_format($combo->gia). " VNĐ"}}</div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  
  
  <div class = "banner-product">
          <a href ="manga.html" target = "_blank" >
              <img src = "{{asset("public/frontend/img/bannervd2.jpg")}}" width = "100%">
          </a>
  </div>
  <div class = "title"><h3>MANGA - COMIC</h3></div>
  <div class="cards">
      @foreach ($comic as $comic)
      <div class="card">
        <a href = "{{URL::to('/product-detail='.$comic->id)}}">
        <img
          src="{{"public/frontend/img/".$comic->hinhanh}}"
          alt=""
          class="card-image"
        /></a>
        <div class="card-content">
          <div class="card-top">
            <h3 class="card-title">{{$comic->ten}}</h3>
          </div>
          <div class="card-bottom">
            <div class="card-price">{{number_format($comic->gia). " VNĐ"}}</div>
          </div>
        </div>
      </div>
      @endforeach 
  </div>
  <div class = "banner-product">
    <a href ="manga.html" target = "_blank" >
        <img src = "{{asset("public/frontend/img/bannervd3.jpg")}}" width = "100%">
    </a>
  </div>
  <div class = "title"><h3>DORAEMON</h3></div>
  <div class="cards">
    @foreach ($doraemon as $d)
      <div class="card">
        <a href = "{{URL::to('/product-detail='.$d->id)}}">
        <img
          src="{{"public/frontend/img/".$d->hinhanh}}"
          alt=""
          class="card-image"
        /></a>
        <div class="card-content">
          <div class="card-top">
            <h3 class="card-title">{{$d->ten}}</h3>
          </div>
          <div class="card-bottom">
            <div class="card-price">{{number_format($d->gia). " VNĐ"}}</div>
          </div>
        </div>
      </div>
      @endforeach 
  </div>


@endsection