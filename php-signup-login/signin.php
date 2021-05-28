<?php
include 'conn.php';
error_reporting(0);
session_start();


if(isset($_POST['login']))
{
    $user_emailcont = $_POST['emailcont'];
    $password = md5($_POST['password']);

    $sql = "SELECT ID FROM signuptable WHERE (Email = '$user_emailcont' || MobileNumber = '$user_emailcont') && Password = '$password' ";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query);
    if($row>0)
    {
        $_SESSION['uid'] = $row['ID'];
        echo "<script>window.location.href='dashboard.php'</script>";
    }
    else
    {
        echo "<script>alert('Invalid Details !!');
        window.loation.href='signin.php';
        </script>";
    }
}


?>







<!DOCTYPE html>
<html lang="en">

<head>

    <title>Sign In Page</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Sign In Your  Account</h2>
                    <form method="POST">
                        <div class="input-group">
                          
                            <input type="text" class="input--style-1" placeholder="Registered Email or Contact Number" required="true" name="emailcont">
                        </div>
                      
                        
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <input type="password" class="input--style-1" name="password" id="myInput" required="true" placeholder="Password">  
                            </div>
                        </div>

                        <div style="width: 20px; height: 30px;">
                        <input type="checkbox" onclick="showPassword()">
                        </div>
                              
                        <div style="width: 130px; height: 30px; margin-top: -32px; margin-left: 23px;">
                        <lable>Show Password</lable>
                        </div>

                        <div class="p-t-20">
                        <div>
                            <input class="btn btn--radius btn--green" type="submit" name="login" value="Sign IN">
                        </div>
                        <br>
                       <a href="index.php">Don't have an account ? CREATE AN ACCOUNT</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showPassword() {
            var x = document.getElementById("myInput");
            if (x.type === "password") 
            {
                x.type = "text";
            } 
            else 
            {
                x.type = "password";
            }
        }
    </script>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
