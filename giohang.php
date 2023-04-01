<?php 
  include_once "./connection.php";
   session_start();
  //  echo $_GET['kc'];

  if(isset($_POST['ttsp'])) {
    $query = 'INSERT INTO `myweb`.`soluonggh` (`MaSP`, `SoTK`, `soLuong`) 
    VALUES (?,?,?);';
		try{
      $sth = $pdo->prepare($query);
      $sth->execute([
        $_POST['ttsp'],
        $_SESSION['sotk'],
        $_POST['soluong'],
      ]);
    }catch (PDOException $e){
      $pdo_error = $e->getMessage();
    }
  }

  // if(isset($_SESSION['sotk'])){

  // }

  if(isset($_GET['tang'])) {
    // $soluong = $_GET['f'];
    $query = "UPDATE myweb.`soluonggh` SET soLuong = ?
                    WHERE (MaSP = ?) and (SoTK = ?)";
		try{
      $sth = $pdo->prepare($query);
      $sth->execute([
        $_GET['f']+1,
        $_GET['tang'],
        $_SESSION['sotk']
      ]);
    }catch (PDOException $e){
      $pdo_error = $e->getMessage();
    }
  }
  
  if(isset($_GET['giam'])) {
    $soluong = $_GET['f'];
    if($soluong == 1) {
      $query = "DELETE FROM `myweb`.`soluonggh` WHERE (`MaSP` = ? ) and (`SoTK` = ?);";
      try{
        $sth = $pdo->prepare($query);
        $sth->execute([
          $_GET['giam'],
          $_SESSION['sotk']
        ]);
      }catch (PDOException $e){
        $pdo_error = $e->getMessage();
      }
    } else {
      $query = "UPDATE myweb.`soluonggh` SET soLuong = ?
      WHERE (MaSP = ?) and (SoTK = ?)";
      try{
        $sth = $pdo->prepare($query);
        $sth->execute([
        $_GET['f']-1,
        $_GET['giam'],
        $_SESSION['sotk']
        ]);
      }catch (PDOException $e){
        $pdo_error = $e->getMessage();
        }
      }
    }
    

  if(isset($_POST['ttsp'])){
    header ('Location: sanpham.php');
  }


  // if(isset($_GET['f'])) {
  //   // $soluong = $_GET['f'];
  //   $query = "UPDATE myweb.`soluonggh` SET soLuong = ?
  //                   WHERE (MaSP = ?) and (SoTK = ?)";
	// 	try{
  //     $sth = $pdo->prepare($query);
  //     $sth->execute([
  //       $_GET['f'],
  //       $_GET['tang'],
  //       $_SESSION['sotk']
  //     ]);
  //   }catch (PDOException $e){
  //     $pdo_error = $e->getMessage();
  //   }
  // }
  //  if(isset($_GET['giam'])){
  //     echo $_GET['giam'];
  //  }
  
  // echo $_SESSION['sotk'];
  // echo $_POST['soluong'];
  // echo $_POST['ttsp'];
  

  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Giỏ Hàng</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="shortcut icon" href="logo và phong nen/Logo.PNG" type="image/vnd.microsoft.icon" >
        <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <style>
          td img{
            width: 100px;
          }
        </style>
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
                              <a class="nav-link" href="donhanguser.php">Đơn Hàng</a>
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
      <main class="container-fluid">
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
          <table class="table table-bordered text-center ">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Xóa</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            if(isset($_GET['masp'])){
              $query = "DELETE FROM myweb.sanpham WHERE (MaSP = ?);";
              try{
                  $sth = $pdo->prepare($query);
                  $sth->execute([
                    $_GET['masp'],
                  ]);
                }catch (PDOException $e){
                  $pdo_error = $e->getMessage();
                }
            }
            $query = "select *,soLuong * giaSp as gia
                      from soluongGH natural join sanpham
                                      natural join taikhoan
                      where sotk = '".$_SESSION['sotk']."';";
            $stt = 1;
              try {
                  $sth = $pdo->query($query);
                  while ($row = $sth->fetch()){                          
                      echo ' 
                        <tr>
                          <th scope="row">'.$stt++.'</th>
                          <td><img src="'.$row['hinh'].'"></td>
                          <td>'.$row['tenSP'].'</td>
                          <td>
                          <form action="giohang.php" method="get">
                            <input readonly min="1" type="number" name="f" value="'.$row['soLuong'].'">
                            <button type="submit" name="tang" value="'.$row['MaSP'].'">Tăng</button>
                            <button type="submit" name="giam" value="'.$row['MaSP'].'">Giảm</button>
                          </form>
                          </td>
                          <td>'.$row['gia'].'</td>
                          <td><a href="?masp='.$row['MaSP'].'"><i class="fa-sharp fa-solid fa-trash"></i></a></td>
                        </tr>
                      ';
                  }   
              } catch (PDOException $e){
                  
              }
            ?>
            </tbody>
          </table>
          <form action="donhanguser.php" method="post">
            <div style="text-align: right;">
            <?php
              $query = "select sum(soLuong * giaSp) as tong
                        from soluongGH natural join sanpham
                                      natural join taikhoan
                      where SoTK = '".$_SESSION['sotk']."';"; 
              try {
                  $sth = $pdo->query($query);
                  if ($row = $sth->fetch()){
                      echo  '
                        <h3>Tổng Cộng: <input readonly type="number" name="tong" value="'.$row['tong'].'"></h3>
                      ';
                  }
              } catch (PDOException $e){
                  
              }
              
            ?>        
            <button style="background-color: bisque;" type="text" name="dathang">Đặt Hàng</button>
            <!-- <button type="submit" name="sp" ></button> -->
        </form>   
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
    <!-- <script>
      function Onchange(){
        document.forms['']
      }
    </script> -->
</html>