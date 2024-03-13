<?php
require_once 'pdo.php';
function orders_insert($order_id,$user_id,$order_date,$order_status,$order_address,$order_email,$order_phone,$payment_id,$order_total)
{
    $sql = "INSERT INTO orders ( order_id,user_id,order_date, order_status, order_address, order_email, order_phone, payment_id, order_total) VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$order_id,$user_id,$order_date,$order_status,$order_address,$order_email,$order_phone,$payment_id,$order_total	);
}
function orders_select($order_id)
{
    $sql = "SELECT * FROM orders WHERE order_id=?";
    return pdo_query_one($sql, $order_id);
}

function cart_insert($order_id, $order_detail_name, $order_detail_price, $order_detail_img, $product_detail_id,$so_luong)
{
    $sql = "INSERT INTO order_detail ( order_id, order_detail_name, order_detail_price, order_detail_img, product_detail_id,so_luong) VALUES ( ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql,$order_id, $order_detail_name, $order_detail_price, $order_detail_img, $product_detail_id,$so_luong);
}
function cart_select_all()
{
    $sql = 'select * from order_detail';
    return pdo_query($sql);
}
function cart_select_by_order_id($order_id)
{
    $sql = "select * from order_detail WHERE order_id=? ";
    return pdo_query($sql,$order_id);
}
function cart_edit($order_detail_id,$so_luong){
    $sql = 'update order_detail set so_luong=? where order_detail_id=?';
    pdo_execute($sql,$so_luong,$order_detail_id);
}
function cart_select_by_id($product_detail_id)
{
    $sql = "SELECT * FROM order_detail WHERE product_detail_id=?";
    return pdo_query_one($sql, $product_detail_id);
}
function cart_edit_sl($order_detail_id,$so_luong){
    $sql = 'update order_detail set so_luong=? where order_detail_id=?';
    pdo_execute($sql,$so_luong,$order_detail_id);
}
function cart_edit_id($order_detail_id,$so_luong){
    $sql = 'update order_detail set so_luong=? where order_detail_id=?';
    pdo_execute($sql,$so_luong,$order_detail_id);
}
function cart_delete($order_detail_id){
    $sql = 'delete from order_detail where order_detail_id=?';
    pdo_execute($sql,$order_detail_id);
}
function pay_select_all()
{
    $sql = 'select * from payments';
    return pdo_query($sql);
}
function dh_select_all_user($user_id)
{
    $sql = 'select * from orders where user_id = ?';
    return pdo_query($sql,$user_id);
}
function dh_select_all()
{
    $sql = 'select * from orders ORDER BY order_date DESC';
    return pdo_query($sql);
}
function dh_select_all_order_id($order_id)
{
    $sql = 'select * from orders where order_id = ?';
    return pdo_query($sql,$order_id);
}
function dh_edit_order_id($order_status,$order_id){
    $sql = 'update orders set order_status=? where order_id=?';
    pdo_execute($sql,$order_status,$order_id);
}