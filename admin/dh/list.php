<style>
    #last{
        background: lightgreen;
    }
</style>
<div class="container">
    <div class="row frmtitle mb-3">
        <h1 class="title">Don Hang</h1>
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

                    <th>Code orders</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phonenumber</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                <?php

                foreach ($dhs as $dh) {
                    extract($dh);
                    $status = "index.php?act=status_update&order_id=$order_id";
                    $detail = "index.php?act=dh_detail&order_id=$order_id";
                    echo '
                         <tr>
                         
                         <td>' . $order_id  . '</td>
                         <td>' . $user_id  . '</td>
                         <td>' . $order_date  . '</td>
                         <td>' . $order_address  . '</td>
                         <td>' . $order_email  . '</td>
                         <td>' . $order_phone  . '</td>
                         <td>' . $order_total  . '$</td>
                         <td>';
                    if ($order_status == 1) {
                        $button_status = "Export";
                        echo "Waiting";
                    } else if ($order_status == 2) {
                        echo "Delivery";
                    } else if ($order_status == 3) {
                        echo "Complete";
                    }
                    echo '</td>
                    <td><a href="' . $detail . '"><input type="button" value="Detail"></a>';
                    if ($order_status == 1) {
                        echo '<a href="' . $status . '"><input id=\'last\' type="button" value=' . $button_status . '></a>';
                    };
                    echo ' </td></tr> ';
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