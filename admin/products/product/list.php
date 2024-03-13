<div class="container">
    <div class="row frmtitle">
        <h1 class="title">PRODUCTS</h1>
    </div>
    <div class=" my-3 d-flex justify-content-end px-3">
        <form action="" method="post">
            
        </form>

        <div class="mx-2">
            <a href="index.php?act=addproduct">
                <input class="btn btn-success p-2 text-white bg-opacity-75 border border-0" type="button" value="ADD PRODUCT">
            </a>
        </div>
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
                    <th>IMAGE</th>
                    <th>SALE</th>
                    <th>DATE</th>
                    <th>DESCRIPTION</th>
                    <th></th>
                </tr>
                <?php

                foreach ($products as $product) {
                    extract($product);
                    foreach ($colors as $color) {
                        extract($color);
                        foreach ($sizes as $size) {
                            extract($size);
                            product_detail_insert($product_id, $color_id, $size_id);
                        }
                    }
                    $hinhpath = "../upload/" . $product_img;
                    if (is_file($hinhpath)) {
                        $product_img = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $product_img = "no photo";
                    }
                    $updatepro = "index.php?act=updatepro&product_id=" . $product_id;
                    $delpro = "index.php?act=delpro&product_id=" . $product_id;
                    echo '
                         <tr>
                         
                         <td>' . $product_id . '</td>
                         <td>' . $product_name . '</td>
                         <td>' . $product_price . '</td>
                         <td>' . $product_img . '</td>
                         <td>' . $product_sale . '%</td>
                         <td>' . $product_posting_date . '</td>
                         <td>' . $product_desciption . '</td>
                         <td><a href="' . $updatepro . '"><input type="button" value="Update"></a> <a href="' . $delpro . '"><input type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>
                         </tr>';
                }

                ?>
            </table>
        </div>
        <!-- <div class="row mb10 text">
            <a href="index.php?act=addproduct"><input type="button" value="ADD"></a>
        </div> -->

    </div>
</div>