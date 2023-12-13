<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .form-gap {
      padding-top: 70px;
    }

    .btn-link {
      display: inline-block;
    }
  </style>
</head>

<body>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <div class="form-gap"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="text-center">
              <h3><i class="fa fa-lock fa-4x"></i></h3>
              <h2 class="text-center">ĐỔI MẬT KHẨU</h2>
              <p></p>
              <div class="panel-body">

                <form action="index.php?act=doimk" id="register-form" role="form" autocomplete="off" class="form" method="post">

                  <div class="form-group">
                    <div class="input-group">
                      <input  name="password" placeholder="Mật khẩu cũ" class="form-control" type="password">
                      <input  name="newpassword" placeholder="Mật khẩu mới" class="form-control" type="password">
                      <input  name="repassword" placeholder="Nhập lại mật khẩu mới" class="form-control" type="password">
                    </div>
                  </div>
            
                    <input name="doimk" class="btn btn-lg btn-primary btn-block" value="ĐỔI MẬT KHẨU" type="submit">
                    <input type="hidden" class="hide" name="token" id="token" value="hello">
                  </a>

                </form>
                <h2 style="color: red;">
                  <?php

                  if (isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                  }

                  ?>
                </h2>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>