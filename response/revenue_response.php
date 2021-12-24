<?php
include "../config.php";
$title = $_POST['title'];
$cat = $_POST['cat'];
$decs = $_POST['desc'];
$amount = $_POST['amount'];

if ($title != "" && $cat != "" && $amount != "" ){

    $sql_query = "INSERT INTO `income_or_expense`(`expense_title`, `expense_category`, `expense_description`, `expense_amount`,`expense_type`) VALUES ('$title','$cat','$decs',$amount,'rev')";
    // echo $sql_query;
    $result = mysqli_query($con,$sql_query);
    
    $last_id = mysqli_insert_id($con);
    $bal = update_balance($con,$amount,'inc');
    $month = date('F');
    $year = date('Y');
    $gen_history_query = "INSERT INTO `transactions`(`transaction_type`, `transaction_foreign_id`, `transaction_month`, `transaction_year`,`transaction_amount`,`transaction_balance`) VALUES('revenue',$last_id,'$month','$year',$amount,$bal)";
    $store_history = mysqli_query($con,$gen_history_query);

    if($result){
        if($store_history){
            header('Location: ../show_revenue.php');
        }else{
            echo "History Not Generated Please Try Again";
        }
    }else{
        echo "Invalid username and password";
    }

}

?>