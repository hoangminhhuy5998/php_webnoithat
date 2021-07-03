<?php 
  //load file Layout.php
  $this->layoutPath = "LayoutTrangTrong.php";
 ?>
<!-- left -->
    <div class="contentsp-left">
      <h3>ĐĂNG KÝ TÀI KHOẢN</h3>
       <p>Nếu bạn có tài khoản xin vui lòng đăng nhập</p>
      <div class="form">
          <form method="post" action="index.php?controller=account&action=loginPost">
            <p class="form-title">
              <span><td>Đăng nhập tài khoản</td></span>
            </p>
            <table cellpadding="5">
              <tr>
                <td class="form-text">Email:<b id="req">*</b></td>
                <td class="form-input"><input type="email" name="email" required></td>
              </tr>
              <tr>
                <td class="form-text">Mật khẩu:<b id="req">*</b></td>
                <td class="form-input"><input type="password" name="password" required></td>
              </tr>
              <tr>
                <td class="form-text"></td>
                <td class="form-submit"><input type="submit" value="Đăng nhập"></td>
              </tr>

            </table>

          </form>
       
      </div>
      <div class="form">
        
          
          <form method="post" action="">
            <p class="form-title">
              <span><td>Tạo tài khoản mới</td></span>
            </p>
            <table cellpadding="5">
                <p class="form-content">
                Đăng ký tài khoản để mua hàng nhanh hơn. Theo dõi đơn đặt hàng, vận chuyển. Cập nhật các sự kiện và chương trình giảm giá của chúng tôi.</p>
              <a href="index.php?controller=account&action=register" class="form-button">Đăng Ký</a>

            </table>

          </form>
        
      </div>
    </div>
    <!-- left -->