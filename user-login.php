<?php 
include('includes/header.php'); 
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$msg = '';
if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $login = $user->loginpublicUser($loginInput,$loginPassword);
    // print_r($login);exit;
    if ($login) {
        // Registration Success
       header("location:user-profile.php");
    } else {
        // Registration Failed
        $msg =  'Wrong username or password';
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
            <div class="bg-danger text-center">
              <h3>
                <?php if(isset($msg)): ?>
                  <h3><?php echo $msg ?></h3>
                  <?php endif ?>
              </h3>
            </div>
            <form class="form" id="loginForm" method="POST" action="">
              <h1 class="h2 form__title">Giriş Yap</h1>
              <div class="alert">
                <ul class="form__alert"></ul>
              </div>
              <div class="row">
                <div class="col-12 form-group">
                  <label for="loginInput" class="label-control">E-posta adresi veya Telefon numarası</label>
                  <input id="loginInput" name="loginInput" type="email" class="form-control" placeholder="E-posta adresi veya Telefon numarası" minlength="3">
                </div>
                <div class="col-12 form-group">
                  <label for="loginPassword" class="label-control">Şifre</label>
                  <input id="loginPassword" name="loginPassword" type="password" class="form-control" minlength="3">
                </div>
                <div class="col-12 form-group d-flex justify-content-center mb-0">
                  <input type="submit" id="submit" name="submit" class="button button--primary u-size-lg" value="Giriş Yap" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php include('includes/footer.php'); ?>
