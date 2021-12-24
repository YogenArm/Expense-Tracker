     <!-- Main Sidebar Container -->
     <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link ml-3">
      <span class="brand-text font-weight-light">EXPENSE TRACKER</span>
      <div>
        <b>Current Balance</b><span id="current_bal"> Rs.<?=$_SESSION['current_bal']?>.00</span>
      </div>
    </a>

  
 <!-- Sidebar -->
  <div class="sidebar">

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
   
    <li class="nav-item">
      <a href="home.php" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="show_expense.php" class="nav-link">
        <i class="nav-icon fas fa-money-bill-alt"></i>
        <p>
          Expenses
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="show_revenue.php" class="nav-link">
        <i class="nav-icon fas fa-money-bill-alt"></i>
        <p>
          Revenue
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="show_statement.php" class="nav-link">
        <i class="nav-icon fas fa-money-bill-alt"></i>
        <p>
          Statement
        </p>
      </a>
    </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>