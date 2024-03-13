<?php
require_once 'pdo.php';

function comment_create($comment_content, $user_id, $blog_id)
{
    $sql = 'insert into comments(comment_content, user_id , blog_id) values(?,?,?)';
    pdo_execute($sql, $comment_content, $user_id, $blog_id);
}

function comment_delete($comment_id)
{
    $sql = 'delete from comments where comment_id=?';
    pdo_execute($sql, $comment_id);
}
function comment_delete_blog($blog_id)
{
    $sql = 'delete from comments where blog_id=?';
    pdo_execute($sql, $blog_id);
}

function comment_select_all()
{
    $sql = 'select * from comments';
    return pdo_query($sql);
}

function comment_select_by_id($comment_id)
{
    $sql = 'select * from comments where comment_id=?';
    return pdo_query_one($sql, $comment_id);
}
function comment_select_by_blog($blog_id)
{
    $sql = 'select * from comments where blog_id=?';
    return pdo_query($sql, $blog_id);
}
function comment_exist($blog_id)
{
    $sql = "SELECT count(*) FROM comments WHERE blog_id=?";
    return pdo_query_value($sql, $blog_id) > 0;
}
