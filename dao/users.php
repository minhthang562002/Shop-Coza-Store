<?php
require_once 'pdo.php';

function user_insert($user_id, $user_name, $user_email, $user_password, $user_img, $user_roll, $user_address, $user_phonenumber)
{
    $sql = "INSERT INTO users(user_id, user_name, user_email, user_password, user_img, user_roll, user_address,user_phonenumber) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
    pdo_execute($sql, $user_id, $user_name, $user_email, $user_password, $user_img, $user_roll == 0, $user_address, $user_phonenumber);
}
function check_user($user_id, $user_password)
{
    $sql = "select * from users where user_id=? && user_password =?";
    return pdo_query_one($sql, $user_id, $user_password);
}
function check_email($user_email)
{
    $sql = "select * from users where user_email=? ";
    return pdo_query_one($sql, $user_email);
}

function user_update($user_id, $user_name, $user_email,$user_img, $user_address, $user_phonenumber)
{
    $sql = "UPDATE users SET user_name=?,user_email=?,user_img=?,user_address=? ,user_phonenumber=? WHERE user_id=?";
    pdo_execute($sql, $user_name, $user_email, $user_img, $user_address, $user_phonenumber, $user_id);
}

function user_delete($user_id)
{
    $sql = "DELETE FROM users  WHERE user_id=?";

    pdo_execute($sql, $user_id);
}

function user_select_all()
{
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}

function user_select_by_id($user_id)
{
    $sql = "SELECT * FROM users WHERE user_id=?";
    return pdo_query_one($sql, $user_id);
}

function user_exist($user_id)
{
    $sql = "SELECT count(*) FROM users WHERE $user_id=?";
    return pdo_query_value($sql, $user_id) > 0;
}

function user_select_by_role($user_roll)
{
    $sql = "SELECT * FROM users WHERE user_roll=?";
    return pdo_query($sql, $user_roll);
}
function user_select_keyword($keyword)
{
    $sql = "SELECT * FROM users WHERE user_name LIKE ? OR user_id = ?";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}

function user_change_password($user_id, $mat_khau_moi)
{
    $sql = "UPDATE users SET user_password=? WHERE user_id=?";
    pdo_execute($sql, $mat_khau_moi, $user_id);
}
