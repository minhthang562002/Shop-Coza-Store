<div class="container mt-2">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">ADD BLOG</h1>
        </div>
    </div>
    <form class="" action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group w-50 my-3">
                <label for="">Title</label> <br>
                <input class="form-control" type="text" name="blog_title" value="<?= $blog_title ?? '' ?>">
                <span style="color:red">
                    <?= $errors['blog_title'] ?? '' ?>
                </span>
            </div>
            <div class="form-group w-50 my-3">
                <label for="">Image</label> <br>
                <input class="form-control" type="file" name="blog_img" value="<?= $blog_img ?? '' ?>">
                <span style="color:red">
                    <?= $errors['blog_img'] ?? '' ?>
                </span>
            </div>
           
        </div>

        <div class="row">
            
            <div class="form-group w-50 my-3">
                <label for="">Date</label> <br>
                <input class="form-control" type="date" name="blog_post_date" value="<?= $blog_post_date ?? '' ?>">
                <span style="color:red">
                    <?= $errors['blog_post_date'] ?? '' ?>
                </span>
            </div>
        </div>

        <div class="row">
             <div class="form-group my-3">
                <label for="">Content</label>
                <textarea class="form-control" name="blog_content" id="" cols="30" rows="10"><?= $blog_content ?? '' ?></textarea>
                <!-- <input type="text" name="" value=""> -->
                <span style="color:red">
                    <?= $errors['blog_content'] ?? '' ?>
                </span>
            </div>
        </div>

        <div class="col mb10 mt">
            <input class="btn btn-success text-white" type="submit" name="btn_insert" value="ADD">
            <input class="btn btn-danger text-white" type="reset" value="RESET">
            <a href="index.php?act=blogs"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>