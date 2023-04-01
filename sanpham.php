<?php 
  include_once "./connection.php";
  session_start();
  // echo $_SESSION['sotk'];
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
                        <a class="nav-link text-success" style="background-color: rgb(192, 243, 243);
                        font-weight: bold ; color: chartreuse; " href="sanpham.php">Sản phẩm</a>
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
                            <li class="nav-item">
                              <a class="nav-link" href="dangnhap.php">Đăng Nhập</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="dangky.php">Đăng Ký</a>
                            </li>
                          ';
                        }
                      ?>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="donhanguser.php">Đơn Hàng</a>
                    </li> -->
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
      <main>
        <div style="width: 80%; height: 50%;margin: 0 auto;" id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php 
              $query = 'select * from spnb';

              try {
                  $sth = $pdo->query($query);
                  if ($row = $sth->fetch()){
                    echo '<div class="carousel-item active">
                            <img src="'.$row['hinh1'].'" style="height: 500px;" class="d-block w-100" alt="...">
                          </div>';
                    echo '<div class="carousel-item">
                            <img src="'.$row['hinh2'].'" style="height: 500px;" class="d-block w-100" alt="...">
                          </div>';
                    echo '<div class="carousel-item">
                            <img src="'.$row['hinh3'].'" style="height: 500px;" class="d-block w-100" alt="...">
                          </div>';
                  }   
              } catch (PDOException $e){
                  
              }
              
              ?>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </button>
        </div>          
        <div class="container-fluid">
          <div class="row">
          <div class="col-sm-5 col-md-5 col-lg-4 col-xl-3">
            <br>
              <div class="accordion" id="accordionExample">
              <?php 
                    $query = "select * from loaisp";
                    $stt = 1;
                    try {
                        $sth = $pdo->query($query);
                        while ($row = $sth->fetch()){
                            echo '  
                              <div class="card">
                              <div class="card-header" id="heading">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                                    <a href="sanpham.php?maloai='.$row['Maloai'].'" style="font-size: 20px;">'.$row['Tenloai'].'</a> 
                                  </button>
                                </h2>
                              </div>
                              </div>
                            ';
                        }   
                    } catch (PDOException $e){
                        
                    }
                ?>
              
              </div>                  
          </div>
              <div class="col-sm-7 col-md-7 col-lg-8 col-xl-9" style="padding-top: 25px;">
                        <div class="row">
                        <?php 
                        if(isset($_GET['maloai'])){
                          $query = "select * 
                                    from sanpham sp join loaicuthe l on sp.idloai=l.idloai
                                    where Maloai = '".$_GET['maloai']."'";
                        } else{
                           $query = "select * from sanpham";
                        }
                        $stt = 1;
                          try {
                              $sth = $pdo->query($query);
                              while ($row = $sth->fetch()){
                                  echo '  
                                    <div class="col-12 col-lg-6 col-xl-4 sanpham">
                                      <a href="chitietsanpham.php?masp='.$row['MaSP'].'" class="chitiet" >
                                      <img src="'.$row['hinh'].'" alt="">'.$row['tenSP'].'</a>
                                    </div>
                                  ';
                              }   
                          } catch (PDOException $e){
                              
                          }
                          ?>
                        
                        </div>
                    
              </div>
          </div>
      </main>
          
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