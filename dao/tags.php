<?php
require_once 'pdo.php';


function tag_insert($tag_name)
{
    $sql = "INSERT INTO tags(tag_name) VALUES(?)";
    pdo_execute($sql, $tag_name);
}

function tag_update($tag_id,$tag_name )
{
    $sql = "UPDATE tags SET tag_name=? WHERE tag_id=?";
    pdo_execute($sql, $tag_name, $tag_id);
}

function tag_delete($tag_id)
{
    $sql = "DELETE FROM tags WHERE tag_id=?";
    pdo_execute($sql, $tag_id);
}

function tag_select_all()
{
    $sql = "SELECT * FROM tags";
    return pdo_query($sql);
}

function tag_select_by_id($tag_id)
{
    $sql = "SELECT * FROM tags WHERE tag_id=?";
    return pdo_query_one($sql, $tag_id);
}

function tag_exist($tag_id)
{
    $sql = "SELECT count(*) FROM tags WHERE tag_id=?";
    return pdo_query_value($sql, $tag_id) > 0;
}