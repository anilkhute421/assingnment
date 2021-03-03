<?php
include_once('config.php');
$msg = "";
if(isset($_POST['signup']))
{
    $pname = $_POST['pname'];
    $pemail = $_POST['pemail'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $IsExistssql = mysqli_query($db,"SELECT * FROM tblusers WHERE Username = '$username'");
    if(mysqli_num_rows($IsExistssql)>=1)
    {
        $msg = "<label style='color:red'>Username already exists.</label> ";
    }
    else
    {
        $sqlinsert = "INSERT INTO tblusers(Name, Email, Username, Password) VALUES ('$pname','$pemail','$username','$pass')";
        if($db->query($sqlinsert) == true)
        {
            header('Location:SavedItem.php');
            exit();
        }
        else
        {
            $msg = "<label style='color:red'>Oops!! Failed to Create User.</label> ";
        }
    }
 }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Register Yourself !!</h1>
            <?php
            echo $msg;
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Name<span style="color: red;">*</span></label>
                    <input type="text" name="pname" class="form-control" placeholder="Enter Name"/>
                </div>
                <div class="form-group">
                    <label>Email<span style="color: red;">*</span></label>
                    <input type="email" name="pemail" class="form-control" placeholder="Enter Email"/>
                </div>
                <div class="form-group">
                    <label>Choose Username<span style="color: red;">*</span></label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username"/>
                </div>
                <div class="form-group">
                    <label>Choose Password<span style="color: red;">*</span></label>
                    <input type="password" name="pass" class="form-control" placeholder="Enter Password"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="signup" value="Sign Up" class="btn btn-danger">
                </div>
            </form>
            <label>Already have an account? <a href="login.php">Login</a></label>
        </div>
    </body> 
</html>
