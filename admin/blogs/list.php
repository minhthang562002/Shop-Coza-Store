<div class="container">
    <div class="row frmtitle mb-3">
        <div class="">
            <h1 class="title">BLOGS</h1>
        </div>
    </div>
    <div class="my-3 d-flex justify-content-end px-3 ">
        <a href="index.php?act=add_blog"><input class="btn btn-success p-2 text-white bg-opacity-75 border border-0" type="button" value="ADD BLOGS"></a>
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
                    <th>TITLE</th>
                    <th>CONTENT</th>
                    <th>IMAGE</th>
                    <th>DATE</th>
                    <th>USER</th>
                    <th></th>
                </tr>
                <?php

                foreach ($blogs as $blog) {
                    extract($blog);
                    $hinhpath = "../upload/" . $blog_img;
                    if (is_file($hinhpath)) {
                        $blog_img = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $blog_img = "no photo";
                    }
                    $updateblog = "index.php?act=updateblog&blog_id=" . $blog_id;
                    $delblog = "index.php?act=delblog&blog_id=" . $blog_id;


                    echo '
                         <tr>
                         
                         <td>' . $blog_id . '</td>
                         <td>' . $blog_title . '</td>
                         <td style=\'text-align: justify;\'>' . $blog_content . '</td>
                         <td>' . $blog_img . '</td>
                         <td>' . $blog_post_date . '</td>
                         <td>' . $user_id . '</td>
                         <td><a href="' . $updateblog . '"><input type="button" value="Update"></a> <a href="' . $delblog . '"><input type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>
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