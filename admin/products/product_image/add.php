<div class="container mt-2">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">ADD NEW PRODUCT IMAGE</h1>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="w-50 form-group my-3">
            <label for="">Product Image</label> <br>
            <input class="form-control" type="file" name="product_img" value="<?= $product_img ?? '' ?>">
            <span style="color:red">
                <?= $errors['product_img'] ?? '' ?>
            </span>
        </div>

        <div class="col mb10 mt">
            <input class="btn btn-success text-white" type="submit" name="btn_insert" value="ADD">
            <input class="btn btn-danger text-white" type="reset" value="RESET">
            <a href="index.php?act=listimage_product&product_id=<?= $product_id ?>"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>