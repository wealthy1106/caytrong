<?php 
include_once "./connection.php"; 
session_start(); 

if(isset($_POST['dathang'])){
  $query = "INSERT INTO `myweb`.`donhang` (`thanhtien`,`SoTK`, `trangthai`) 
  VALUES (?,?,?);";
  try{
    $sth = $pdo->prepare($query);
    $sth->execute([
      $_POST['tong'],
      $_SESSION['sotk'],
      'Chưa xử lí'
    ]);
  }catch (PDOException $e){
    $pdo_error = $e->getMessage();
  }
}

if(isset($_SESSION['dathang'])){
  $query = "DELETE FROM `myweb`.`soluonggh` (`SoTK` = ?);";
  try{
      $sth = $pdo->prepare($query);
      $sth->execute([
        $_SESSION['sotk']
      ]);
    }catch (PDOException $e){
      $pdo_error = $e->getMessage();
    }
}

?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Danh Sách Đơn Hàng</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="shortcut icon" href="logo và phong nen/Logo.PNG" type="image/vnd.microsoft.icon">
  <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/index.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>

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
                              <a class="nav-link" href="donhanguser.php.php">Đơn Hàng</a>
                            </li>
                            ';
                        }else{
                          echo '
                            <li class="nav-item active">
                              <a class="nav-link text-success" href="dangnhap.php">Đăng Nhập</a>
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
                        <form class="form-inline my-2 my-lg-0"style="background-color: rgb(192, 243, 243);font-weight: bold ; color: chartreuse; ">
                          <a class="nav-link active" href="giohang.php" style="color: darkolivegreen;border: 1px solid rgba(21, 107, 3, 0.692) ;">Cart</a>
                        </form>
                      ';
                    }
                  ?>
                </div>
            </nav>          
        </header>
  </div>
  <div class="container-fluid">
    <h1 style="text-align: center;">DANH SÁCH ĐƠN HÀNG</h1>
    <hr>
    <br>
    <?php 
            $query = "select * from taikhoan where SoTK = '".$_SESSION['sotk']."'";
            $stt = 1;
            try {
                $sth = $pdo->query($query);
                if ($row = $sth->fetch()){
                    echo ' 
                      <div>
                        <h5>Họ tên: '.$row['HoTen'].'</h5>
                        <h5>Địa chỉ: '.$row['DiaChi'].'</h5>
                        <h5>Email: '.$row['email'].' </h5>
                        <h5>Số điện thoại: '.$row['SDT'].'</h5>
                      </div>
                    ';
                }   
            } catch (PDOException $e){
                
            }
        ?>
    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Ngày Tạo</th>
          <th scope="col">Thông Tin Đơn Hàng</th>
          <th scope="col">Thành Tiền</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(isset($_GET['iddh'])){
            $query = "DELETE FROM `myweb`.`donhang` WHERE (`idDH` = ?);";
            try{
                $sth = $pdo->prepare($query);
                $sth->execute([
                  $_GET['iddh'],
                ]);
              }catch (PDOException $e){
                $pdo_error = $e->getMessage();
              }
          }
          $query = "select * from donhang where sotk = '".$_SESSION[ 'sotk']."'";
          $stt = 1; 
          try {
              $sth = $pdo->query($query);
              while ($row = $sth->fetch()){
                  echo '
                    <tr>
                      <td>'.$stt++.'</td>
                      <td>'.$row['Ngay'].'</td>
                      <td><a href="chitietdonhang.php?iddh='.$row['idDH'].'">Chi tiết</a></td>
                      <td>'.$row['thanhtien'].'</td>
                      <td><a href="?iddh='.$row['idDH'].'"><i class="fa-sharp fa-solid fa-trash"></i></a></td>
                    </tr>
                  ';
              }
          } catch (PDOException $e){
              
          }
        ?>
        <!-- <tr>
          <td>HH001</td>
          <td><a href="chitietdonhang.php">Chi tiết</a>
          </td>
          <td>An Khánh Ninh Kiều Cần Thơ</td>
          <td><a href=""><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
          </td>
          <td><a href=""><i class="fa-sharp fa-solid fa-trash"></i></a>
          </td>
        </tr> -->
        <!-- <tr>
          <th scope="row">2</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>

          <td></td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td></td>
          <td></td>

          <td></td>
          <td></td>
          <td></td>
        </tr> -->
      </tbody>
    </table>
  </div>
  <br>
  <footer style="padding-top: 10px; height: 20%;background-image: url(iii.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-4 " style=" margin: auto;">
          <img src="logo và phong nen/Logo.PNG" class="container-fluid" style="width: 100%;" alt="">
        </div>
        <div class="col-4" style=" margin: auto;">
          <ul>
            <li style="font-size: 25px;">Hỗ Trợ Khách Hàng</li>
          </ul>
          <ul style="font-size: 18px;" id="li">
            <li><a href="#">Chăm Sóc Cây</a>
            </li>
            <li><a href="#">Đặt Hàng</a>
            </li>
            <li><a href="#">Chính Sách Bảo Hành</a>
            </li>
            <li><a href="#">Tư Vấn</a>
            </li>
          </ul>
        </div>
        <div class="col-4">
          <ul>
            <li style="font-size: 25px;">Về Chúng Tôi</li>
          </ul>
          <ul style="font-size: 18px;" id="li">
            <li><a href="#">Trang Chủ</a>
            </li>
            <li><a href="#">Sản Phẩm</a>
            </li>
            <li><a href="#">Giới Thiệu</a>
            </li>
            <li><a href="#">Liên Hệ</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>