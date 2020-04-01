<?php 
include('includes/header.php');
include('../class/database.php');
include('../class/InstractorClass.php');
$database = new Database();
$db = $database->getConnection();
$instructor = new InstructorClass($db);
$result = $instructor->getInstructor();
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Instructor List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="instructortablelist" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Entry</th>
                </tr>
                </thead>
                <tbody>
                  <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo $row['instructor_name'] ?></td>
                  <td><?php echo $row['gender'] ?> </td>
                  <td><?php echo $row['created_at'] ?> </td>
                </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Entry</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


<?php 
include('includes/footer.php');
?>

<script>
  $(function () {
    $('#instructortablelist').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>