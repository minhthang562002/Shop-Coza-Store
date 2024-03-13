<div class="container">
    <div class="row frmtitle mb-3">
        <h1 class="title">CONTACT</h1>
    </div>
    <div class="row mt frmcontent">
        <div class="row mb10 mt frmdshanghoa text">
            <table>
                <tr>
                    <th>ID</th>
                    <th>EMAIL</th>
                    <th>CONTACT</th>
                </tr>
                <?php
                foreach ($contacts as $contact) {
                    extract($contact);
                    echo '
                         <tr>
                         <td>' . $contact_id  . '</td>
                         <td>' . $contact_email . '</td>
                         <td>' . $contact_content . '</td>
                         </tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>