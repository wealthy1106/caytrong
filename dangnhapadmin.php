<?php
  include_once "./connection.php";
  
  // if(isset($_POST['masp'])) {
  //   $file = $_FILES["fileanh"]['tmp_name'];
  //   $path = "hinhanh/".$_FILES["fileanh"]['name'];
  //   move_uploaded_file($file, $path);

  //   $masp = $_POST['masp'];
  //   $tensp = $_POST['tensp'];
  //   $xuatxu = $_POST['xuatxu'];
  //   $giasp = $_POST['giasp'];
  //   $ddsp = $_POST['ddsp'];
  //   $congdung = $_POST['congdung'];
  //   $idloai = $_POST['idloai'];
  //   $query = 'INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`)
  //   VALUES (?,?,?,?,?,?,?,?)';
  //   try{
  //     $sth = $pdo->prepare($query);
  //     $sth->execute([
        
  //     ]);
  //   }catch (PDOException $e){
  //     $pdo_error = $e->getMessage();
  //   }
  // }  
   
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
    <main>
        <div id="tieude"><p>ĐĂNG NHẬP</p></div>
        <div class="container-fluid" style="width: 500px;margin: auto; border: 2px solid rgba(3, 105, 11, 0.2);">
            <form action="dangnhap.php" method="POST">
               <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Mật Khẩu</label>
                <input type="password" name='matkhau' class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-primary">Đăng Nhập</button> 
            </form>
            <br>
          </div>
          <br>
      </main>
</body>
</html>