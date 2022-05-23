<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = {{asset('./public/frontend/css/testcss.css')}}>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <title>Nhà xuất bản Konoha</title>
</head>

<body>
  <header>
    <div class="header-top">
      <div class="wrapper">
        <div class="inner">
          <div class="grid">
            <div class="social-network">
              <a href="" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a>
              <a href="" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
              <a href="" target="_blank"><i class="fab fa-google" aria-hidden="true"></i></a>
            </div>
            <div class="text-network">
              <i class="fa fa-rss" aria-hidden="true"></i>
              <marquee behavior="scroll" direction="left">
                "Chào mừng bạn đã đến với Konoha Books. Nếu bạn cần giúp đỡ, hãy liên hệ với chúng tôi qua hotline:
                (+84) 833 755 199 hoặc email: huynhkhoaa2703@gmail.com"
              </marquee>
            </div>
            <div class="contact-network">
              <div class="contact">
                <div class="phone-number">
                  <a href="tel:(+84) 833755199">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    (+84) 833 755 199
                  </a>
                </div>
                <div class="mail-contact">
                  <a href="mailto:huynhkhoaa2703@gmail.com">
                    <i class="fa fa-envelope " aria-hidden="true"></i>
                    mail: huynhkhoaa2703@gmail.com
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class = "logo">
        <div class = "logo2">
          <img src = "{{'public/up/logo/logo2.png'}}" width = "" >
      </div>
    </div>
      <div class="menu">
        <li><a href="{{URL::to('')}}">TRANG CHỦ</a></li>
        <li><a href="">DANH MỤC SẢN PHẨM</a>
          <ul class="menu2">
            <li><a href="">Văn học Việt Nam</a></li>
            <li><a href="">Văn học nước ngoài</a></li>
            <li><a href="">Manga - Comic</a></li>
            <li><a href="">Tiểu thuyết</a></li>
          </ul>
        </li>
        <li><a href="">TIN TỨC</a></li>
        <li><a href="">GIỚI THIỆU</a></li>
      </div>
      <div class="other">
        <form action ="{{URL::to('/tim-kiem')}}" method = "POST">
          {{csrf_field()}}
          <li><input placeholder="Tìm kiếm..." type = "text" name = "keywords_submit"><i class="fas fa-search" name = "search_items" type = "submit"></i></input></li>
        </form>
        <?php $name = Session::get("ten"); 
    
        if($name != NULL) {?>
        <a class = "button-sigin" href = "{{URL::to('/logout-user')}}"><i class= " fas fa-sign-in-alt"> Đăng xuất</i></a>
        <?php }else {?>
        <a  class = "button-sigin"><i class= " modal-click fas fa-sign-in-alt"> Đăng nhập</i></a>
          <?php }?>
          <a href = "{{URL::to('/show-cart')}}">
            <div class ="cart">
                    <div class = "relative">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
            
            <div class = "number-shopping">
                <span>
                    <?php 
                      echo Cart::count();
                    ?>
                    </span>
            </div>
          </div>
        </a>
      </div>
    </div>
  </header>
  <div class="product_wrapper">
    <div class="wrapper">
      <div class="inner">
        @foreach ($product as $p)
        <div class="left-item">
          <img src="{{"public/up/product/".$p->hinhanh}}" alt="" class="img">
        </div>
        <div class="right-item">
          <h3>{{$p->ten}}</h3><br>
            <div class = "price-item__line">
              <span class = "price-item">{{number_format($p->gia). " VNĐ"}}</span>
              <div class = "rate-item">
                <p>✩ ✩ ✩ ✩ ✩</p>
                <span>0 Đánh giá</span>
                <div class = "sold">
                  <div class = "sold-item">
                    Đã bán: 2710
                  </div>
                </div>
              </div>
            </div>
          
            <form action = "{{URL::to('/save-cart')}}" method = "POST" class = "form-modal">
              {{csrf_field()}}
              <h4>Số lượng:</h4><br>
              <div class = "js-qty">
                <button class="btn btn-sub-cart"
                  onclick="var result = document.getElementById('quantity'); var qty = result.value; if( !isNaN(qty) &amp; qty > 1 ) result.value--;return false;"><i
                    class="fas fa-minus"></i></button>
                <input id='quantity' min='1' name='quantity' type='text' value='1' class="input-qty" />
                <input  name='productid_hidden' type='hidden' value='{{$p->id}}' />
                <button class="btn btn-add-cart"
                  onclick="var result = document.getElementById('quantity'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;"><i
                    class="fas fa-plus"></i></button>
              </div>
              <button class = "add-to-cart" type="submit" name="">THÊM VÀO GIỎ HÀNG</button>
            <div class = "infor-book">
              <ul>
                <li>Tác giả: <a href = "">{{$p->ten_tac_gia}}</a></li>
                <li>Đối tượng: <a href = "">Tuổi mới lớn (15-18)</a></li>
                <li>Khuôn khổ: 11.3x17.6 cm</li>
                <li>Số trang: 188</li>
                <li>Định dạng: bìa mềm</li>
                <li>Trọng lượng: 125 gram</li>
                <li>Bộ sách: <a href = "">{{$p->ten_bo_sach}}</a></li>
              </ul>
            </div>
          </form>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  
  </div>
  <footer class ="footer">
    <div class = "footer_top">
      <div class="foot_menu">
        <h3>DỊCH VỤ</h3>
        <ul>
          <li><a href = "#">Điều khoản sử dụng</a></li>
          <li><a href = "#">Chính sách bảo mật</a></li>
          <li><a href = "#">Liên hệ</a></li>
          <li><a href = "#">Hệ thống nhà sách</a></li>
        </ul>
      </div>
      <div class="foot_menu">
        <h3>HỖ TRỢ</h3>
        <ul>
          <li><a href = "#">Hướng dẫn đặt hàng</a></li>
          <li><a href = "#">Chính sách đổi trả - hoàn tiền</a></li>
          <li><a href = "#">Phương thức vận chuyển</a></li>
          <li><a href = "#">Phương thức thanh toán</a></li>
          <li><a href = "#">Chính sách khách hàng mua sỉ</a></li>
          <li><a href = "#">Chính sách khách hàng cho trường học</a></li>
        </ul>
      </div>
      <div class="foot_menu">
        <h3>NHÀ XUẤT BẢN KONOHA</h3>
        <ul>
          <li><a href = "#">Giám đốc: Huỳnh Anh Khoa</a></li>
          <li><a href = "#">Địa chỉ: Số 27 Trần Hưng Đạo, An Phú, Ninh Kiều, Cần Thơ</a></li>
          <li><a href = "#">Số điện thoại: (+84) 833755199</a></li>
          <li><a href = "#">Email: huynhkhoaa2703@gmail.com</a></li>
        </ul>
      </div>
      <div class="foot_menu">
        <h3>KẾT NỐI MẠNG XÃ HỘI</h3>
        <ul>
          <li><a href = "https://www.facebook.com/huynhkhoauwu/" target = "_blank"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href = "https://www.instagram.com/huynhkhoauwu/" target = "_blank"><i class="fab fa-instagram" target = "_blank"></i></a></li>
          <li><a href = "https://www.youtube.com/channel/UCkNa0ukfdFeeePfbHbJav8g" target = "_blank"><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>
      <div class="foot_menu">
        <h3>ĐĂNG KÝ NHẬN THÔNG TIN</h3>
        <P>
          Hãy nhập địa chỉ email của bạn vào ô dưới đây để có thể nhận được tất cả các tin tức mới nhất của NXB Kim Đồng về các sản phẩm mới, các chương trình khuyến mãi mới. NXB xin đảm bảo sẽ không gửi mail rác, mail spam tới bạn
          <input type = "text" class = "auth-form__input" placeholder ="Nhập email của bạn..." style = "height: 30px; width: 300px;">
          <a class = "auth-form__login" type = "submit" style = "height: 30px; width: 150px;">Đăng ký</a>
        </P>
      </div>
    </div>
    <div class = "footer_bottom">
      <p class = "copyrights-wrapper">
          Copyrights © 2021 by huynhkhoaa2703. 大家好 我是 黄克
      </p>
    </div>
</footer>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="{{asset('public/frontend/js/script.js')}}"></script>
</body>
</html>