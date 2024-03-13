<?php
    require_once "pdo.php";

    // thêm color
    function color_create($color_name){
        $sql = "insert into color(color_name) values(?)";
        pdo_execute($sql,$color_name);
    }

    // sửa color
    function color_edit($color_name,$color_id){
        $sql = 'update color set color_name=? where color_id=?';
        pdo_execute($sql,$color_name,$color_id);
    }

    // xóa color
    function color_delete($color_id){
        $sql = 'delete from color where color_id=?';
        pdo_execute($sql,$color_id);
    }

    // hiển thị d/sách color
    function color_select_all(){
        $sql = 'select * from color';
        return pdo_query($sql);
    }
    // select color theo id
    function color_select_by_id($color_id){
        $sql = 'select * from color where color_id=?';
        return pdo_query_one($sql, $color_id);
    }

?>