
@extends('welcome')
@section ('content')
{{-- <div>
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
    </div> --}}
  {{-- <div id="modal" class="modal">
    <div class="modal-login-register modal-content">
      <span class="close">&times;</span>
      <div class ="auth-form">
        <div class="auth-form__header">
          <h3>Xin chào,</h3>
          <p>
            <button class = "btn-form btn-form__login">Đăng nhập</button> hoặc
            <button  class = "btn-form btn-form__register">Tạo tài khoản</button>
          </p>
        </div>
        <div class = "auth-form__form" method = "POST">
          <form class = "auth-form_group form-login" id ="login">
            <input type = "text" class = "auth-form__input" placeholder ="Email">
            <input type = "password" class = "auth-form__input" placeholder ="Mật khẩu">
            <input class = "auth-form__login" type = "submit" value="Đăng nhập"> 
          </form>
          <form class = "auth-form_group form-register" id ="register">
            <input type = "text" class = "auth-form__input" placeholder ="Email">
            <input type = "password" class = "auth-form__input" placeholder ="Mật khẩu">
            <input type = "password" class = "auth-form__input" placeholder ="Nhập lại mật khẩu">
            <input class = "auth-form__register" type = "submit" value="Đăng ký"> 
          </form>
        </div>          
      </div>
    </div>
  </div> --}}
  <div class = "title"><h3>KẾT QUẢ TÌM KIẾM</h3></div>
  <div class="cards">
    @foreach ($search_product as $p )
        
    
    <div class="card">
      <a href = "{{URL::to('/product-detail='.$p->id)}}"><img
        src="{{"public/frontend/img/".$p->hinhanh}}"
        alt=""
        class="card-image"
      /></a>
      <div class="card-content">
        <div class="card-top">
          <h3 class="card-title">{{$p->ten}}</h3>
        </div>
        <div class="card-bottom">
          <div class="card-price">{{$p->gia}}</div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  {{-- <div class = "banner-product">
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
            <div class="card-price">{{$combo->gia}}</div>
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
            <div class="card-price">{{$comic->gia}}</div>
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
            <div class="card-price">{{$d->gia}}</div>
          </div>
        </div>
      </div>
      @endforeach 
  </div> --}}

@endsection