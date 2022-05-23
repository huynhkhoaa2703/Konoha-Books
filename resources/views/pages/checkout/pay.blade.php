<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = {{asset('./public/frontend/css/testcss.css')}}>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <title>Nhà xuất bản Konoha</title>
</head>
<body>
    <div class = "title-name">
        <h2>Nhà xuất bản Konoha</h2>
    </div>
    </br>
    <div class="row">
        @php
    $content = Cart::content();
  @endphp
    <div class="modal-content">
      <div class="modal-cart-status">
        <h3>KIỂM TRA LẠI GIỎ HÀNG CỦA BẠN</h3>
      </div>
      <?php 
      if($content->isEmpty()){
       ?>
    <p>Giỏ hàng của bạn đang trống.</p></br>
      <p>Xin vui lòng mua hàng 
        <a href = "{{URL::to('')}}" class = "continueBuy" style= "color: #d51c24;">tại đây</a>
      </p>
    <?php } else {?>
      <div class="modal-cart">
        
        <div class="cart-list">
          <div class="cart-item">
            <h3 class=" cart-item__img text-heading"></h3>
            <h3 class="cart-item__name text-heading">Tên sản phẩm</h3>
            <h3 class="cart-item__price text-heading">Đơn giá</h3>
            <h3 class="cart-item__qty text-heading">Số lượng</h3>
            <h3 class="cart-item__qty text-heading">Thành tiền</h3>

            <h3 class="text-heading">Thao tác</h3>
          </div>
          @foreach( $content as $cart)
          <div class="cart-item">
            <div class="img-cart">
              <img src="{{"public/up/product/".$cart->options->image}}" alt="" class="cart-item__img" />
            </div>
            <h4 class="cart-item__name">{{$cart->name}}</h4>
            <h4 class="cart-item__price">{{number_format($cart->price). " VNĐ"}}</h4>
            <td>
              <form action="{{URL::to('/update-cart-qty')}}" method="post">
                  {{csrf_field()}}
              <input class = "input-value" type="text" value="{{$cart->qty}}" width="20%" name="qty" min="1" max="20">
              <input type="hidden" value="{{$cart->rowId}}" name="rowId_cart" class="qty">
              {{-- <input type="submit" value="&#8634" name="number-qty" class="btn" font-size = "25px;"> --}}
              </form>
          </td>
            <h4 class="cart-item__qty"> <?php 
                $Subtotal = $cart->price * $cart->qty ;
                echo number_format($Subtotal). " VNĐ";
                ?></h4>

            <a href = "{{URL::to('remove-cart='.$cart->rowId)}}"><i class=" delete-item fas fa-trash"></i></a>
          </div>
          @endforeach
        </div>
      </div>
      <div class = "modal-grid">
          <div class = "cart-note-item">
              <div class = "cart-note">
                </div>
                <div class = "text-note">
                    <a href = "{{URL::to('')}}" class = "continueBuy">
                        <i class = "fa fa-reply" aria-hidden="true"></i>
                        Tiếp tục mua hàng
                    </a>
                </div>
            </div>
            <div class = "cart-checkout-item">
                <div class = "checkout-item__sum">
                    <h3>
                        Tổng:<span>
                               <?php 
                                echo  Cart::subtotal(0). " VND";
                                ?>
                            </span>
                    </h3>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <div class="col-75">
        <div class="container">
            <div class="row">
            <div class="col-50">
                    <form action = "{{URL::to('/order-place')}}" method = "post">
                      {{ csrf_field() }}
                        <div class = "payment">
                            <label style = "margin-right: 20px;"><input type = "checkbox" value = "1" name = "payment-option">Thanh toán bằng tiền mặt</label>
                            <label><input type = "checkbox" value = "2" name = "pay_option">Thanh toán bằng thẻ ATM</label>
                        </div>
                        <input type="submit" value="Đặt hàng" name = "send_order" class="btn-z">
                    </form>
            </div>       
            </div>
        </div>
    </div>

</body>