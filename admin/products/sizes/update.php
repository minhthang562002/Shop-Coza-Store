<div class="container mt-2">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">UPDATE SIZE</h1>
        </div>
    </div>
    <form onsubmit="return mySubmit()" action="" method="post">
        <div class="w-50 form-group my-3">
            <label for="">Name size</label> <br>
            <input class="form-control" type="text" name="size_name" value="<?= $size_name ?? '' ?>"> <br>
            <span id="tb" style="color:red">
                <?= $errors['size_name'] ?? '' ?>
            </span>
        </div>
        <div class="col mb10 mt">
            <input class="btn btn-danger text-white" type="submit" name="btn_update" value="UPDATE">
            <input class="btn btn-success text-white" type="reset" value="RESET">
            <input type="hidden" name="size_id" value="<?= $size_id ?? '' ?>">
            <a href="index.php?act=sizes_btn_list"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>
<script>
    function mySubmit() {
        let input = document.querySelector('input');
        if (input.value.length == 0) {
            input.focus();
            document.getElementById('tb').innerHTML = 'Tên màu không được bỏ trống, mời nhập';
            return false;
        }
        return true;
    }
</script>