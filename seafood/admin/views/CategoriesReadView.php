<?php 
    //load file Layout.php
    $this->layoutPath = "Layout.php";
 ?>
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=categories&action=create" class="btn btn-primary" >Thêm category</a>
    </div>
    <div class="panel panel-primary" >
        <div class="panel-heading" style="background: black;">Danh sách Categories</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Tên</th>
                    <th style="width: 100px;">Ảnh</th>
                    <th style="width:100px;"></th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td style="color: red;"><?php echo $rows->name; ?></td>
                    <td>
                        <?php if($rows->photo != "" && file_exists("../assets/upload/categories/".$rows->photo)): ?>
                            <img src="../assets/upload/categories/<?php echo $rows->photo; ?>" style="width:25px;">
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center;width: 150px;" >
                        <a href="index.php?controller=categories&action=update&id=<?php echo $rows->id; ?>"><input type="submit" value="Sửa" class="btn btn-danger"></a>
                        <a href="index.php?controller=categories&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Bạn chắc chắn muốn xóa');"><input type="submit" value="Xóa" class="btn btn-warning"></a>
                    </td>
                </tr>
                <?php 
                    $categoriesSub = $this->modelCategoriesSub($rows->id) 
                ?>
                <?php foreach ($categoriesSub as $rowsSub):
                ?>
                <tr>
                    <td style="padding-left: 30px;color: red;"><?php echo $rowsSub->name; ?></td>
                    <td>
                        <?php if($rowsSub->photo != "" && file_exists("../assets/upload/categories/".$rows->photo)): ?>
                            <img src="../assets/upload/categories/<?php echo $rowsSub->photo; ?>" style="width:25px;">
                        <?php endif; ?>
                    </td>
                    <td style="text-align: center;"><a href="index.php?controller=categories&action=update&id=<?php echo $rowsSub->id; ?>"><input type="submit" value="Sửa" class="btn btn-danger"></a>&nbsp;
                        <a href="index.php?controller=categories&action=delete&id=<?php echo $rowsSub->id; ?>" onclick="return window.confirm('Bạn chắc chắn muốn xóa');"><input type="submit" value="Xóa" class="btn btn-warning"></a></td>
                </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <!-- liet ke cac trang -->
            <ul class="pagination">
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item">
                    <a href="index.php?controller=categories&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>