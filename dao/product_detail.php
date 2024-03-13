<?php
require_once 'pdo.php';

function product_detail_insert( $product_id, $color_id, $size_id)
{
    $sql = "INSERT INTO product_detail(product_id, color_id, size_id) VALUES (?,?,?)";
    pdo_execute($sql, $product_id, $color_id, $size_id);
}
function product_detail_delete($product_id)
{
    $sql = "DELETE FROM product_detail WHERE  product_id=?";
    pdo_execute($sql, $product_id);
}

function product_detail_select_all()
{
    $sql = "SELECT * FROM product_detail";
    // // if($kyw!=""){
    // //     $sql.=" and product_name like '%".$kyw."%'";
    // // }
    // // if($ma_loai>0){
    // //     $sql.=" and cate_id ='".$cate_id."'";
    // // }
    // $sql.=" order by product_id desc";
    return pdo_query($sql);
}

function product_detail_select_by_id($product_detail_id)
{
    $sql = "SELECT * FROM product_detail WHERE product_detail_id=?";
    return pdo_query_one($sql, $product_detail_id);
}

function product_detail_select_by_size_color($color_id, $size_id,$product_id)
{
    $sql = "SELECT * FROM product_detail WHERE color_id=? and size_id=? and product_id=?";
    return pdo_query_one($sql, $color_id, $size_id,$product_id);
}

function product_detail_exist($product_detail_id)
{
    $sql = "SELECT count(*) FROM product_detail WHERE product_detail_id=?";
    return pdo_query_value($sql, $product_detail_id) > 0;
}
