<?php
include_once('config.php');
session_start();
if(!isset($_SESSION['username']))
{
    $_SESSION['msg'] = "<label style='color:red;'>Access Denied!!</label>";
    header('Location:login.php');
    exit();
}
if (isset($_POST['Add'])) 
{
    $UserId = $_SESSION['Id'];
    $itemname = $_POST['itemname'];
    $itemquantity = $_POST['itemquantity'];
    $status = $_POST['status'];
    $itemdate = $_POST['itemdate'];

    $sqlinsert = "INSERT INTO tblsaveitems(UserId, Item, Quantity, Status, AddedDate) VALUES ($UserId,'$itemname','$itemquantity','$status','$itemdate')";
    if($db->query($sqlinsert) == true)
    {
        header('Location:SavedItem.php');
        exit();
    }
    else
    {
        $msg = "<label style='color:red'>Oops!! Failed to Add Item. Error-> </label>".mysqli_error($db);
    }
}
?>



<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Add List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Add Grocery List</h1>
            <?php
            echo $msg;
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Item name</label>
                    <input type="text" name="itemname" class="form-control" placeholder="Item name"/>
                </div>
                <div class="form-group">
                    <label>Item quantity</label>
                    <input type="text" name="itemquantity" class="form-control" placeholder="Item quantity"/>
                </div>
                <div class="form-group">
                    <label>Item status</label>
                    <select name="status" class="form-control">
                        <option value="PENDING">PENDING</option>
                        <option value="BOUGHT">BOUGHT</option>
                        <option value="NOT AVAILABLE">NOT AVAILABLE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="itemdate" class="form-control" placeholder="Date">
                </div>
                <div class="form-group">
                    <input type="submit" name="Add" value="Add" class="btn btn-danger">
                </div>
            </form>
        </div>
    </body> 
</html>
