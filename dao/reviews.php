<?php
require_once 'pdo.php';

function review_create($review_content, $product_id, $user_id)
{
    $sql = 'insert into reviews(review_content, product_id, user_id) values(?,?,?)';
    pdo_execute($sql, $review_content, $product_id, $user_id);
}

// sửa size

// xóa size
function review_delete($review_id)
{
    $sql = 'delete from reviews where review_id=?';
    pdo_execute($sql, $review_id);
}
function review_delete_product($product_id)
{
    $sql = 'delete from reviews where product_id=?';
    pdo_execute($sql, $product_id);
}

// hiển thị d/sách size
function review_select_all()
{
    $sql = 'select * from reviews';
    return pdo_query($sql);
}
// select size theo id
function review_select_by_id($review_id)
{
    $sql = 'select * from reviews where review_id=?';
    return pdo_query_one($sql, $review_id);
}
function review_select_by_product($product_id)
{
    $sql = 'select * from reviews where product_id=? ORDER BY review_id DESC';
    return pdo_query($sql, $product_id);
}
