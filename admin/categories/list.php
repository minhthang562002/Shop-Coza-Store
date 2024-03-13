<div class="container">
    <div class="row frmtitle">
        <h1 class="title">CATEGORY</h1>
    </div>
    <div class="my-3 d-flex justify-content-end px-3 ">
        <a href="index.php?act=addcategory"><input class="btn btn-success p-2 text-white bg-opacity-75 border border-0" type="button" value="ADD CATEGORY"></a>
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
        <div class="row mb10 mt frmdshanghoa text ">
            <table>
                <tr>

                    <th>ID</th>
                    <th>NAME CATEGORY</th>
                    <th>IMAGE</th>
                    <th></th>
                </tr>
                <?php

                foreach ($listcate as $cate) {
                    extract($cate);
                    $hinhpath = "../upload/" . $cate_img;
                    if (is_file($hinhpath)) {
                        $cate_img = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $cate_img = "no photo";
                    }
                    $updatecate = "index.php?act=updatecategory&cate_id=" . $cate_id;
                    $delcate = "index.php?act=delcategory&cate_id=" . $cate_id;


                    echo '
                         <tr>
                         
                         <td>' . $cate_id . '</td>
                         <td>' . $cate_name . '</td>
                         <td>' . $cate_img . '</td>
                         <td><a href="' . $updatecate . '"><input type="button" value="Update"></a> <a href="' . $delcate . '"><input type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>
                         </tr>';
                }

                ?>
            </table>
        </div>

        <script language="javascript">
            function myFunction() {
                alert("Bạn có muốn xóa không?");
            }
        </script>
    </div>
</div>