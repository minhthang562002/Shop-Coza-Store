<?php
require_once 'pdo.php';


function blog_insert($blog_title, $blog_content,$blog_img,$blog_post_date,$user_id)
{
    $sql = "INSERT INTO blogs(blog_title, blog_content,blog_img,blog_post_date,user_id) VALUES(?,?,?,?,?)";
    pdo_execute($sql, $blog_title, $blog_content,$blog_img,$blog_post_date,$user_id);
}

function blog_update($blog_id,$blog_title, $blog_content,$blog_img,$blog_post_date,$user_id)
{
    $sql = "UPDATE blogs SET blog_title=?, blog_content=?,blog_img=?,blog_post_date=?,user_id=? WHERE blog_id=?";
    pdo_execute($sql, $blog_title, $blog_content,$blog_img,$blog_post_date,$user_id,$blog_id);
}

function blog_delete($blog_id)
{
    $sql = "DELETE FROM blogs WHERE blog_id=?";
    pdo_execute($sql, $blog_id);
}

function blog_select_all()
{
    $sql = "SELECT * FROM blogs";
    return pdo_query($sql);
}

function blog_select_by_id($blog_id)
{
    $sql = "SELECT * FROM blogs WHERE blog_id=?";
    return pdo_query_one($sql, $blog_id);
}

function blog_exist($blog_id)
{
    $sql = "SELECT count(*) FROM blogs WHERE blog_id=?";
    return pdo_query_value($sql, $blog_id) > 0;
}
