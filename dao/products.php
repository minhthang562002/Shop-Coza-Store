<?php
require_once 'pdo.php';

function products_insert($product_name, $product_price, $product_img, $product_sale, $product_posting_date, $tag_id, $cate_id, $product_desciption)
{
    $sql = "INSERT INTO products(product_name, product_price,product_img, product_sale, product_posting_date, tag_id, cate_id, product_desciption) VALUES (?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $product_name, $product_price, $product_img, $product_sale, $product_posting_date, $tag_id, $cate_id, $product_desciption);
}

function products_update($product_id, $product_name, $product_price, $product_img, $product_sale, $product_posting_date, $tag_id, $cate_id, $product_desciption)
{
    $sql = "UPDATE products SET product_name=?,product_price=?,product_img=?,product_sale=?,product_posting_date=?,tag_id=?,cate_id=?,product_desciption=? WHERE product_id=?";
    pdo_execute($sql, $product_name, $product_price, $product_img, $product_sale, $product_posting_date, $tag_id, $cate_id, $product_desciption,$product_id);
}

function products_delete($product_id)
{
    $sql = "DELETE FROM products WHERE  product_id=?";
    if (is_array($product_id)) {
        foreach ($product_id as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute($sql, $product_id);
    }
}

function products_select_all()
{
    $sql = "SELECT * FROM products ORDER BY product_id DESC";
    return pdo_query($sql);
}

function products_select_by_id($product_id)
{
    $sql = "SELECT * FROM products WHERE product_id=?";
    return pdo_query_one($sql, $product_id);
}

function products_exist($product_id)
{
    $sql = "SELECT count(*) FROM products WHERE product_id=?";
    return pdo_query_value($sql, $product_id) > 0;
}

function products_select_by_cate($cate_id)
{
    $sql = "SELECT * FROM products WHERE cate_id = ?";
    return pdo_query($sql, $cate_id);
}

function products_select_cung_loai($cate_id, $product_id)
{
    $sql = "SELECT * FROM products WHERE cate_id = ? and product_id <> ?";
    return pdo_query($sql, $cate_id, $product_id);
}

function products_select_keyword($keyword)
{
    $sql = "SELECT * FROM products hh "
        . " JOIN categories lo ON lo.cate_id=hh.cate_id "
        . " WHERE product_name LIKE ? OR cate_name LIKE ?";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}

function show_products_home()
{
    $sql = "SELECT * FROM products ORDER BY product_id LIMIT 8";

    return pdo_query($sql);
}
function show_products_all($first, $second)
{

    $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT $first,$second";

    return pdo_query($sql);
}
function product_img_select_all_by_id($pro_id)
{
    $sql = "SELECT * FROM product_img WHERE product_id=?";
    return pdo_query($sql, $pro_id);
}

function show_products_all_cate($cate_id, $first, $second)
{
    $sql = "SELECT * FROM products WHERE cate_id=? ORDER BY product_id LIMIT $first,$second";
    return pdo_query($sql, $cate_id);
}

function products_select_by_tag($tag_id)
{
    $sql = "SELECT * FROM products WHERE tag_id=?";
    return pdo_query($sql, $tag_id);
}


