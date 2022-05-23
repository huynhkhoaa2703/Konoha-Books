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
       
    <div class="col-75">
        <div class="container">
            <div class="row">
            <div class="col-50">
                <h3>Thông tin thanh toán</h3>
                    <form action = "{{URL::to('save-checkout-customer')}}" method = "post">
                        {{ csrf_field() }}
                        <label for="fname"><i class="fa fa-user"></i> Họ tên</label>
                        <input type="text" id="fname" name="ten_kh" placeholder="y/n" class = "input-z">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email_kh" placeholder="user@example.com" class = "input-z">
                        <label for="adr"><i class="fa fa-address-card-o"></i>Địa chỉ</label>
                        <input type="text" id="adr" name="diachi_kh" placeholder="Cần Thơ" class = "input-z">
                        <label for="phone"><i class="fa fa-institution"></i>Số điện thoại</label>
                        <input type="text" id="phone" name="sdt_kh" placeholder="+84" class = "input-z">
                        <input type="submit" value="Tiếp tục thanh toán" name = "send_order" class="btn-z">
                    </form>
            </div>       
            </div>
        </div>
    </div>

</body>