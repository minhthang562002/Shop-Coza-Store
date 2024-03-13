<?php
require_once 'pdo.php';

function productimage_insert($product_img,$product_id)
{
    $sql = "INSERT INTO product_img(product_img, product_id) VALUES(?,?)";
    pdo_execute($sql, $product_img, $product_id);
}

function productimage_update($product_img_id,$product_img,$product_id )
{
    $sql = "UPDATE product_img SET product_img=?, product_id=? WHERE product_img_id=?";
    pdo_execute($sql ,$product_img,$product_id,$product_img_id); // đặt sai vị trí giá trị biến truyền vào
}

function productimage_delete ($product_img_id)
{
    $sql = "DELETE FROM product_img WHERE product_img_id=?";
    pdo_execute($sql, $product_img_id);
}
function productimage_delete_product ($product_id)
{
    $sql = "DELETE FROM product_img WHERE product_id=?";
    pdo_execute($sql, $product_id);
}

function productimage_select_all()
{
    $sql = "SELECT * FROM product_img";
    return pdo_query($sql);
}


function productimage_select_by_id($product_img_id)
{
    $sql = "SELECT * FROM product_img WHERE product_img_id=?";
    return pdo_query_one($sql, $product_img_id);
}

function productimage_exist($product_img_id)
{
    $sql = "SELECT count(*) FROM product_img WHERE product_img_id=?";
    return pdo_query_value($sql, $product_img_id) > 0;
}

function productimage_select_by_pro($product_id)
{
    $sql = "SELECT * FROM product_img WHERE product_id = ?";
    return pdo_query($sql, $product_id);
}

function productimage_select_by_pro_limit1($product_id)
{
    $sql = "SELECT product_img FROM product_img WHERE product_id = ? LIMIT 1";
    return pdo_query_one($sql, $product_id);
}
?>