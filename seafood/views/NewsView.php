<?php 
  //load file Layout.php
  $this->layoutPath = "LayoutTrangTrong.php";
 ?>
 <div class="contentsp-left">
      <!-- link -->
      <div class="link">
        <a href="index.php">Trang chủ</a> &emsp;>>&emsp;
        <span>Tin Tức</span>
      </div>
      <!-- link -->
      <!-- title -->
      <div class="title">
        <h2>Tin Tức</h2>
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
      </div>
      <!-- toolbar -->
      <!-- product -->
        <div class="product-list">
          
            <?php foreach($data as $rows): ?>
            <div class="col-xs-3 col-md-6 col-sm-3 ">
              <div class="news-images"><img src="assets/upload/news/<?php echo $rows->photo; ?>"></div>
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