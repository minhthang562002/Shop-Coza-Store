<div class="container mt-2">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">ADD NEW PRODUCT</h1>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Name</label> <br>
                <input class="form-control" type="text" name="product_name" value="<?= $product_name ?? '' ?>">
                <span style="color:red">
                    <?= $errors['product_name'] ?? '' ?>
                </span>
            </div>

            <div class="w-50 form-group my-3">
                <label for="">Price</label>
                <input class="form-control" type="number" name="product_price" value="<?= $product_price ?? '' ?>">
                <span style="color:red">
                    <?= $errors['product_price'] ?? '' ?>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Image</label>
                <input class="form-control" type="file" name="product_img" value="<?= $product_img ?? '' ?>">
                <span style="color:red">
                    <?= $errors['product_img'] ?? '' ?>
                </span>
            </div>
            <div class="w-50 form-group my-3">
                <label for="">Sale(%)</label>
                <input class="form-control" type="number" name="product_sale" value="<?= $product_sale ?? '' ?>" min="1" max="100">
                <span style="color:red">
                    <?= $errors['product_sale'] ?? '' ?>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Date</label>
                <input class="form-control" type="date" name="product_posting_date" value="<?= $product_posting_date ?? '' ?>">
                <span style="color:red">
                    <?= $errors['product_posting_date'] ?? '' ?>
                </span>
            </div>

            <div class="w-25 form-group mt-3">
                <label for="">Tag</label>
                <select class="form-control" name="tag_id" id="">
                    <?php foreach ($tags as $tag) : ?>
                        <option value="<?= $tag['tag_id'] ?>">
                            <?= $tag['tag_name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="w-25 form-group mt-3">
                <label for="">Category</label>
                <select class="form-control" name="cate_id" id="">
                    <?php foreach ($listcate as $cate) : ?>
                        <option value="<?= $cate['cate_id'] ?>">
                            <?= $cate['cate_name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

        </div>

        <div class="row">
            <div class="form-group my-3">
                <label for="">Desciption</label>
                <textarea class="form-control" cols="30" rows="5" name="product_desciption" value="<?= $product_desciption ?? '' ?>"></textarea>
                <span style="color:red">
                    <?= $errors['product_desciption'] ?? '' ?>
                </span>
            </div>
        </div>
        <div class="col mb10 mt-3">
            <input class="btn btn-success text-white" type="submit" name="btn_insert" value="ADD">
            <input class="btn btn-danger text-white" type="reset" value="RESET">
            <a href="index.php?act=products"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>