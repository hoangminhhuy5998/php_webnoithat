 <?php 
  //load file Layout.php
  $this->layoutPath = "LayoutTrangChu.php";
 ?> 
  <!-- content -->
    <div class="content">
      <!-- left -->
      <div class="content-left">
        <!-- post -->
        <div class="post">
          <div class="post-title">
            BÀI VIẾT NỔI BẬT
          </div>
          <div class="post-content">
            <ul>
              <?php 
              $news = $this->modelHotNews();
             ?> 
             <?php foreach($news as $rows): ?>
              <li>
                <div class="post-image"><img src="assets/upload/news/<?php echo $rows->photo; ?>"></div>
                            <div class="post-content-title"><a href="index.php?controller=news&action=detail&id=<?php echo $rows->id ?>"><?php echo $rows->name; ?></a></div>
                            <div class="post-meta">
                              <ul>
                                <li><div class="coment">Coment</div></li>
                                <li><div class="Date"><time datetime="<?php echo $rows->time; ?>"><?php echo $rows->time; ?></time></div></li>
                              </ul>
                            </div>
                           <div class="post-description"><?php echo $rows->descriptionsnews; ?>  </div>
                           <div class="post-button">
                            <a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>">ĐỌC TIẾP >></a>
                           </div>
                       </li>
                       <?php endforeach; ?>

            </ul>
          </div>
        </div>
        <!-- post -->
      </div>
      <!-- left -->
      <!-- right -->
      <div class="content-right">
        <!-- content-right-footer1 -->
        <div class="content-right-footer1">
          <a href="#"><img src="assets/frontend/images/footer1.PNG"></a>
          <div class="sub"></div>
          <div class="sub2"></div>
            <div class="sub3"></div>
            <div class="sub4"></div>
        </div>
        <!-- content-right-footer1 -->
        <!-- content-title -->
        <div class="content-title">
          <div class="title-line"></div>
          <div class="title-sub"> HOT </div>
        </div>
        <!-- content-title -->
        <!-- product -->
        <div class="product-list">
          <ul>
            <?php 
                  $hotProducts = $this->modelHotProducts();
               ?>
               <?php foreach($hotProducts as $rows): ?>
            <li>
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
                  
                      <img src="assets/upload/products/<?php echo $rows->photo; ?>">
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
                         <span><?php echo number_format($rows->price - $rows->price*$rows->discount/100); ?>  ₫</span>
                         <?php if(isset($rows->discount)&&$rows->discount != 0): ?>
                          <del><?php echo number_format($rows->price); ?> ₫</del>
                        <?php endif; ?>
                      </div>
                      </div>
              </li>
               <?php endforeach; ?> 
          </ul>
          
        </div>
        <!-- product -->
        <!-- content-right-footer1 -->
        <div class="content-right-footer1">
          <a href="#"><img src="assets/frontend/images/footer2.PNG"></a>
          <div class="sub"></div>
          <div class="sub2"></div>
            <div class="sub3"></div>
            <div class="sub4"></div>
        </div>
        <!-- content-right-footer1 -->
        <!-- content-title -->
        <!-- <div class="content-title">
          <div class="title-line"></div>
          <div class="title-sub">Cua nghẹ</div>
        </div> -->
        <!-- content-title -->
        <!-- product -->
        <div class="product-list">
          <!-- content-title -->
          <?php 
            $categories = $this->modelCategories();
         ?>
         <?php foreach($categories as $rowsCategory): ?>
        <div class="content-title">
          <div class="title-line"></div>
          <div class="title-sub"><?php echo $rowsCategory->name; ?></div>
        </div>
        <!-- content-title -->
          <ul>
            <?php 
                  $products = $this->modelProducts($rowsCategory->id);
               ?>
               <?php foreach($products as $rows): ?>
            <li>
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
                      <img src="assets/upload/products/<?php echo $rows->photo; ?>">
                      <div class="product-action">
                        <div class="add-product">
                          <a href="index.php?controller=cart&action=add&id=<?php echo $rows->id; ?>">
                            <i class="fas fa-shopping-bag"></i>
                          </a>
                        </div>
                        <div class="view-product">
                          <a href=".assets/upload/products/<?php echo $rows->photo; ?>">
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
              </li>
               <?php endforeach; ?>
          </ul>
         <!-- showmore -->
        <div class="showmore">
          Mời bạn
          <a href="index.php?controller=products&action=category&category_id=<?php echo $rows->id; ?>">Xem thêm các sản phẩm về <?php echo $rowsCategory->name; ?></a>
          khác
        </div>
        <!-- showmore -->
          <?php endforeach; ?>
        </div>
        <!-- product -->
        <!-- content-right-footer1 -->
        <div class="content-right-footer1">
          <a href="#"><img src="assets/frontend/images/footer3.PNG"></a>
          <div class="sub"></div>
          <div class="sub2"></div>
            <div class="sub3"></div>
            <div class="sub4"></div>
        </div>
        <!-- content-right-footer1 -->
      </div>
      <!-- right -->
    </div>
  <!-- content -->
  <!-- news -->
  <div class="news">
    <!-- news-header -->
        <div class="news-header">
          <div class="news-header-line"></div>
          <div class="news-header-sub">Tin tức nổi bật</div>
        </div>
        <div class="news-content">
            <ul>
               <?php 
              $news = $this->modelHotNews();
             ?> 
             <?php foreach($news as $rows): ?>
              <li>
                <div class="news-image"><img src="assets/upload/news/<?php echo $rows->photo; ?>"></div>
                            <div class="news-content-title"><a href="index.php?controller=news&action=detail&id=<?php echo $rows->id ?>"><?php echo $rows->name; ?></a></div>
                            <div class="news-meta">
                              <ul>
                                <li><div class="coment">Coment</div></li>
                                <li><div class="Date"><time datetime="<?php echo $rows->time; ?>"><?php echo $rows->time; ?></time></div></li>
                              </ul>
                            </div>
                           <div class="news-description"><?php echo $rows->descriptionsnews; ?></div>
                           <div class="news-button">
                            <a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>">ĐỌC TIẾP >></a>
                           </div>
                  </li>
                   <?php endforeach; ?>
            </ul>

          </div>
      <!-- news-header -->
  </div>
  <!-- news -->