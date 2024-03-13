<div class="container">
    <div class="row frmtitle">
        <h1 class="title">IMAGES</h1>
    </div>
    <div class="my-3 d-flex justify-content-end px-3 ">
        <a href="index.php?act=addimage_product&product_id=<?= $product_id ?>"><input class="btn btn-success p-2 text-white bg-opacity-75 border border-0" type="button" value="ADD IMAGE PRODUCT"></a>
    </div>
    <?php
    if (isset($_GET['thongbao'])) {
        $thongbao = $_GET['thongbao'];
        echo '<script type="text/javascript">

            window.onload = function () { alert("' . $thongbao . '"); }

</script>';
    }
    ?>
    <div class="row mt frmcontent">
        <img src="" alt="">
        <div class="row mb10 mt frmdshanghoa text ">
            <table>
                <tr>
                    <th>ID Image</th>
                    <th>Images</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listimgs as $listimg) {
                    extract($listimg);
                    $hinhpath = "../upload/" . $product_img;
                    if (is_file($hinhpath)) {
                        $product_img = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $product_img = "no photo";
                    }
                    $updateproimg = "index.php?act=updateimg_product&product_img_id=" . $product_img_id . "&product_id=" . $product_id;
                    $delproimg = "index.php?act=delimg_product&product_img_id=" . $product_img_id . "&product_id=" . $product_id;
                    echo '
                         <tr>
                         
                         <td>' . $product_img_id . '</td>
                         <td>' . $product_img . '</td>
                         <td><a href="' . $updateproimg . '"><input type="button" value="Update"></a> <a href="' . $delproimg . '"><input type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>
                         </tr>';
                }


                ?>
            </table>

        </div>
        <!-- <div class="row mb10 text">
            <a href="index.php?act=addimage_product&product_id=<?= $product_id ?>"><input type="button" value="ADD"></a>
        </div> -->
        <script language="javascript">
            function myFunction() {
                alert("Bạn có muốn xóa không?");
            }
        </script>
    </div>
    <?php
?>
</div>
