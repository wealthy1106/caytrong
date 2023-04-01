<?php 
  include_once "./connection.php";
  session_start();

  if(isset($_GET['masp'])) {
    $MaSP = $_GET['masp'];
  $query = "select * from sanpham where MaSP = '".$MaSP."'";
    try {
        $sth = $pdo->query($query);
        if ($row = $sth->fetch()){
            $masp = $row['MaSP'];
            $tensp = $row['tenSP'];
            $xuatxu = $row['XuatXu'];
            $gia = $row['giaSp'];
            $dacdiem = $row['dacdiemSP'];
            $tacdung = $row['tacdung'];
            $hinh = $row['hinh'];
            $idloai = $row['idloai'];
        }   
     } catch (PDOException $e){
        
    }
  }



?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sản Phẩm</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="shortcut icon" href="logo và phong nen/Logo.PNG" type="image/vnd.microsoft.icon" >
        <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </head>
    
    <body>
      <div style="height: 10%;">
        <header>
          <div class="container-fluid">
          <img src="logo và phong nen/nen.PNG" style="width: 100%;" alt="">
          </div>       
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" style="z-index: 10;" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto" style="font-size: 20px;">
                    <li class="nav-item">
                      <a class="nav-link" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link text-success" style="background-color: rgb(192, 243, 243);font-weight: bold ; color: chartreuse; " href="sanpham.php">Sản phẩm</a>
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
                              <a class="nav-link" href="donhanguser.php">Đơn Hàng</a>
                            </li>
                            ';
                        }else{
                          echo '
                            <li class="nav-item ">
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
      </div>
      <main class="container-fluid">
          <h1 style="text-align: center;">Thông Tin Sản Phẩm</h1>
          <br>
          <div class="row">
              <div class="col-6">
                
                  <img src="<?php echo ''.$row['hinh'].'' ?>" alt="">
                 
              </div>
              <div class="col-6">
              <?php
                    if(isset($_SESSION['sotk'])){
                      $link = "giohang.php";
                    }else{
                      $link = "dangnhap.php";
                    }
                    $query = "select * from sanpham where MaSP = '".$MaSP."'";
                    try {
                        $sth = $pdo->query($query);
                        if ($row = $sth->fetch()){
                            echo '
                            <h2>'.$row['tenSP'].'</h2>
                            <h5>Xuất Xứ: '.$row['XuatXu'].'</h5>
                            <h5>Giá: '.$row['giaSp'].'</h5>
                            <p><b>Đặt điểm nổi bật:</b>'.$row['dacdiemSP'].'</p>
                            <p><b>Cách Chế Biến: </b>'.$row['tacdung'].'</p>
                            <hr>
                            <form action="'.$link.'" method="POST">
                              <button style="float: right; background-color: rgb(30, 255, 0);">Thêm vào giỏ hàng</button>
                              <p>Số lượng: <input type="number" value="1" name="soluong" required></p>
                              <input type="text" name="ttsp" value="'.$row['MaSP'].'" hidden> 
                            </form>
                            ';
                        }   
                    } catch (PDOException $e){
                        
                    }
                ?>
                </div>
          </div>
      </main>
          <br>
      <footer style="padding-top: 10px; height: 20%;background-image: url(iii.jpg);">
        <div class="container">
          <div class="row">
            <div class="col-4 " style=" margin: auto;"> 
              <img src="logo và phong nen/Logo.PNG" class="container-fluid" style="width: 100%;" alt="">
            </div>
            <div class="col-4" style=" margin: auto;" >
                <ul>
                  <li style="font-size: 25px;">Hỗ Trợ Khách Hàng</li>
                </ul>
                <ul style="font-size: 18px;"  id="li">
                  <li><a href="#">Chăm Sóc Cây</a></li>
                  <li><a href="#">Đặt Hàng</a></li>
                  <li><a href="#">Chính Sách Bảo Hành</a></li>
                  <li><a href="#">Tư Vấn</a></li>
                </ul>
            </div>
            <div class="col-4">
              <ul>
                <li style="font-size: 25px;">Về Chúng Tôi</li>
              </ul>
              <ul style="font-size: 18px;"  id="li">
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Sản Phẩm</a></li>
                <li><a href="#">Giới Thiệu</a></li>
                <li><a href="#">Liên Hệ</a></li>
              </ul>
            </div>
          </div>
      </div>
      </footer>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>