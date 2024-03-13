<?php
 $hinhpath = "../upload/" . $product_img;
 if (is_file($hinhpath)) {
     $product_img = "<img src='" . $hinhpath . "' height='80'>";
 } else {
     $product_img = "no photo";
 }
?>
<div class="container mt-2">
<div class="row frmtitle">
        <div class="">
            <h1 class="title">UPDATE PRODUCT IMAGE</h1>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
   
        <div class="w-50 form-group my-3">
            <label for="">Product Image</label> <br>
            <input type="hidden" name="product_img" value="<?= $product_img ?? '' ?>">
            <input class="form-control" type="file" name="product_img" value="<?= $img_product ?? '' ?>">
            <img class="mt-2" src="<?= $hinhpath ?? '' ?>" height='80'>
            <span style="color:red">
                    <?= $errors['product_img'] ?? '' ?>
                </span>
        </div>   
        <div class="col mb10 mt">
        <input type="hidden" name="product_img_id" value="<?php if (isset($product_img_id) && ($product_img_id > 0)) echo $product_img_id; ?>">
            <input class="btn btn-success text-white" type="submit" name="updateimg_product" value="UPDATE">
            <a href="index.php?act=listimage_product&product_id=<?= $product_id ?>"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>