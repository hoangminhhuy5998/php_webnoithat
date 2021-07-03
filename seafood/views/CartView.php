<?php 
  //load file Layout.php
  $this->layoutPath = "LayoutTrangTrong.php";
 ?>
 <?php if(isset($_SESSION["cart"])==true): ?>
<div class="template-cart" ><!-- style="margin-bottom: 70px;" -->
          <form action="index.php?controller=cart&action=update" method="post">
            <div class="table-responsive">
              <table class="table table-cart" ><!-- style="border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;" -->
                <thead>
                  <tr ><!-- style="background: #f8f8f8;font-size: 14px;"> -->
                    <th class="image" ><!-- style="width: 20%;border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;"> -->Ảnh sản phẩm</th>
                    <th class="name" ><!-- style="width: 30%;border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;"> -->Tên sản phẩm</th>
                    <th class="price"> <!-- style="width: 15%;border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;"> -->Giá bán lẻ</th>
                    <th class="quantity" ><!-- style="width: 15%;border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;"> -->Số lượng</th>
                    <th class="price" ><!-- style="border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;width: 15%;"> -->Thành tiền</th>
                    <th>Xóa</th>
                  </tr>
                </thead>
                <tbody>
               <?php foreach($_SESSION['cart'] as $product): ?>   
                  <tr>
                    <td ><!-- style="border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;"> --><img src="assets/upload/products/<?php echo $product['photo']; ?>" class="img-responsive" /></td>
                    <td ><!-- style="border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;text-decoration: none;"> --><a href="index.php?controller=products&action=detail&id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></td>
                    <td ><!-- style="border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;">  --><?php echo number_format($product["price"]); ?>₫ </td>
                    <td ><!-- style="border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;"> --><input type="number" id="qty" min="1" class="input-control" value="<?php echo $product['number']; ?>" name="product_<?php echo $product['id']; ?>" required="Không thể để trống"></td>
                    <td ><!-- style="border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;"> --><p><b><?php echo number_format($product['number']*$product['price']); ?>₫</b></p></td>
                    <td ><!-- style="border-collapse: collapse;border: solid 1px #ebebeb;vertical-align: middle !important;text-align: center !important;"> --><a href="index.php?controller=cart&action=delete&id=<?php echo $product['id']; ?>" data-id="2479395"><i class="fa fa-trash "></i></a></td>
                  </tr>
              <?php endforeach; ?>    
                </tbody>
                <?php if($this->cartNumber() > 0): ?>
                <tfoot>
                  <tr>
                    <td colspan="6"><a href="index.php?controller=cart&action=destroy" class="form-button"  style="margin-left:10px" > Xóa toàn bộ</a> <a href="index.php" class="form-button" style="margin-left:10px;">Tiếp tục mua hàng</a>
                       <input type="submit" class="button-cart"  value="Cập nhật"><!-- style="background: #464646;color: white;height: 40px;border:none ;border-radius: 3px;width: 150px;text-decoration: none;margin-bottom: 20px;margin-left: 10px;" --></td>
                  </tr>
                </tfoot>
              <?php endif; ?>
              </table>
            </div>
          </form>
          <?php if($this->cartNumber() > 0): ?>
          <div class="total-cart"> <!-- style="text-align: right;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 20px;"> --> Tổng tiền thanh toán:
            <?php echo number_format($this->cartTotal()); ?>₫ <br>
            <a href="index.php?controller=cart&action=checkout" class="form-button">Thanh toán</a> </div>
             <?php endif; ?>
        </div>
        <?php endif; ?>