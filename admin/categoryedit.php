<?php 
include('includes/header.php');
include('../class/Category.php');
$db = $database->getConnection();
$instructor = new Category($db);
$category_id = $_GET['id'];
$category = $instructor->getCategory($category_id);
$result = mysqli_fetch_assoc($category);

if(isset($_POST['submit'])){
    $categoryname = $instructor->sanitize($_POST['category_name']);
    $categoryslug = $instructor->sanitize($_POST['category_slug']);
    $category_img =  $instructor->sanitize($_FILES['category_img']['name']);
    $result = $instructor->updateCategory($categoryname, $categoryslug,$category_img, $category_id);
    if ($result == true) {
        $msg_succ='<div class="alert alert-success">Category Updated Successfully</div>';
        $category = $instructor->getCategory($category_id);
        $result = mysqli_fetch_assoc($category);
    }else {
        $msg_succ='<div class="alert alert-danger">Data Already EXIST:</div>';
        $category = $instructor->getCategory($category_id);
        $result = mysqli_fetch_assoc($category);
    }
}
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Category Add</a></li>
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
                <a href="category.php" class="btn btn-primary btn-sm">Category List</a>
                <a href="categoryadd.php" class="btn btn-success btn-sm">Add New Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if (!empty($msg_succ)): ?>
                    <span><?php echo $msg_succ ?></span>
                <?php endif ?>
                <form role="form" action="" method="POST" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-sm-6">
                          <!-- input states -->
                          <div class="form-group">
                              <label class="col-form-label" for="category_name"> Category Name</label>
                              <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $result['category_name'] ?>" placeholder="Enter Class Name">
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label" for="category_slug">Slug</label>
                            <input type="text" class="form-control" id="category_slug" name="category_slug" value="<?php echo $result['category_slug'] ?>" placeholder="Enter slug Name">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="category_img">Category Image</label>
                          <input type="file" name="category_img" id="category_img" class="form-control" placeholder="" aria-describedby="helpId" >
                          <img id="blah" src="../uploads/category/<?php echo $result['category_img']; ?>" width="100%" height="200"/>
                          <!-- <small id="helpId" class="text-muted">ADD Category Image</small> -->
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
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("#category_img").change(function() {
    readURL(this);
  });
</script>