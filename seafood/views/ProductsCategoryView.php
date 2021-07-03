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
        <span><?php 
                    $category = $this->modelGetCategory($category_id);
                    echo $category->name;
                   ?></span>
      </div>
      <!-- link -->
      <!-- title -->
      <div class="title">
        <h2><?php 
                    $category = $this->modelGetCategory($category_id);
                    echo $category->name;
                   ?></h2>
      </div>
      <!-- title -->
      <!-- toolbar -->
      <div class="toolbar">
        <div class="gallery-view">
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="list-view">
          <i class="fas fa-list"></i>
        </div>
        <div class="sort">
          <div class="sort-title">
            <span>Sắp xếp:</span>
          </div>
          <div class="sort-content">
            <span class="custom-dropdown custom-dropdown--white">
                    <select class="selectProductSort sort-by custom-dropdown__select custom-dropdown__select--white" id="lbsort" onchange="window.location.href = 'index.php?controller=products&action=category&category_id=<?php echo $category_id; ?>&order='+this.value;">
                                <option <?php if(isset($_GET["order"])&&$_GET["order"]=="idAsc"): ?> selected <?php endif; ?>  value="idAsc">Mặc định</option>
                                <option
                                <?php if(isset($_GET["order"])&&$_GET["order"]=="priceAsc"): ?> selected <?php endif; ?> value="priceAsc">Giá tăng dần</option>
                                <option <?php if(isset($_GET["order"])&&$_GET["order"]=="priceDesc"): ?> selected <?php endif; ?>value="priceDesc">Giá giảm dần</option>
                                <option <?php if(isset($_GET["order"])&&$_GET["order"]=="nameAsc"): ?> selected <?php endif; ?> value="nameAsc">Tên sản phẩm: A to Z</option>
                                <option <?php if(isset($_GET["order"])&&$_GET["order"]=="nameDesc"): ?> selected <?php endif; ?> value="nameDesc">Tên sản phẩm: Z to A</option>
                    </select>
                </span>
          </div>
        </div>
      </div>
      <!-- toolbar -->
      <!-- product -->
        <div class="product-list">
          
            <?php foreach($data as $rows): ?>
            <div class="col-xs-3 col-md-3 col-sm-3 ">
              <div class="product">
                  <?php if(isset($rows->discount)&&$rows->discount != 0): ?>
                            <div class="sale">
                            <span class="sale-ld"><?php echo $rows->discount; ?>%</span>  
                            </div>
                  <?php endif; ?>
                  <?php if(isset($rows->hot)&&$rows->hot == 1): ?>
                    <div class="hot">
                    <span>Hot</span>
                  </div>
                            
                  <?php endif; ?>
                      <div class="img-category"><img src="assets/upload/products/<?php echo $rows->photo; ?>"></div>
                      <div class="product-action">
                        <div class="add-product">
                          <a href="index.php?controller=cart&action=add&id=<?php echo $rows->id; ?>">
                            <i class="fas fa-shopping-bag"></i>
                          </a>
                        </div>
                        <div class="view-product">
                          <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>">
                            <i class="far fa-eye"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-title"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><b><?php echo $rows->name; ?></b></a><br>
                      </div>
                      <div class="product-price">
                        <span ><?php echo number_format($rows->price - $rows->price*$rows->discount/100); ?> ₫</span>
                        <?php if(isset($rows->discount)&&$rows->discount != 0): ?>
                          <del><?php echo number_format($rows->price); ?> ₫</del>
                        <?php endif; ?>
                      </div>
                      </div>
            </div>
               <?php endforeach; ?>
          
          
        </div>
        <!-- product -->
        <div  style="clear:both"></div>
        <div   class="&#x70;&#x61;&#x67;&#x69;&#x6E;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x2D;&#x63;&#x6F;&#x6E;&#x74;&#x61;&#x69;&#x6E;&#x65;&#x72;">
                  <ul class="pagination">
                    <li class="page-item"><span>Trang</span></li>
                    <?php for($i = 1; $i <= $numPage; $i++): ?>
                    <li class="page-item"><a class="page-link" href="index.php?controller=products&action=category&category_id=<?php echo $category_id; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php endfor; ?>
                  </ul>
                </div>
  </div>

    <!-- left -->
    