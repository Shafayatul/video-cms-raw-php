<?php 
include('includes/header.php');
include('../class/InstractorClass.php');
$db = $database->getConnection();
$instructor = new InstructorClass($db);
// $instructor->addInstructor();

if(isset($_POST['submit'])){
    $instructorname = $instructor->sanitize($_POST['instructorname']);
    $instructorgender = $instructor->sanitize($_POST['gender']);
    $result = $instructor->addInstructor($instructorname,$instructorgender);
}
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Instructor</h1>

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
              <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Instructor Add</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="" method="POST">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- input states -->
                        <div class="form-group">
                            <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Name</label>
                            <input type="text" class="form-control" id="instructorname" name="instructorname" placeholder="Enter Instructor Name">
                        </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value="Male">
                          <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value="Female" checked>
                          <label class="form-check-label">Female</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>

                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

<?php 
include('includes/footer.php');
?>