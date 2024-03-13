
<div class="container">
    <div class="row frmtitle">
        <h1 class="title">SIZES</h1>
    </div>
    <div class="my-3 d-flex justify-content-end px-3 ">
        <a href="index.php?act=sizes_btn_add"><input class="btn btn-success p-2 text-white bg-opacity-75 border border-0" type="button" value="ADD SIZE"></a>
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
                    <th>NAME SIZE</th>
                    <th></th>
                </tr>
                <?php

                foreach ($sizes as $size) {
                    extract($size);
                    $updatepro = "index.php?act=sizes_btn_edit&size_id=" . $size_id;
                    $delpro = "index.php?act=sizes_btn_delete&size_id=" . $size_id;
                    

                    echo '
                         <tr>
                         
                         <td>' . $size_id . '</td>
                         <td>' . $size_name . '</td>
                         <td><a href="' . $updatepro . '"><input type="button" value="Update"></a> <a href="' . $delpro . '"><input type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>
                         </tr>';
                }

                ?>
            </table>
        </div>
        <!-- <div class="row mb10 text">
            <a href="index.php?act=sizes_btn_add"><input type="button" value="ADD"></a>
        </div> -->
        <script language="javascript">
            function myFunction() {
                alert("Bạn có muốn xóa không?");
            }
        </script>
    </div>
</div>