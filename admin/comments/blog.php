<div class="container">
    <div class="row frmtitle mb-3">
        <h1 class="title">BLOG</h1>
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
                    <th>USERS</th>
                    <th></th>
                </tr>
                <?php

                foreach ($blogs as $blog) {
                    extract($blog);
                    $commentblog = "index.php?act=comments&blog_id=" . $blog_id;
                    echo '
                         <tr>
                         
                         <td>' . $blog_id . '</td>
                         <td>' . $blog_title . '</td>
                         <td>' . $user_id . '</td>
                         <td><a href="' . $commentblog . '"><input type="button" value="Detail"></a></td>
                         </tr>';
                }

                ?>
            </table>
        </div>
        
    </div>
</div>
