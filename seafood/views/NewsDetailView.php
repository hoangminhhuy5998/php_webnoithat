<?php 
  //load file Layout.php
  $this->layoutPath = "LayoutTrangTrong.php";
 ?>
 <!-- left -->
    <div class="contentsp-left">
      <!-- link -->
      <div class="link">
        <a href="index.php">Trang chủ</a> &emsp;>>&emsp;
        <a href="index.php?controller=news">TIn Tức</a> &emsp;>>&emsp;
        <span><?php echo $record->name; ?></span>
      </div>
      <!-- link -->
      <h2><?php echo $record->name; ?></h2>
      <span>Ngày:<?php echo $record->time; ?></span>
      <div>
       <?php echo $record->descriptionsnews; ?> 
      </div>
      <div>
        <img src="assets/upload/news/<?php echo $record->photo; ?> ">
      </div>
      <div>
        <?php echo $record->content; ?>
      </div>
      
    </div>
    <!-- left -->