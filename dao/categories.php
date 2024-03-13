<?php
require_once 'pdo.php';


function category_insert($cate_name, $cate_img)
{
    $sql = "INSERT INTO categories(cate_name,cate_img) VALUES(?,?)";
    pdo_execute($sql, $cate_name, $cate_img);
}

function category_update($cate_id, $cate_name, $cate_img)
{
    $sql = "UPDATE categories SET cate_name=? ,cate_img=? WHERE cate_id=?";
    pdo_execute($sql, $cate_name, $cate_img, $cate_id);
}

function category_delete($cate_id)
{
    $sql = "DELETE FROM categories WHERE cate_id=?";
    pdo_execute($sql, $cate_id);
}

function category_select_all()
{
    $sql = "SELECT * FROM categories";
    return pdo_query($sql);
}

function category_select_by_id($cate_id)
{
    $sql = "SELECT * FROM categories WHERE cate_id=?";
    return pdo_query_one($sql, $cate_id);
}

function category_exist($cate_id)
{
    $sql = "SELECT count(*) FROM categories WHERE cate_id=?";
    return pdo_query_value($sql, $cate_id) > 0;
}
function category_home(){
    $sql = 'SELECT * FROM categories LIMIT 6';
    return pdo_query($sql);
}