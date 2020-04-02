<?php 
include('./includes/header.php');
include('../class/Instractor.php');
$db = $database->getConnection();
$instructor = new Instructor($db);
$result = $instructor->viewInstructor();
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Instructor List</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Instructor List</a></li>
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
          
          <div class="card card-warning">
            <div class="card-header">
              <a href="instructor.php" class="btn btn-success btn-sm">Add Instructor</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="instructortablelist" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo $row['instructor_name'] ?></td>
                  <td><?php echo $row['gender'] ?> </td>
                  <td>
                    <a href="instructoredit.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit text-warning"></i></a>
                    <a href="instructordelete.php?id=<?php echo $row['id']; ?>" ><i class="fas fa-trash-alt text-danger"></i></a>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Action</th>
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