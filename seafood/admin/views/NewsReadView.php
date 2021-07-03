<?php 
    //load file Layout.php
    $this->layoutPath = "Layout.php";
 ?>
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=news&action=create" class="btn btn-primary">Thêm Tin Tức</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading" style="background:black;">Danh sách Tin Tức</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Tên</th>
                    <th style="width:50px">Hot</th>
                    <th style="width:70px">time</th>
                    <th style="width: 100px;">Ảnh</th>
                    <th style="width:100px;">Điều chỉnh</th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    
                    <td><?php echo $rows->name; ?></td>
                    <td style="text-align: center;">
                        <?php if(isset($rows->hot)&&$rows->hot == 1): ?>
                            <span class="fa fa-check"></span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $rows->time; ?></td>
                    <td>
                        <?php if($rows->photo != "" && file_exists("../assets/upload/news/".$rows->photo)): ?>
                            <img src="../assets/upload/news/<?php echo $rows->photo; ?>" style="width:100px;">
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center;width: 150px;">
                        <a href="index.php?controller=news&action=update&id=<?php echo $rows->id; ?>"><input type="submit" value="Sửa" class="btn btn-danger" ></a>
                        <a href="index.php?controller=news&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><input type="submit" value="Xóa" class="btn btn-warning"></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <!-- liet ke cac trang -->
            <ul class="pagination">
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item">
                    <a href="index.php?controller=news&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>