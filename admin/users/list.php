<div class="container">
    <div class="row frmtitle mb-3">
        <h1 class="title">USERS</h1>
    </div>
    <div class="row mt frmcontent">
        <div class="row mb10 mt frmdshanghoa text ">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Address</th>
                    <th>Phonenumber</th>
                </tr>
                <?php
                foreach ($users as $user) {
                    extract($user);
                    $hinhpath = "../upload/" . $user_img;
                    if (is_file($hinhpath)) {
                        $user_img = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $user_img = "no photo";
                    }
                    echo '
                         <tr>
                         <td>' . $user_id  . '</td>
                         <td>' . $user_name . '</td>
                         <td>' . $user_email . '</td>
                         <td>' . $user_img . '</td>
                         <td>' . $user_address . '</td>
                         <td>' . $user_phonenumber . '</td>
                         </tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>