<div class="container">
    <div class="row frmtitle mb-3">
        <h1 class="title">REVIEW PRODUCTS</h1>
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
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>SALE</th>
                    <th>DATE</th>
                    <th>DESCRIPTION</th>
                    <th></th>
                </tr>
                <?php

                foreach ($products as $product) {
                    extract($product);
                    $reviews = "index.php?act=reviews&product_id=" . $product_id;
                    echo '
                         <tr>
                         
                         <td>' . $product_id . '</td>
                         <td>' . $product_name . '</td>
                         <td>' . $product_price . '</td>
                         <td>' . $product_sale . '%</td>
                         <td>' . $product_posting_date . '</td>
                         <td>' . $product_desciption . '</td>
                         <td><a href="' . $reviews . '"><input type="button"value="Detail"></a></td>
                         </tr>';
                }

                ?>
            </table>
        </div>
    </div>
</div>
