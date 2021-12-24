<?php
include "config.php";


if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser,balance from users where username='".$uname."' and password='".$password."'";
        
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['current_bal'] = $row['balance'];
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<html>
    <head>
        <title>Create simple login page with PHP and MySQL</title>
        <link href="css/login.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        
        <div class="container">
        <form method="post" action="">
<div class="box">
<h1>Dashboard</h1>

<input type="text" name="txt_uname" placeholder="Username" class="email" />
  
<input type="password" name="txt_pwd" placeholder="Passwords" class="email" />
  

<input type="submit" value="Login" class="btn text-center" name="but_submit" id="but_submit" />


<!-- <a href="#"><div id="btn2">Sign Up</div></a> -->
  
</div> <!-- End Box -->
  
</form>

<!-- <p>Forgot your password? <u style="color:#f1c40f;">Click Here!</u></p> -->
            <!-- <form method="post" action="">
                <div id="div_login">
                    <h1>Login</h1>
                    <div>
                        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                </div>
            </form> -->
        </div>
    </body>
</html>

