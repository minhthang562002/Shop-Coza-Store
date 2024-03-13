<div class="container">
    <div class="row frmtitle mb-3">
        <h1 class="title">CART</h1>
    </div>
    <div class="row mt frmcontent">
        <div class="row mb10 mt frmdshanghoa text ">
            <table>
                <tr>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>TOTAL</th>
                </tr>
                <?php

                foreach ($carts as $cart) {
                    extract($cart);
                    $product = product_detail_select_by_id($product_detail_id);
                    extract($product);
                    $color = color_select_by_id($color_id);
					extract($color);
					$size = size_select_by_id($size_id);
					extract($size);
                    
                    $hinhpath = "../upload/" . $order_detail_img;
                    if (is_file($hinhpath)) {
                        $order_detail_img = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $order_detail_img = "no photo";
                    }

                    echo '
                         <tr>
                         
                         <td>' . $order_detail_name . ' ('.$color_name.','.$size_name.')</td>
                         <td>' . $order_detail_img . '</td>
                         <td>' . $order_detail_price . '$</td>
                         <td>' . $so_luong . '</td>
                         <td>' . $so_luong * $order_detail_price. '$</td>
                         </tr>';
                }

                ?>
            </table>
        </div>
    </div>
</div>