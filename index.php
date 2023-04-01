<?php
  include_once "./connection.php";
  session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trang Chủ</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="shortcut icon" href="logo và phong nen/Logo.PNG" type="image/vnd.microsoft.icon" >
        <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </head>
    <body>
      <header>
          <nav style="position: absolute;width: 100%;" class="navbar navbar-expand-lg navbar-light bg-light">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" style="z-index: 10;" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" style="font-size: 20px;">
                  <li class="nav-item active">
                    <a class="nav-link text-success" style="background-color: rgb(192, 243, 243);font-weight: bold ; color: chartreuse; "  href="index.html">Trang chủ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="sanpham.php">Sản phẩm</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="gioithieu.php">Giới thiệu</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="lienhe.php">Liên hệ</a>
                  </li>
                  <?php 
                        if(isset($_SESSION['sotk'])){
                          echo '
                            <li class="nav-item">
                              <a class="nav-link" href="dangxuat.php">Đăng Xuất</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="dohanguser.php">Đơn Hàng</a>
                            </li>
                            ';
                        }else{
                          echo '
                            <li class="nav-item">
                              <a class="nav-link" href="dangnhap.php">Đăng Nhập</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="dangky.php">Đăng Ký</a>
                            </li>
                          ';
                        }
                  ?>
                
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <?php
                    if(isset($_SESSION['sotk'])){
                      echo '
                        <form class="form-inline my-2 my-lg-0">
                          <a class="nav-link active" href="giohang.php" style="color: darkolivegreen;border: 1px solid rgba(21, 107, 3, 0.692) ;">Cart</a>
                        </form>
                      ';
                    }
                  ?>
              </div>
          </nav>
      </header>
   
    <main class="container-fluid" style="background-image: url(anh-bai-co-xanh-59064.jpg); background-size: cover; min-height: 100vh;">
        <!-- <img src="anh-bai-co-xanh-59064.jpg"  style="width: 100%;height: 100%;position: inherit;" alt=""> -->
        <div class="row "  style="padding-top: 200px;">
          <div class="col-6" style="font-size: 40px;color: aquamarine; text-align: left;">
              <p>Chào Mừng Đến Với Cây Trồng Nhà Nông</p>
              <a type="button" class="btn btn-outline-primary" style="background-color: aquamarine; padding: 15px; font-size: 30px;" href="sanpham.php";>Bắt đầu</a>
          </div>
          <div class="col-6" style="text-align: center;">
              <img src="cay-phong-thuy-12.jpg" style="width: 70%;height: 70%;" alt="">
          </div>
        </div>
        
    </main>

</body>
</html>