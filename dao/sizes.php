<?php
require_once 'pdo.php';
// thêm size 
function size_create($size_name){
    $sql = 'insert into size(size_name) values(?)';
    pdo_execute($sql,$size_name);
}

// sửa size
function size_edit($size_name,$size_id){
    $sql = 'update size set size_name=? where size_id=?';
    pdo_execute($sql,$size_name,$size_id);
}

// xóa size
function size_delete($size_id){
    $sql = 'delete from size where size_id=?';
    pdo_execute($sql,$size_id);
}

// hiển thị d/sách size
function size_select_all(){
    $sql = 'select * from size';
    return pdo_query($sql);
}
// select size theo id
function size_select_by_id($size_id){
    $sql = 'select * from size where size_id=?';
    return pdo_query_one($sql,$size_id);
}
