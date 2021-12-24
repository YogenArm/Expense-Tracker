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
                  <li class="breadcrumb-item active">Dashboard v1</li>
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
                     <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                           <div class="col-sm-12">
                                <form action="response/expense_response.php" method="post">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Title</label>
                                        <input required type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Bike Puncture">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Category</label>
                                        <select required name="cat" class="form-control" id="exampleFormControlSelect1">
                                        <option>Fees</option>
                                        <option>Rent</option>
                                        <option>Travel</option>
                                        <option>Medical</option>
                                        <option>Utilities</option>
                                        <option>Telephone</option>
                                        <option>Bank fees</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Narration</label>
                                        <textarea required name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput11">Amount</label>
                                        <input required type="number" name="amount" class="form-control" id="exampleFormControlInput11" placeholder="55">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </form>
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