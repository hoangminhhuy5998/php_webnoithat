<?php 
  //load file Layout.php
  $this->layoutPath = "LayoutTrangTrong.php";
 ?>
<!-- left -->
    <div class="contentsp-left">
      <h3>ĐĂNG KÝ TÀI KHOẢN</h3>
       <?php if(isset($_GET["notify"]) &&$_GET["notify"] == "error"): ?>
        <p>Email đã tồn tại, bạn hay chon email khac</p>
            <?php else: ?>
            <p>Nếu bạn chưa có tài khoản, hãy đăng ký ngay để nhận thông tin ưu đãi cùng những ưu đãi từ cửa hàng.</p>
          <?php endif; ?>
      <div class="form">
          <form method="post" action="index.php?controller=account&action=registerPost">
            <p class="form-title">
              <span><td>Đăng ký tài khoản</td></span>
            </p>
            <table cellpadding="5">
              <tr>
                <td class="form-text">Họ tên:</td>
                <td class="form-input"><input type="text" name="name" required></td>
              </tr>
              <tr>
                <td class="form-text">Email:<b id="req">*</b></td>
                <td class="form-input"><input type="email" name="email" required></td>
              </tr>
              <tr>
                <td class="form-text">Địa chỉ:</td>
                <td class="form-input"><input type="text" name="address" required></td>
              </tr>
              <tr>
                <td class="form-text">Điện thoai:</td>
                <td class="form-input"><input type="text" name="phone" required></td>
              </tr><tr>
                <td class="form-text">Mật khẩu:<b id="req">*</b></td>
                <td class="form-input"><input type="password" name="password" required></td>
              </tr>
              <tr>
                <td class="form-text"></td>
                <td class="form-submit"><input type="submit" value="Đăng ký"></td>
              </tr>

            </table>

          </form>
       
      </div>
      <div class="form">
        
          
          <form method="post" action="">
            <p class="form-title">
              <span><td>ĐĂNG NHẬP</td></span>
            </p>
            <table cellpadding="5">
                <p class="form-content">
                Đăng nhập tài khoản nếu bạn đã có tài khoản. Đăng nhập tài khoản để theo dõi đơn đặt hàng, vận chuyển và đặt hàng được thuận lợi.</p>
              <a href="index.php?controller=account&action=login" class="form-button">Đăng Nhập</a>

            </table>

          </form>
        
      </div>
    </div>
    <!-- left -->