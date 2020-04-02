<?php
include('includes/header.php');
include('class/database.php');
include('class/User.php');
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$message = '';
if (isset($_REQUEST['submit'])) {
  extract($_REQUEST);
  $user_number = $user->sanitize($_POST['signupPhone']);
  $user_password = $user->sanitize($_POST['loginPassword']);
  $result = $user->addPublicUser($user_number,$user_password);
  if($result){
    $message = "Registration successfull Please Login";
  }
  else{
    $message = "User Already Exist";
  }
}

?>  
  <div id="app">
    <header class="site-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6 col-md-3" style="margin:auto;text-align:center;">
            <a href="" class="logo">33</a>
          </div>
        </div>
      </div>
    </header>
        
    <div class="page page--fullscreen">
      <div class="container">
        <div class="row d-flex align-items-center justify-content-center full-height">
          <div class="col-12 col-md-6">
            <div class="bg-success">
                <h3>
                <?php if (isset($message)): ?>
                    <span><?php echo $message ?></span>
                <?php endif ?>
                </h3>
            </div>
            <form class="form" action="" id="signupForm" method="POST">
              <h1 class="h2 form__title">Üye Ol</h1>
              <div class="row">
                <div class="col-12 form-group">
                  <label for="signupPhone" class="label-control">Telefon numarası</label>
                  <input id="signupPhone" name="signupPhone" type="email" class="form-control" placeholder="example@example.com">
                </div>
                <div class="col-12 form-group">
                  <label for="loginPassword" class="label-control">Şifre</label>
                  <input id="loginPassword" name="loginPassword" type="password" class="form-control" minlength="3">
                </div>
                <div class="col-12 form-group d-flex justify-content-center mb-0">
                  <input type="submit" id="submit" name="submit" class="button button--primary u-size-lg" value="Şifre Gönder" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php'); ?>


