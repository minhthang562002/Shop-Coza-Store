<?php
require_once 'pdo.php';

function contact_create($contact_email,$contact_content)
{
    $sql = 'insert into contact(contact_email,contact_content) values(?,?)';
    pdo_execute($sql, $contact_email,$contact_content);
}

function contact_delete($contact_id)
{
    $sql = 'delete from contact where contact_id=?';
    pdo_execute($sql, $contact_id);
}


function contact_select_all()
{
    $sql = 'select * from contact';
    return pdo_query($sql);
}

function contact_select_by_id($contact_id)
{
    $sql = 'select * from contact where contact_id=?';
    return pdo_query_one($sql, $contact_id);
}
