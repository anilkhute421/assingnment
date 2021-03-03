<?php
include_once('config.php');
session_start();
if(!isset($_SESSION['username']))
{
	$_SESSION['msg'] = "<label style='color:red;'>Access Denied!!</label>";
	header('Location:login.php');
    exit();
}
$sqlItem = "SELECT * FROM tblsaveitems WHERE UserId=".$_SESSION['Id'];
$queryItem = mysqli_query($db,$sqlItem);
if(isset($_POST['filter']))
{
    $datevalue = $_POST['datevalue'];
    $sqlItem = "SELECT * FROM tblsaveitems WHERE UserId=".$_SESSION['Id']." AND AddedDate='$datevalue'";
    $queryItem = mysqli_query($db,$sqlItem);
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View Grocery List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <div class="row float-right">
                <div class="col-lg-4">
                    User: <a href="#"><?=$_SESSION['username']?></a>
                </div>
                <div class="col-lg-4">
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
            <!-- top -->
            <div class="row">
                <div class="col-lg-6">
                    <h1>View Grocery List</h1>
                    <div class="col-lg-4">
                        <a href="add.php">Add Item</a>
                    </div>
                </div>
                <form action="" method="POST">
                <div class="col-lg-6 float-right">
                    <div class="row">
                        
                        <div class="col-lg-13">
                            <!-- Date Filtering-->
                            <input type="date" name="datevalue" class="form-control">
                        </div>
                        <div class="col-lg-0">
                            <input type="submit" name="filter" class="btn btn-danger" value="filter">
                        </div>
                        

                    </div>

                </div>
                </form>
            </div>
            <!-- // top -->
            <!-- Grocery Cards -->
            <div class="row mt-4">
                <!--- -->
                <!-- Loop This -->
                <?php
                while($rowItem=mysqli_fetch_array($queryItem)) 
                {
                ?>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"><?=$rowItem['Item']?></h5>
                          <h6 class="card-subtitle mb-2 text-muted"><?=$rowItem['Quantity']?></h6>
                          <p class=<?php if($rowItem['Status'] == 'PENDING') { echo "text-info";} else if($rowItem['Status'] == 'NOT AVAILABLE') { echo "text-danger"; }else { echo "text-success";} ?>><?=$rowItem['Status']?></p>
                          <a href="update.php?Id=<?=$rowItem['Id']?>">Update</a>&nbsp;&nbsp;&nbsp;
                          <a href="delete.php?Id=<?=$rowItem['Id']?>">Delete</a>
                        </div>
                      </div>
                </div>
                <?php
                }
                ?>
                <!-- // Loop -->
            </div>
        </div>
    </body>
</html>