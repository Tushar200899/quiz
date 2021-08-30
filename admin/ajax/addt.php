<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("teacher",$_POST['token']))
{
    $name = $_POST['name'];

    $query = $db->prepare('SELECT * FROM teacher where id=?');
    $data=array($name);
    $execute=$query->execute($data);
    if($query->rowcount()>0)
    {
        echo"teacher already added";
    }
    else{
        $query = $db->prepare('INSERT INTO teacher(name) VALUES(?)');
        $data=array($name);
        $execute=$query->execute($data);
        if($execute)
        {
            echo"teacher added successfully";
        }
        else{
            echo"wrong input";
        }
    }
}
?>