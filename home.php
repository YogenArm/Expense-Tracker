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
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
        <!-- <div class="row">
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
        </div> -->
        <div class="row">
          <div class="col-md-12">
          <canvas id="bar-chart" width="800" height="450"></canvas>
<?php
$months = array(
  'January' => 0,
  'Fabruary' => 0,
  'March' => 0,
  'April' => 0,
  'May' => 0,
  'June' => 0,
  'July' => 0,
  'August' => 0,
  'September' => 0,
  'October' => 0, 
  'November' => 0,
  'December' => 0
);

$sql_query = "SELECT SUM(transaction_amount) as amount,transaction_month FROM `transactions` GROUP by transaction_month";
$result = mysqli_query($con,$sql_query);

while($monthly_expense = mysqli_fetch_assoc($result)){
  foreach($months as $key => $value){
    if($monthly_expense['transaction_month'] == $key){
      $months[$key] = $monthly_expense['amount'];
    }
  }
}
// echo "<pre>";
// print_r($months);
foreach($months as $key => $month){
  $keys[] = $key;
  $expenses[] = $month;
}

?>
<script>

new Chart("bar-chart", {
   type: 'bar',
   data: {
     labels: <?php echo json_encode($keys); ?>,
     datasets: [
       {
         label: "Expenses",
         backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2"],
         data:  <?php echo json_encode($expenses); ?>,
       },
     ]
   },
   options: {
     legend: { display: false },
     title: {
       display: true,
       text: 'Expenses Chart'
     }
   }
});
</script>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
include "widget/footer.php";
?>
<!-- "SELECT SUM(transaction_amount),transaction_month FROM `transactions` GROUP by transaction_month" -->