<?php 
include('includes/header.php');
include('../class/Classes.php');
include('../class/Category.php');
include('../class/Instractor.php');
$db = $database->getConnection();
$class = new Classes($db);
$result = $class->viewClasses();
$instructor = new Instructor($db);
$instructorArray = $instructor->instructorArray();
$category = new Category($db);
$categoryArray = $category->categoryArray();
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
                  <th>Category</th>
                  <th>Instructor</th>
                </tr>
                </thead>
                <tbody>
                  <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo $row['class_name'] ?></td>
                  <td><?php echo $categoryArray[$row['category_id']] ?> </td>
                  <td><?php echo $instructorArray[$row['instructor_id']] ?> </td>
                  <td>
                    <a ><i class="fas fa-edit text-warning"></i></a>
                    <a ><i class="fas fa-trash-alt text-danger"></i></a>
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