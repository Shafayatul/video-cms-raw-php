<?php 
include('includes/header.php');
include('../class/Classes.php');
include('../class/Category.php');
include('../class/Instractor.php');
$db = $database->getConnection();
$classes = new Classes($db);
$category = new Category($db);
$instructor = new Instructor($db);
// $instructor->addInstructor();
$getCategory = $category->viewCategory();
$getInstructor = $instructor->viewInstructor();
$message = '';
if(isset($_POST['submit'])){
    $class_name = $classes->sanitize($_POST['class_name']);
    $category_name = $classes->sanitize($_POST['category_name']);
    $instructor_name = $classes->sanitize($_POST['instructor_name']);
    $class_date_time = $classes->sanitize($_POST['class_date_time']);
    $classdescription = $classes->sanitize($_POST['classdescription']);
    $class_img = $classes->sanitize($_FILES['class_img']['name']);

    $result = $classes->addClasses($class_name,$category_name,$instructor_name,$class_img,$class_date_time,$classdescription);
    // print_r($result);
    if ($result) {
        $message='<div class="alert alert-success">Class Added Successfully</div>';
    }else {
        $message='<div class="alert alert-danger">Error!! Please try again:</div>';
    }
}
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Class</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Class ></a></li>
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
                <h3 class="card-title">Class Add</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if (isset($message)): ?>
                    <span><?php echo $message ?></span>
                <?php endif ?>
                <form role="form" action="" method="POST" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-sm-6">
                          <!-- input states -->
                          <div class="form-group">
                              <label class="col-form-label" for="class_name"> Class Name</label>
                              <input type="text" class="form-control" id="class_name" name="class_name" placeholder="Enter Class Name">
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label" for="category">Select Category</label>
                            <select name="category_name" id="category" class="form-control select2">
                              <?php while($row = mysqli_fetch_assoc($getCategory)){ ?>
                              <option value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                          <label class="col-form-label" for="category">Select Instructor</label>
                          <select name="instructor_name" id="category" class="form-control select2">
                            <?php while($row = mysqli_fetch_assoc($getInstructor)){ ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['instructor_name'] ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                      <div class="form-group">
                            <label for="classdatetime" class="col-form-label">Class Date & Time</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                              </div>
                              <input type="text" class="form-control float-right" id="classdatetime" name="class_date_time">
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                      <label for="classdescription" class="col-form-label">DESCRIPTION</label>
                          <textarea class="classdescription" name="classdescription" id="classdescription" placeholder="Place some text here"
                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="class_img">Class Image</label>
                          <input type="file" name="class_img" id="class_img" class="form-control" placeholder="" aria-describedby="helpId" required>
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
  $(function () {
    // Summernote
    $('.classdescription').summernote();
    $('.select2').select2({
      theme: 'bootstrap4'
    });
    $('#classdatetime').daterangepicker({
      timePicker: true,
      singleDatePicker: true,
      locale: {
        format: 'DD/MM/YYYY hh:mm A'
      }
    })

  })
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#class-img').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("#category_img").change(function() {
    readURL(this);
  });
</script>