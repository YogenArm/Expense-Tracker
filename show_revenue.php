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
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Revenue</li>
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
                     <a href="add_revenue.php"> <button class="btn btn-primary"> ADD Revenue </button> </a> 
                     <br> <br>
                     <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                           <div class="col-sm-12">
                              <table id="example"  style="width: 100%;">
                                 <thead>
                                    <tr role="row">
                                       <th>Revenue Id</th>
                                       <th>Category</th>
                                       <th>Title</th>
                                       <th>Amount</th>
                                       <th>Description</th>
                                       <th>Date</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $sql_query = "select * from income_or_expense where expense_type = 'rev'";
                                    $result = mysqli_query($con,$sql_query);
                                    while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                       <td><?=$row['expense_id']?></td>
                                       <td><?=$row['expense_category']?></td>
                                       <td><?=$row['expense_title']?></td>
                                       <td>Rs.<?=$row['expense_amount']?></td>
                                       <td><?=$row['expense_description']?></td>
                                       <td><?=$row['expense_at']?></td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <th>Revenue Id</th>
                                       <th>Category</th>
                                       <th>Title</th>
                                       <th>Amount</th>
                                       <th>Description</th>
                                       <th>Date</th>
                                    </tr>
                                 </tfoot>
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
<?php
include "widget/footer.php";
?>