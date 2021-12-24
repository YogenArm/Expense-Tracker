<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
include "widget/header.php";
include "widget/aside.php";


?> 


 
            
<div class="content-wrapper">
   
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active">Statement</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">List</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-4">
                           <!-- <a href="add_expense.php"> <button class="btn btn-primary"> ADD Expense </button> </a>  -->
                        </div>
                        <div class="col-md-6">
                           
                        </div>
                        <div class="col-md-2">
                           <select class="form-control" id="month" onchange="filter()">
                              <option>--Select Month--</option>
                              <option>Janaury</option>
                              <option>February</option>
                              <option>March</option>
                              <option>April</option>
                              <option>May</option>
                              <option>June</option>
                              <option>July</option>
                              <option>August</option>
                              <option>September</option>
                              <option>October</option>
                              <option>November</option>
                              <option>December</option>
                           </select>
                        </div>
                     </div>
                     <br> <br>
                     <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                           <div class="col-sm-12">
                              <table id=""  style="width: 100%;">
                                 <thead>
                                    <tr role="row">
                                       <th>Transaction Id</th>
                                       <th>Type</th>
                                       <th>month</th>
                                       <th>Year</th>
                                       <th>Amount</th>
                                       <th>Balance</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $sql_query = "select * from transactions";
                                    if(isset($_GET['month']) && !empty($_GET['month'])){
                                       $selected_month = $_GET['month'];
                                       $sql_query .=" where transaction_month = '$selected_month'";
                                    }
                                    // echo $sql_query;
                                    // die();
                                    $result = mysqli_query($con,$sql_query);
                                    while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                       <td><?=$row['transaction_id']?></td>
                                       <td><?=$row['transaction_type']?></td>
                                       <td><?=$row['transaction_month']?></td>
                                       <td><?=$row['transaction_year']?></td>
                                       <td>Rs.<?=$row['transaction_amount']?></td>
                                       <td>Rs.<?=$row['transaction_balance']?></td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                                 <!-- <tfoot>
                                    <tr>
                                       <th>Transaction Id</th>
                                       <th>Type</th>
                                       <th>month</th>
                                       <th>Year</th>
                                    </tr>
                                 </tfoot> -->
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
               </div>
            </div>
         </div>
      </div>
      <!-- /.card -->
   </section>
   <!-- /.content -->
</div>
<script>
   var filter = () =>{
      var selected_month = $('#month').val();
      var current_url = location.protocol + '//' + location.host + location.pathname;
      
      window.location.href = current_url+"?month="+selected_month;

      
   }
</script>
<?php
include "widget/footer.php";
?>