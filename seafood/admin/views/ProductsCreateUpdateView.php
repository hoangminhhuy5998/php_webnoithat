<?php 
    //load file Layout.php
    $this->layoutPath = "Layout.php";
 ?>
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit products</div>
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:''; ?>" name="name" required class="form-control">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Danh mục</div>
                <div class="col-md-10">
                    <select name="category_id" class="form-control" style="width: 300px;">
                        <option value="0"></option>
                        <?php 
                            $data = $this->modelCategories();
                         ?>
                         <?php foreach($data as $rows): ?>
                        <option <?php if(isset($record->category_id)&&$record->category_id==$rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                            <?php 
                                $dataSub = $this->modelCategoriesSub($rows->id);
                             ?>
                             <?php foreach($dataSub as $rowsSub): ?>
                                <option <?php if(isset($record->category_id)&&$record->category_id==$rowsSub->id): ?> selected <?php endif; ?> value="<?php echo $rowsSub->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsSub->name; ?></option>
                             <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- end rows -->    
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Giá</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->price)?$record->price:''; ?>" name="price" required class="form-control">
                </div>
            </div>
            <!-- end rows -->      
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Giảm giá</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->discount)?$record->discount:'0'; ?>" name="discount" required class="form-control">
                </div>
            </div>
            <!-- end rows -->  
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Giới thiệu</div>
                <div class="col-md-10">
                    <textarea name="descriptions"><?php echo isset($record->descriptions)?$record->descriptions:''; ?></textarea>
                    <!-- <script type="text/javascript">
                        CKEDITOR.replace("descriptions");
                    </script> -->
                </div>
                <script type="text/javascript">
                        CKEDITOR.replace("descriptions");
                    </script>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Chi tiết</div>
                <div class="col-md-10">
                    <textarea name="content"><?php echo isset($record->content)?$record->content:''; ?></textarea>
                </div>
                <script type="text/javascript">
                        CKEDITOR.replace("content");
                    </script>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="checkbox" <?php if(isset($record->hot)&&$record->hot == 1): ?> checked <?php endif; ?> name="hot" id="hot"> <label for="hot">Hot</label>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ảnh</div>
                <div class="col-md-10">
                    <input type="file" name="photo">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-success">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>