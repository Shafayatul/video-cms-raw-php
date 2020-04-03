<?php 
include('./includes/header.php');
include('../class/Category.php');
$db = $database->getConnection();
$instructor = new Category($db);
$result = $instructor->viewCategory();
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category List</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Category</a></li>
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
              <a href="categoryadd.php" class="btn btn-success btn-sm">Add New Category <i class="fas fa-plus-circle"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>slug</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['category_name'] ?></td>
                    <td><?php echo $row['category_slug'] ?> </td>
                    <td><img src="../uploads/category/<?php echo $row['category_img'] ?>" class="img-thumbnail" width="100"> </td>
                    <td>
                        <a href="categoryedit.php?id=<?php echo $row['id']; ?>" ><i class="fas fa-edit text-warning"></i></a>
                        <a href="categorydelete.php?id=<?php echo $row['id']; ?>" ><i class="fas fa-trash-alt text-danger"></i></a>
                    </td>
                </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>slug</th>
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
    $('#datatable').DataTable({
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