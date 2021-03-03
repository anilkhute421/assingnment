<?php
include_once('config.php');
session_start();
if(!isset($_SESSION['username']))
{
    $_SESSION['msg'] = "<label style='color:red;'>Access Denied!!</label>";
    header('Location:login.php');
    exit();
}
if(isset($_GET['Id']))
{
    $id = $_GET['Id'];
    $sqldelete = "DELETE FROM tblsaveitems WHERE Id=$id";
    if($db->query($sqldelete) == true)
    {
        echo "<script>alert('Item Deleted!!!')</script>";
        header('Location:SavedItem.php');
        exit();
    }
    else
    {
        echo "<script>alert('Failed To Delete!!!')</script>";
        header('Location:SavedItem.php');
        exit();
    }
}

?>