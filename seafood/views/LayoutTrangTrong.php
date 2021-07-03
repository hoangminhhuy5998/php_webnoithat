<!DOCTYPE html>
<html>
<head>
  <title>Sản Phẩm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/frontend/css/style.css">
  <script type="text/javascript" src="assets/frontend/js/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="assets/frontend/fontawesome-free-5.15.3-web/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/frontend/bootstrap/bootstrap.min221b.css">
  <link href="assets/frontend/css/responsive.css" rel="stylesheet" type='text/css' />
  <script src='assets/frontend/bootstrap/bootstrap.min221b.js' type='text/javascript'></script>

</head>
<body>
  <!--wapper -->
  <div class="wapper">
   <?php include "views/HeaderView.php"; ?>
    <!-- service -->
    <div class="service">
      <div class="service-detail">
        <ul>
          <li><a href="index.php">Trang chủ</a></li>
          <li><a href="#">Giới thiệu</a></li>
          <li><a href="/collections/all">Sản phẩm</a></li>
          <li><a href="index.php?controller=news">Tin tức</a></li>
          <li><a href="index.php?controller=contact">Liên hệ</a></li>
        </ul>
      </div>
  </div>
  <!-- service -->
  <!-- content -->
  <div class="contentsp">
    <div class="container">
    <div class="row">
      <!-- <div class="contentsp"> -->
        <div class="col-xs-12 col-md-9"> 
         <?php echo $this->view; ?>
        </div>
        <div class="col-xs-12 col-md-3"> 
        <!-- right -->
          <div class="contentsp-right">
            <div class="menu">
              <div class="menu-product">
                <div class="menu-product-title">
                  <span>Sản phẩm</span>
                </div>
                <ul >
                  <?php 
                            //lay bien ket noi
                            $conn = Connection::getInstance();
                            $query = $conn->query("select * from categories where parent_id = 0 order by id desc");
                            $categories = $query->fetchAll();
                         ?>
                         <?php foreach($categories as $rows): ?>
                  <li class="child open">
                    <span><a href="index.php?controller=products&action=category&category_id=<?php echo $rows->id; ?>">
                      <i class="fa fa-arrow-circle-right"></i>
                      <?php echo $rows->name; ?>
                    </a></span>
                    <span class="open-close" style="display: block;">
                      <i class="fa fa-angle-down"></i>
                    </span>
                      <ul class="menu-child">
                        <?php 
                              $querySub = $conn->query("select * from categories where parent_id=".$rows->id);
                              $categoriesSub = $querySub->fetchAll();
                             ?>
                             <?php foreach($categoriesSub as $rowsSub): ?>
                        <li>
                          <span>
                            <a href="index.php?controller=products&action=category&category_id=<?php echo $rowsSub->id; ?>">
                              <i class="fa fa-check"></i>
                              <?php echo $rowsSub->name; ?>
                              </a>
                            </span>
                        </li>
                        <?php endforeach; ?>
                      </ul>
                  </li>
                  <?php endforeach; ?>
                </ul>
                      </div>
                      <script type="text/javascript">
                          $(document).ready(function () {
                             $('.menu-product li.child .open-close'). on('click', function () {
                                  $(this).removeAttr('href');
                                  var element = $(this).parent('li');
                                  if (element.hasClass('open')) {
                                      element.removeClass('open');
                                      element.children('ul').slideUp();
                                  }
                                  else {
                                  element.addClass('open');
                                  element.children('ul').slideDown();
                                  }
                              });
                          });
                      </script>
                      <div class="product-hot">
                        <div class="product-hot-title">
                          <span>Sản phẩm hot</span>
                        </div>
                        <div class="product-hot-content">
                    <ul>
                       <?php 
                        $hotProducts = $this->modelHotProducts();
                     ?>
                     <?php foreach($hotProducts as $rows): ?>
                    <li>
                      
                      <div class="description"><img src="assets/upload/products/<?php echo $rows->photo; ?>">
                        <ul>
                          <li><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></li>
                               <span><?php echo number_format($rows->price - $rows->price*$rows->discount/100); ?>  ₫</span>
                        </ul></div>
                    </li>
                    <?php endforeach; ?> 
                  </ul>
                        </div>
                      </div>
                      <!-- policy -->
                      <div class="policy">
                        <div class="policy-title">
                          <span>CHÍNH SÁCH BÁN HÀNG</span>
                        </div>
                        <div class="policy-content">
                          <ul>
                            <li><div class="numerical">
                              <span>1</span>
                            </div>
                            Giao hàng toàn quốc</li>
                            <li><div class="numerical">
                              <span>2</span>
                            </div>
                            Thanh toán khi nhận hàng</li>
                            <li><div class="numerical">
                              <span>3</span>
                            </div>
                            Đổi trả trong 15 ngày</li>
                            <li><div class="numerical">
                              <span>4</span>
                            </div>
                            Hoàn ngay tiền mặt</li>
                            <li><div class="numerical">
                              <span>5</span>
                            </div>
                            Chất lượng đảm bảo</li>
                            <li><div class="numerical">
                              <span>6</span>
                            </div>
                            Miễn phí vận chuyển:<br>
                          Đơn hàng từ 3 món trở lên</li>
                          </ul>
                        </div>
                      </div>
                      <!-- policy -->
                      <!-- guide -->
                      <div class="guide">
                        <div class="policy-title">
                          <span>HƯỚNG DẪN MUA HÀNG</span>
                        </div>
                        <div class="guide-content">
                          <ul>
                      <li>
                        <span>1.</span>
                          Mua hàng trực tiếp tại website
                          <b > http://www.runtime.vn</b>
                      </li>
                      <li>
                        <span>2.</span>
                          Gọi điện thoại <strong >
                              0908 77 00 95
                          </strong> để mua hàng
                      </li>
                      <li><span>3.</span>
                          Mua tại Trung tâm CSKH:<br>
                          <strong >5/12A Quang Trung, P.14, Q.Gò Vấp, Tp.HCM</strong>
                          <a style="text-decoration: none;" href="index.php?controller=contact" rel="nofollow" target="_blank">Xem Bản Đồ</a>
                      </li>
                      <li><span>4.</span>
                          Mua sỉ/buôn xin gọi <strong >
                              0908 77 00 95
                          </strong> để được
                          hỗ trợ.
                      </li>
                  </ul>
                        </div>
                      </div>
                      <!-- guide -->
            </div>
          </div>
            <!-- right -->
       <!--  </div> -->
      </div>
    </div>
  </div>
  </div>
  <!-- content -->
  <!-- footer -->
  <div class="footer">
    <!-- footer-top -->
    <div class="footer-top">
      <div class="footer-block">
        <div class="footer-block-title">
          VỀ CHÚNG TÔI
        </div>
        <div class="footer-block-content">
          <ul>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Chính sách đổi trả</a></li>
            <li><a href="#">Bảo mật</a></li>
            <li><a href="#">Liên hệ</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-block">
        <div class="footer-block-title">
          TRỢ GIÚP
        </div>
        <div class="footer-block-content">
          <ul>
            <li><a href="#">Hướng dẫn mua hàng</a></li>
            <li><a href="#">Hướng dẫn thanh toán</a></li>
            <li><a href="#">Tài khoản giao dich</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-block">
        <div class="footer-block-title">
          ĐĂNG KÍ NHẬN BẢN TIN
        </div>
        <div class="footer-block-content">Đăng Ký Thành Viên Để Nhận Bản Tin Mỗi Ngày:
        <form id="newsletter_form" ng-submit="registerNewsletter()" class="m-b-20 contact-form ng-pristine ng-valid-email ng-invalid ng-invalid-required">
                    <div class="newsletter_wrap">
                        <input ng-model="newsletter.Email" required="" id="contact_email" autocomplete="off" type="email" class="ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required">
                        <label>Email của bạn </label>
                        <button class="btn-newsletter" type="submit">
                        <span><i class="far fa-paper-plane"></i></span>
                        </button>
                    </div>
                </form>
        </div>
      </div>
      <div class="footer-block">
        <div class="footer-block-title">
          THEO DÕI TRÊN FANPAGE
        </div>
      </div>
    </div>
    <!-- footer-top -->
    <!-- footer-bottom -->
    <div class="footer-bottom">
      <div class="partner">
        <ul>
        <li>CÔNG TY TNHH PHÁT TRIỂN CÔNG NGHỆ RUNTIME</li>
        <li>Địa chỉ: 5/12A Quang Trung, P.14, Q.Gò Vấp, Tp.HCM</li>
        <li>Số điện thoại: (08) 66 85 85 38</li>
        <li>Số điện thoại: (08) 66 85 85 38</li>
        <li>Email: runecom04@runtime.vn</li>
          </ul>
      </div>
      <div class="copyright">
        © 2017. Bản quyền thuộc về 
                <a href="#">SeaFood Store</a>
        . Powered by <a href="#">RUNTIME.VN</a>
        <ul>
          <li><span><i class="fab fa-facebook-f"></i></span></li>
          <li><span><i class="fab fa-twitter"></i></span></li>
          <li><span><i class="fab fa-google-plus-g"></i></span></li>
          <li><span><i class="fab fa-youtube"></i></span></li>
        </ul>
        
      </div>
         
    </div>
    <!-- footer-bottom -->
  </div>
  <!-- footer -->
  </div>
  <!-- wapper -->
  <!-- on-top -->
  <a class="on_top" href="#top" style="display: block;"><i class="fa-arrow-circle-up fa"></i></a>
    <script type="text/javascript">
      $(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#on_top').fadeIn();
        } else {
            $('#on_top').fadeOut();
        }
    });
    $('#on_top').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
    </script>
    <!-- on-top -->

</body>
</html>