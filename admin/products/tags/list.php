
<div class="container">
    <div class="row frmtitle">
        <h1 class="title">TAGS</h1>
    </div>
    <div class="my-3 d-flex justify-content-end px-3 ">
        <a href="index.php?act=tags_btn_add"><input class="btn btn-success p-2 text-white bg-opacity-75 border border-0" type="button" value="ADD TAG"></a>
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
                    <th>NAME TAG</th>
                    <th></th>
                </tr>
                
                <?php foreach($tags as $tag) : ?>
                    <?php extract($tag); ?>
                    <tr>
                        <td><?= $tag_id ?></td>
                        <td><?= $tag_name ?></td>
                        <td>
                        <a href="index.php?act=tags_btn_edit&tag_id=<?= $tag_id ?>"><input type="button" value="Update"></a> 
                        <a href="index.php?act=tags_btn_delete&tag_id=<?= $tag_id ?>"><input type="button" onclick="return confirm('Do you want delete?')" value="Delete"></a>
                        </td>
                    </tr>

                <?php endforeach ?>
            </table>
        </div>
        <!-- <div class="row mb10 text">
            <a href="index.php?act=tags_btn_add"><input type="button" value="ADD"></a>
        </div> -->
        <script language="javascript">
            function myFunction() {
                alert("Bạn có muốn xóa không?");
            }
        </script>
    </div>
</div>