<div class="container mt-2">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">ADD NEW CATEGORY</h1>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col">
            <div class="w-50 form-group my-3">
                <label for="">Category</label> <br>
                <input class="form-control" type="text" name="cate_name" value="<?= $cate_name ?? '' ?>">
                <span style="color:red">
                    <?= $errors['cate_name'] ?? '' ?>
                </span>
            </div>

            <div class="w-50 form-group my-3">
                <label for="">Category Image</label> <br>
                <input class="form-control" type="file" name="cate_img">
                <input type="hidden" name="cate_img" value="<?= $cate_img ?? '' ?>">
                <span style="color:red">
                    <?= $errors['cate_img'] ?? '' ?>
                </span>
            </div>
        </div>
        <div class="col mb10 mt">
            <input class="btn btn-success text-white" type="submit" name="btn_insert" value="ADD">
            <input class="btn btn-danger text-white" type="reset" value="RESET">
            <a href="index.php?act=listcategory"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>