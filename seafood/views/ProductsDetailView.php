<?php 
  //load file Layout.php
  $this->layoutPath = "LayoutTrangTrong.php";
  $category_id = isset($_GET["category_id"])?$_GET["category_id"]:0;
 ?>
 <!-- left -->
    <div class="contentsp-left">
      <!-- link -->
      <div class="link">
        <a href="index.php">Trang chủ</a> &emsp;>>&emsp;
        <span> 
          <?php
            $category = $this->modelGetCategory($record->category_id);
            echo isset($category->name) ? $category->name : "";
           ?> </span>&emsp;>>&emsp;
           <span><?php echo $record->name; ?></span>
      </div>
      <!-- link -->
      <!-- description-product -->
      <div class="description-product">
        <div class="description-title">
          <div class="description-img">
            <img src="assets/upload/products/<?php echo $record->photo; ?>" style="width: 100%;">
          </div>
          <div class="description-content">
            <div class="description-name">
              <span><?php echo $record->name; ?></span>
              <p > Category:&nbsp; <a href=""></a><span> 
          <?php
            $category = $this->modelGetCategory($record->category_id);
            echo isset($category->name) ? $category->name : "";
           ?> </span></p>
            </div>
            <div class="description-price">
              <span><?php echo number_format($record->price - $record->price * $record->discount/100); ?>₫ </span>
              <?php if(isset($record->discount)&&$record->discount != 0): ?>
                          <del><?php echo number_format($record->price); ?> ₫</del>
                        <?php endif; ?>
                       
            </div>
            <!-- <div class="description-code">
              <span>Mã SP: SKU-0</span>
            </div> -->
            <div class="description-shortcut">
              <?php echo $record->descriptions; ?>
            </div>
            <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0&appId=396333247590396&autoLogAppEvents=1" nonce="s7u3mCzg"></script>
            <div class="fb-like" data-href="http://runecom04.runtime.vn/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
            <div class="buttons_added">
              <span>Số lượng</span>
                           <input class="minus is-form" type="button" value="-">
                           <input aria-label="quantity" class="input-qty" max="100" min="1" name="" type="number" value="1">
                           <input class="plus is-form" type="button" value="+">
                        </div>
                        <div class="button-order">
                          <a class="add-cart" href="index.php?controller=cart&action=add&id=<?php echo $record->id; ?>">
                            <i class="fas fa-shopping-cart"></i><span>Thêm giỏ hàng</span>
                          </a>
                          <a class="buy-now" href="index.php?controller=cart&action=add&id=<?php echo $record->id; ?>">
                           <i class="fas fa-check"></i><span>Mua ngay</span>
                          </a>
                        </div>
                        <div class="call">
                          <span>Để lại số điện thoại, chúng tôi sẽ tư vấn ngay sau từ 5 › 10 phút</span>
                          <input type="text" name="call" class="call-txt" id="txtcall" onblur="if(this.value=='')this.value=''" onfocus="if(this.value=='Nhập từ khóa tìm kiếm...')this.value=''" value="">
                     <button class="call-button">
                            <i class="fas fa-phone-alt"></i></i><span>Gọi lại cho tôi</span>
                          </button>
                        </div>
              <script>
              $('input.input-qty').each(function() {
                var $this = $(this),
                  qty = $this.parent().find('.is-form'),
                  min = Number($this.attr('min')),
                  max = Number($this.attr('max'))
                if (min == 0) {
                  var d = 0
                } else d = min
                $(qty).on('click', function() {
                  if ($(this).hasClass('minus')) {
                    if (d > min) d += -1
                  } else if ($(this).hasClass('plus')) {
                    var x = Number($this.val()) + 1
                    if (x <= max) d += 1
                  }
                  $this.attr('value', d).val(d)
                })
              })
              </script>

          </div>
        </div>
      </div>
      <!-- description-product -->
      <!-- description-detail -->
      <div class="description-detail">
        <div class="detail-title">
          <ul>
            <li>
              <span>Chi Tiết Sản phẩm</span>
            </li>
          </ul>
        </div>
        <div class="detail-content">
          <?php echo $record->content; ?>
        </div>
      </div>
      <!-- description-detail -->
      <!-- product-involve -->
      <!-- product-involve -->
    </div>
    <!-- left -->