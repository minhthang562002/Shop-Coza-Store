<div class="container">
    <div class="row frmtitle mb-3">
        <h1 class="title">REVIEWS</h1>
    </div>
    <?php
    if (isset($_GET['thongbao'])) {
        $thongbao = $_GET['thongbao'];
        echo '<script type="text/javascript">

            window.onload = function () { alert("' . $thongbao . '"); }

</script>';
    }
    ?>
    <!-- <script language="javascript">
            function confirmation() {
                var result = confirm("Are you sure to delete?");
                if (result) {
                    $delpro = "index.php?act=delpro&product_id=" . $product_id;
                }
            }
        </script> -->
    <div class="row mt frmcontent">
        <div class="row mb10 mt frmdshanghoa text ">
            <table>
                <tr>

                    <th>ID</th>
                    <th>REVIEW</th>
                    <th>USER</th>
                    <th></th>
                </tr>
                <?php
                foreach ($reviews as $review) {
                    extract($review);
                    $delreview = "index.php?act=delreview&review_id=" . $review_id ."&product_id=".$product_id;
                    echo '
                         <tr>
                         <td>' . $review_id  . '</td>
                         <td>' . $review_content . '</td>
                         <td>' . $user_id  . '</td>
                         <td><a href="' . $delreview . '"><input type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>
                         </tr>';
                }
                ?>

            </table>
        </div>
    </div>
</div>