<?php
  include_once "./connection.php";
  if(isset($_POST['masp'])) {
    $file = $_FILES["fileanh"]['tmp_name'];
    $path = "hinhanh/".$_FILES["fileanh"]['name'];
    move_uploaded_file($file, $path);

    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $xuatxu = $_POST['xuatxu'];
    $giasp = $_POST['giasp'];
    $ddsp = $_POST['ddsp'];
    $congdung = $_POST['congdung'];
    $idloai = $_POST['idloai'];
    $query = 'INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`)
    VALUES (?,?,?,?,?,?,?,?)';
    try{
      $sth = $pdo->prepare($query);
      $sth->execute([
        $masp,
        $tensp,
        $xuatxu,
        $giasp,
        $ddsp,
        $congdung,
        $path,
        $idloai
      ]);
    }catch (PDOException $e){
      $pdo_error = $e->getMessage();
    }
  }  
  if(isset($_POST['tensp'])) {
    $file = $_FILES["fileanh"]['tmp_name'];
    $path = "hinhanh/".$_FILES["fileanh"]['name'];
    move_uploaded_file($file, $path);
    // echo $_POST['tensp'];
    $tensp = $_POST['tensp'];
    $xuatxu = $_POST['xuatxu'];
    $giasp = $_POST['giasp'];
    $ddsp = $_POST['ddsp'];
    $tacdung = $_POST['congdung'];
    $hinh = $path;
    $idloai = $_POST['idloai'];
    $masp = $_POST['masp'];
    $query = "UPDATE `myweb`.`sanpham` SET `tenSP` = ?, 
    `XuatXu` = ?, `giaSp` = ?, `dacdiemSP` = ?, `tacdung` = ?, `hinh` = ?, `idloai` = ?
     WHERE (`MaSP` = '".$masp."');            ";
    try{
      $sth = $pdo->prepare($query);
      $sth->execute([
        $tensp,
        $xuatxu,
        $giasp,
        $ddsp,
        $tacdung,
        $hinh,
        $idloai
      ]);
    }catch (PDOException $e){
      $pdo_error = $e->getMessage();
    }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>
    <link rel="shortcut icon" href="logo và phong nen/Logo.PNG" type="image/vnd.microsoft.icon" >
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <div class="row">
            <div class="col-sm-3">
                <img src="logo và phong nen/Logo.PNG" style="width: 100%;" alt="">
                <div>
                    <ul>
                        <li><button style="background-color: aquamarine;"><a href="#">Sản Phẩm</a></button></li>
                        <li><button><a href="admin/loaisp.php">Loại Sản Phẩm</a></button></li>
                        <li><button><a href="admin/loaisp1.php">Loại Cụ Thể</a></button></li>
                        <li><button><a href="admin/Khachhang.php">Khách Hàng</a></button></li>
                        <li><button><a href="admin/dsdonhang.php">Danh Sách Đơn Hàng</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <div><img src="logo và phong nen/nenadmin.PNG" style="width: 100%;" alt=""></div>
               <h1 style="text-align: center;">Sản Phẩm</h1>
                <div>
                <div>
                  <a href="admin/themsp.php" style="background-color: aqua; font-size: 30px;"><i class="fa-thin fa-plus"></i></a>
                </div>
                <br>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã Sản Phẩm</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Xuất Xứ</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Idloai</th>
                            <th scope="col">Chỉnh Sửa</th>
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
                            $query = 'select * from sanpham';
                            $stt = 1;
                            try {
                                $sth = $pdo->query($query);
                              
                                while ($row = $sth->fetch()){
                                    echo ' 
                                      <tr>
                                        <th scope="row">'.$stt++.'</th>
                                        <td>'.$row['MaSP'].'</td>
                                        <td>'.$row['tenSP'].'</td>
                                        <td>'.$row['XuatXu'].'</td>
                                        <td>'.$row['giaSp'].'</td>
                                        <td> <img src="'.$row['hinh'].'"alt=""></td>
                                        <td>'.$row['idloai'].'</td>
                                        <td><a href="admin/chinhsuasanpham.php?masp='.$row['MaSP'].'"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a></td>
                                        <td><a href="?masp='.$row['MaSP'].'"><i class="fa-sharp fa-solid fa-trash"></i></a></td>
                                      </tr>
                                    ';             
                                }   
                            } catch (PDOException $e){
                                
                            }
                          ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>