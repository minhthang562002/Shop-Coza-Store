<div class="container mt-2">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">ADD NEW COLOR</h1>
        </div>
    </div>
    <form action="" method="post">
        
        <div class="w-50 form-group my-3">
            <label for="">Name color</label> <br>
            <input class="form-control" type="text" name="color_name" value="<?= $color_name ?? '' ?>">
            <span style="color:red">
                <?= $errors['color_name'] ?? '' ?>
            </span>
        </div>
        <div class="col mb10 mt">
            <input class="btn btn-success text-white" type="submit" name="btn_insert" value="ADD">
            <input class="btn btn-danger text-white" type="reset" value="RESET">
            <a href="index.php?act=color_list"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>