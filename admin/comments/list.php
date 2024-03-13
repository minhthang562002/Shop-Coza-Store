<div class="container">
    <div class="row frmtitle mb-3">
        <h1 class="title">COMMENTS</h1>
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
                    <th>COMMENT</th>
                    <th>USER</th>

                </tr>
                <?php

                foreach ($comments as $comment) {
                    extract($comment);
                    $delcomment = "index.php?act=delcomment&comment_id=" . $comment_id ."&blog_id=".$blog_id ;
                    echo '
                         <tr>
                         <td>' . $comment_id . '</td>
                         <td>' . $comment_content . '</td>
                         <td>' . $user_id  . '</td>
                         <td><a href="' . $delcomment . '"><input type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>

                         </tr>';
                }

                ?>
            </table>
        </div>

    </div>
</div>