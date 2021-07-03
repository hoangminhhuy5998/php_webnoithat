<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
	<!-- wapper -->
	<div class="wapper">
	<?php include "views/HeaderView.php"; ?>
    <!-- service -->
    <div class="service">
			<div class="service-menu">
				<div class="menu-title">
					<a href="/collections/all">DANH MỤC SẢN PHẨM</a>
				<i class="fas fa-bars"></i>
				</div>
				<div class="menu-detial">
			          <ul>
			          	<?php 
				              //lay bien ket noi
				              $conn = Connection::getInstance();
				              $query = $conn->query("select * from categories where parent_id = 0 order by id desc");
				              $categories = $query->fetchAll();
				           ?>
				           <?php foreach($categories as $rows): ?>
			              <li><img src="assets/upload/categories/<?php echo $rows->photo; ?>">
				              <a href="index.php?controller=products&action=category&category_id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a>
				              <ul class="sub-menu">
					             <?php 
					              $querySub = $conn->query("select * from categories where parent_id=".$rows->id);
					              $categoriesSub = $querySub->fetchAll();
					             ?>
					             <?php foreach($categoriesSub as $rowsSub): ?>
					          <li><a href="index.php?controller=products&action=category&category_id=<?php echo $rowsSub->id; ?>"><?php echo $rowsSub->name; ?></a></li>
					   			<?php endforeach; ?>
				              </ul>
				            <?php endforeach; ?>  
			              </li>
			             
			                
		</ul>
		</div>
			</div>
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
	<!-- slideshow -->
	<div class="slideshow">
		<div class="slideshow-right" style="z-index: 0;">
			<img class="img-show" src="assets/frontend/images/slider1.jpg">
			<div class="prev"><i class="fas fa-arrow-left"></i></div>	
			<div class="next"><i class="fas fa-arrow-right"></i></div>

            <script type="text/javascript">
               $(document).ready(function(){
               	    var slide = new Array();
	                slide[0] = "assets/frontend/images/slider1.jpg";
	                slide[1] = "assets/frontend/images/slider2.jpg";
	                slide[2] = "assets/frontend/images/slider3.jpg";
	                var n=0
	                setInterval(function(){
				$(".img-show").fadeOut(function(){
					$(".img-show").attr("src",slide[n]);
					$(".img-show").fadeIn()
					n++;
					if(n == slide.length)
						n=0;
				});
			},5000);
			$(".next").click(function(){
				$(".img-show").attr("src",slide[n]);
					$(".img-show").fadeIn();
					n++;
					if(n == slide.length)
						n=0;
			})
			$(".prev").click(function(){
				n--;
				if (n<0) 
					n = slide.length -1;
				$(".img-show").attr("src",slide[n]);
					$(".img-show").fadeIn();
			});   

        });
            </script>	
		</div>
	</div>
	<!-- slideshow -->
	<!-- adv -->
	<div class="adv">
		<ul>
			<li>
				<div class="description"><img src="assets/frontend/images/adv1.png">
				<ul>
					<li><a href="#">MIỄN PHÍ GIAO HÀNG</a></li>Cho hóa đơn từ 450,000đ
				</ul></div>
			</li>
			<li>
				<div class="description"><img src="assets/frontend/images/adv2.png">
				<ul>
					<li><a href="#">GIAO HÀNG TRONG NGÀY</a></li>Với tất cả đơn hàng
				</ul></div>
			</li>
			<li>
				<div class="description"><img src="assets/frontend/images/adv3.png"><ul>
				    <li><a href="#">SẢN PHẨM AN TOÀN</a></li>Cam kết chất lượng
				</ul></div>
			</li>
		</ul>
						
	</div>
	<!-- adv -->
	 <?php echo $this->view; ?>
	</div>
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