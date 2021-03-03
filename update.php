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
    $sqlItem = "SELECT * FROM tblsaveitems WHERE Id=$id";
    $queryItem = mysqli_query($db,$sqlItem);
    $rowItem=mysqli_fetch_array($queryItem);

    if($_POST['update'])
    {
        $itemname = $_POST['itemname'];
        $itemquantity = $_POST['itemquantity'];
        $status = $_POST['status'];
        $itemdate = $_POST['itemdate'];

        $sqlupdate = "UPDATE tblsaveitems SET Item='$itemname',Quantity='$itemquantity',Status='$status' WHERE Id=$id";
        if($db->query($sqlupdate) == true)
        {
            header('Location:SavedItem.php');
            exit();
        }
        else
        {
            $msg = "<label style='color:red'>Oops!! Failed to Add Item. Error-> </label>".mysqli_error($db);
        }
    }
}

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Update List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Update Grocery List</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Item name</label>
                    <input type="text" name="itemname" class="form-control" placeholder="Item name" value="<?=$rowItem['Item']?>"/>
                </div>
                <div class="form-group">
                    <label>Item quantity</label>
                    <input type="text" name="itemquantity" class="form-control" placeholder="Item quantity" value="<?=$rowItem['Quantity']?>"/>
                </div>
                <div class="form-group">
                    <label>Item status</label>
                    <select name="status" class="form-control">
                        <option value="PENDING" <?php if(isset($rowItem['Status']) && $rowItem['Status'] != '') {echo ($rowItem['Status'] == "PENDING") ? 'selected' : '';}?>>PENDING</option>
                        <option value="BOUGHT" <?php if(isset($rowItem['Status']) && $rowItem['Status'] != '') {echo ($rowItem['Status'] == "BOUGHT") ? 'selected' : '';}?>>BOUGHT</option>
                        <option value="NOT AVAILABLE" <?php if(isset($rowItem['Status']) && $rowItem['Status'] != '') {echo ($rowItem['Status'] == "NOT AVAILABLE") ? 'selected' : '';}?>>NOT AVAILABLE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="itemdate" class="form-control" placeholder="Date" value="<?=$rowItem['AddedDate']?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="update" value="Update" class="btn btn-danger">
                </div>
            </form>
        </div>
    </body> 
</html>
