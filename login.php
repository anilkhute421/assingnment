<?php
include('config.php');
session_start();  
$UserName = $_POST['Username'];
$Pass = $_POST['pass'];

$msg = "";

if(isset($_POST['login']))
{
    $sql = "SELECT * FROM tblusers WHERE Username = '$UserName' AND Password = '$Pass'";
    //echo($sql);
    $query = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($query);
    $_SESSION['username'] = $UserName;
    $_SESSION['Id'] = $row['Id'];
//  print_r($row);
//  echo("</br>Usertype - " .$UserType. "</br>");
    if(isset($row))
    {
        header('Location:SavedItem.php');
        exit();
    }
    else
    {
        $msg = "<label style='color:red'>Please Check Username and Password!!</label> ";
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Sign In !!</h1>
            <?php
            echo $msg;
            if(isset($_SESSION['msg']) and $_SESSION['msg'] != "")
            {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="Username" class="form-control" placeholder="Enter Username"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Enter Password"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="login" value="Login" class="btn btn-danger">
                </div>
            </form>
            <label>Don't have an account? <a href="index.php">Sign up</a></label>
        </div>
    </body> 
</html>
