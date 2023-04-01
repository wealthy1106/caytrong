<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Giới Thiệu</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="shortcut icon" href="logo và phong nen/Logo.PNG" type="image/vnd.microsoft.icon" >
        <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <style>
          main div img{
            width: 40%; 
            height: 40%; 
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
                    <li class="nav-item active">
                        <a class="nav-link text-success" style="background-color: rgb(192, 243, 243);font-weight: bold ; color: chartreuse; " href="gioithieu.php">Giới thiệu</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="lienhe.php">Liên hệ</a>
                    </li>
                    <?php 
                        if(isset($_SESSION['sotk'])){
                          echo '
                            <li class="nav-item">
                              <a class="nav-link" href="dangxuat.php">Đăng Xuất</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="danghanguser.php">Đơn Hàng</a>
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
      </div>
      
      <main class="container-fluid">
          <p id="tieude">GIỚI THIỆU</p>
          <h6 style="font-size: 30px;text-align: center;">CÂY TRỒNG NHÀ NÔNG - BẠN ĐỒNG HÀNH CỦA NÔNG DÂN</h6>
          <div style="font-size: 20px;">
            Cây Trồng Nhà Nông mang đến khách hàng một danh mục các sản phẩm cây giống đa dạng, đáp ứng nhu cầu lựa chọn giống cây trồng của từng đối tượng khách hàng, 
            với các chủng loại tiêu biểu như: quýt,bưởi da xanh,mít thái,hoa hồng,...
            
          </div>
          <div style="text-align: center;"><img src="logo và phong nen/Logo.PNG" style="width: 30%;height: 30%;" alt=""></div>
          <div >
            <p>
              Hãy một lần đến với Cây Trồng Nhà Nông, chúng tôi không hứa gì ngoài việc 
              mang đến cho bạn các sản phẩm cây trồng và dịch vụ chất lượng cao nhất
              thông qua quy trình bán hàng, giao hàng, chăm sóc khách hàng,
                chăm sóc sản phẩm tiêu chuẩn… 
                VỚI GIÁ CẢ PHẢI CHĂNG VÀ PHÙ HỢP TÚI TIỀN.

              Không chỉ là những cây trồng được chăm sóc tỉ mẩn và
              giao tận tay khách hàng, bạn còn nhận được nhiều thông tin
                hữu ích về ý nghĩa, cách chăm sóc và những câu chuyện thú vị
                của từng loại cây mà bạn chưa biết đến, và đặc biệt không phải
                  ai cũng có… là cơ sở khoa học về đặc tính của từng loại cây. 
                  Tất cả ở hình thức đẹp và độc đáo nhất để bạn có thể sử dụng lâu dài.
            </p>
            
          </div>
          <div id="img"><img src="hinhanh/cây ăn trái/quyt.jpg" alt=""></div>
          <br>
          <div>
            
            <p id="daucau">Sứ mệnh</p>
            <p>
              Với ý nghĩa đó, Cây Trồng Nhà Nông đặt ra cho mình sứ mệnh
                cung cấp các loại cây làm đẹp không gian sống và không chỉ vậy, 
                còn cung cấp thêm các giá trị tinh thần cho khách hàng, là điểm đến
                cho mọi khách hàng có nhu cầu tìm mua những cây cảnh trang trí đẹp, 
              phù hợp cá tính, phong thuỷ, không gian sống và làm việc.
            </p>
          </div>

          <div>
              <p id="daucau">Tầm nhìn</p> 
              <p>
              Đến năm 2023, Vườn Cây Việt phấn đấu trở thành 1 trong 3 đơn vị dẫn đầu trong lĩnh vực cung cấp cây cảnh để bàn, cây cảnh mini, bonsai, cây thuỷ sinh, terrarium.... tại Việt Nam, đồng thời trở thành nhà cung cấp đa dạng các loại hình cây cảnh phù hợp cho nhiều đối tượng khách hàng khác nhau với hệ thống đối tác phân phối rộng khắp cả nước.

              Các sản phẩm của Vườn Cây Việt sẽ ngày càng hoàn thiện về mẫu mã, tính đa dạng nhằm đáp ứng được nhu cầu khác nhau đến từ khách hàng.

              </p>
                
          </div>
          <div>
            <p id="daucau">Giá trị cốt lõi: </p>
            <ul>
              <li>
                • Chất lượng: Tập trung vào chất lượng sản phẩm, 
                cam kết chỉ đưa ra thị trường các sản phẩm thực sự chất lượng.
              </li>
              <li>
                • Chính trực: Không lừa dối khách hàng, luôn đảm bảo tư 
                vấn cho khách hàng một cách công tâm, khách quan nhất về sản phẩm.
              </li>
              <li>
                • Sáng tạo, đổi mới: Không ngừng quan sát,
                  tìm hiểu và học hỏi, từ đó đưa ra các ý tưởng, sản phẩm mới.
              </li>
              <li>
                • Đồng đội: Luôn phối hợp tốt giữa các thành viên trong công ty, sẵn sàng chia sẻ, góp ý, động viên và học hỏi lẫn nhau: 
                “vì sự phát triển của từng cá nhân, vì sự phát triển bền vững của công ty”.
              </li>
              <li>
                  Đừng dừng lại ở đây, hãy khám phá các sản phẩm tại Caytrongnhanong.com ngay bây giờ!
              </li>
            </ul>
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