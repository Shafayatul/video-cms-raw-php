<?php
include('includes/header.php');
include '../class/database.php';
include '../class/UserClass.php';
$database = new Database();
$db = $database->getConnection();

$result = new User($db);
$user = $result->getUser();

while( $row = mysqli_fetch_assoc($user)){
    echo $row['name'];
}

?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Instructor</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-12">
          </div>
        </div>
      </div>
    </section>

<?php 
include('includes/footer.php');
?>