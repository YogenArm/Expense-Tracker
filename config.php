<?php

session_start();

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "assignment"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

function update_balance($con,$amount,$type)
{
    $user_query = "select * from users where username = '".$_SESSION['uname']."'";
    $res = mysqli_query($con,$user_query);
    $user = mysqli_fetch_array($res);
    $prev_balance = $user['balance'];
    if($type == 'exp'){
        $new_balance = $prev_balance - $amount;
    }else{
        $new_balance = $prev_balance + $amount;
    }
    $update_bal_query = "UPDATE `users` SET balance = $new_balance WHERE id = ".$user['id'];
    $result = mysqli_query($con,$update_bal_query);
    $_SESSION['current_bal'] = $new_balance;
    return $new_balance;
}