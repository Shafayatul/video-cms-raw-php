<?php
ob_start();
include('includes/header.php');
include('class/database.php');
include('class/User.php');
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$message = '';
if (isset($_REQUEST['submit'])) {
  extract($_REQUEST);
  $user_email = $user->sanitize($_POST['user_email']);
  $user_password = $user->sanitize($_POST['user_password']);
  $result = $user->addPublicUser($user_email,$user_password);
  if($result){
    $login = $user->loginuser($user_email,$user_password);
    if ($login) {
       header("location:user-profile.php");
    }else{
        $message = 'Wrong username or password';
    }
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
                  <label for="user_email" class="label-control">Telefon numarası</label>
                  <input id="user_email" name="user_email" type="email" class="form-control" placeholder="example@example.com">
                </div>
                <div class="col-12 form-group">
                  <label for="user_password" class="label-control">Şifre</label>
                  <input id="user_password" name="user_password" type="password" class="form-control" minlength="3">
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


