<div class="container mt-2">
<div class="row frmtitle">
        <div class="">
            <h1 class="title">ADD NEW TAG</h1>
        </div>
    </div>
    <form action="" method="post">
        <div class="w-50 form-group my-3">
            <label for="">Name tag</label> <br>
            <input class="form-control" type="text" name="tag_name" value="<?= $tag_name ?? '' ?>">
            <span style="color:red">
                    <?= $errors['tag_name'] ?? '' ?>
                </span>
        </div>    
        <div class="col mb10 mt">
            <input class="btn btn-success text-white" type="submit" name="btn_insert" value="ADD">
            <input class="btn btn-danger text-white" type="reset" value="RESET">
            <a href="index.php?act=tags_btn_list"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>