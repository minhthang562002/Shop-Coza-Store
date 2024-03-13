<?php
$hinhpath = "../upload/" . $user_img;
if (!is_file($hinhpath)) {
    $user_img = "no photo";
}
?>
<div class="container">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">USER</h1>
        </div>
    </div>

    <form action="index.php?act=updateuser" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Name</label>
                <input class="form-control" type="text" name="user_name" value="<?= $user_name ?? '' ?>">
                <span style="color:red">
                    <?= $errors['user_name'] ?? '' ?>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Email</label>
                <input class="form-control" type="text" name="user_email" value="<?= $user_email ?? '' ?>">
                <span style="color:red">
                    <?= $errors['user_email'] ?? '' ?>
                </span>
            </div>
            <div class="w-50 form-group my-3">
                <label for="">Address</label>
                <input class="form-control" type="text" name="user_address" value="<?= $user_address ?? '' ?>">
                <span style="color:red">
                    <?= $errors['user_address'] ?? '' ?>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="w-50 form-group my-3 col">
                <label for="">Image</label> <br>
                <input class="form-control " type="file" name="user_img">
                <input type="hidden" name="user_img" value="<?= $user_img ?? '' ?>">
                <div class="w-25 mt-3">
                    <img src="<?= $hinhpath ?? '' ?>" height='80'>
                </div>

                <span style="color:red">
                    <?= $errors['user_img'] ?? '' ?>
                </span>
            </div>
            <div class="w-50 form-group my-3">
                <label for="">Phonenumber</label>
                <input class="form-control" type="number" name="user_phonenumber" value="<?= $user_phonenumber ?? '' ?>">
                <span style="color:red">
                    <?= $errors['user_phonenumber'] ?? '' ?>
                </span>
            </div>
        </div>
        <div class="col mb10 mt">
            <input type="hidden" name="user_id" value="<?php if (isset($user_id) && ($user_id > 0)) echo $user_id; ?>">
            <input class="btn btn-success text-white" type="submit" name="update" value="UPDATE">
            <input class="btn btn-danger text-white" type="reset" value="RESET">
        </div>
    </form>
</div>