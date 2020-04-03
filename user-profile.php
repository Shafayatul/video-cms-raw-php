<?php 
include('includes/header.php'); 
include('class/database.php');
include('class/User.php');
$database = new Database();
$db = $database->getConnection();
$users = new User($db);
$is_date_picker = true;

if(!isset($_SESSION['login']) || !$_SESSION['login']) {
  header('location: user-login.php');
}  

$result = $users->getCurrentUser();
$user = mysqli_fetch_assoc($result);
$message = '';
if (isset($_POST['update-profile'])) {
    extract($_REQUEST);
    $name = $users->sanitize($_POST['name']);
    $email = $users->sanitize($_POST['email']);
    $gender = $users->sanitize($_POST['gender']);
    $birthday = $users->sanitize($_POST['birthday']);
    $country = $users->sanitize($_POST['country']);
    $city = $users->sanitize($_POST['city']);
    $reasonForRegistration = $users->sanitize($_POST['reasonForRegistration']);
    $result_update = $users->updateProfile($name, $email, $gender, $birthday, $country, $city, $reasonForRegistration);
    if ($result_update) {
      $message = '<div class="alert alert-success" role="alert">
                    Profile successfully updated.
                  </div>';
    } else {
      $message = '<div class="alert alert-danger" role="alert">
                    Error!! Try again.
                  </div>';

    }
  $result = $users->getCurrentUser();
  $user = mysqli_fetch_assoc($result);
}

if (isset($_POST['password-update'])) {
    extract($_REQUEST);
    $currentPassword = $users->sanitize($_POST['currentPassword']);
    $newPassword = $users->sanitize($_POST['newPassword']);
    $newPasswordAgain = $users->sanitize($_POST['newPasswordAgain']);
    if ($newPassword == $newPasswordAgain) {
      $result_update = $users->updatePassword($currentPassword, $newPassword);
      if ($result_update) {
        $message = '<div class="alert alert-success" role="alert">
                      Password successfully updated.
                    </div>';
      } else {
        $message = '<div class="alert alert-danger" role="alert">
                      Error!! Try again.
                    </div>';

      }
    }else{
              $message = '<div class="alert alert-danger" role="alert">
                      New password and confirm password do not match.
                    </div>';
    }

}
?>  




<div id="app">

<!-- public menu start -->
<?php include('includes/menu.php'); ?>
<!-- public menu end -->

<div class="categories categories--min">
  <div class="container">
    <nav class="categoriest__nav">
      <ul class="list">
        <li class="list__item">
          <a href="" class="list__link is-active">
            <span class="text">Profil Düzenle</span>
          </a>
        </li>
        <li class="list__item">
          <a href="" class="list__link">
            <span class="text">Ödeme Yap</span>
          </a>
        </li>
        <li class="list__item">
          <a href="logout.php" class="list__link">
            <span class="text">Logout</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
    
    
<div class="page">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8 offset-md-2">
        <form id="profileForm" class="form" action="#" method="POST">
          <h1 class="h2 form__title">Profil Düzenle</h1>
          <?php echo $message;?>
          <div class="row">
            <div class="col-12 col-md-6 form-group">
              <label for="name" class="label-control">Ad Soyad</label>
              <input id="name" name="name" value="<?php echo $user['name']?>" type="text" class="form-control">
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="email" class="label-control">E</label>
              <input id="email" name="email" value="<?php echo $user['email']?>" type="email" class="form-control">
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="" class="label-control">Cinsiyet</label>
              <div class="select-styled">
                <select name="gender" id="gender" class="form-control">
                  <option value="">Seçiniz</option>
                  <option value="kadin" <?php echo ($user['gender'] == "kadin")? 'selected':'' ?> >Kadın</option>
                  <option value="erkek" <?php echo ($user['gender'] == "erkek")? 'selected':''?> >Erkek</option>
                </select>
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="form-group">
              <div class="form-group">
                    <label for="classdatetime" class="col-form-label">Doğum Tarihi (Gün/Ay/Yıl)</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                      </div>
                      <input type="text" class="form-control float-right" id="birthday2" name="birthday" value="<?php echo $user['birthday']?>">
                    </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 form-group">
              <label for="" class="label-control">Ülke</label>
              <div class="select-styled">
                <select name="country" id="country" class="form-control">
                  <option value="">Ülke Seçiniz</option>
                  <option value="tr" <?php echo ($user['country'] == "tr")? 'selected':'' ?> >Türkiye</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="" class="label-control">Şehir</label>
              <div class="select-styled">
                <select name="city" id="city" class="form-control">
                  <option value="">Şehir Seçiniz.</option>
                  <option value="34" <?php echo ($user['city'] == "34")? 'selected':'' ?> >İstanbul</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="" class="label-control">Üye Olma Nedeni?</label>
              <div class="select-styled">
                <select name="reasonForRegistration" id="reasonForRegistration" class="form-control">
                  <option value="">Seçiniz</option>
                  <option value="kilo-vermek" <?php echo ($user['reasonForRegistration'] == "kilo-vermek")? 'selected':'' ?> >Kilo vermek</option>
                  <option value="guclenmek" <?php echo ($user['reasonForRegistration'] == "guclenmek")? 'selected':'' ?> >Güçlenmek</option>
                  <option value="bolgesel-incelme" <?php echo ($user['reasonForRegistration'] == "bolgesel-incelme")? 'selected':'' ?> >bölgesel incelme</option>
                  <option value="kaslanmak" <?php echo ($user['reasonForRegistration'] == "kaslanmak")? 'selected':'' ?> >Kaslanmak</option>
                  <option value="fit-olmak" <?php echo ($user['reasonForRegistration'] == "fit-olmak")? 'selected':'' ?> >Fit Olmak</option>
                </select>
              </div>
            </div>
            <div class="col-12 form-group d-flex justify-content-end">
              <input type="submit" id="profileSubmit" class="button button--primary" value="Kaydet" name="update-profile">
            </div>
          </div>
        </form>

        <form id="profilePasswordForm" class="form mt-5" method="POST">
          <h1 class="h2 form__title">Şifre Değiştir</h1>
          <div class="row">
            <div class="col-12 form-group">
              <div class="row">
                <div class="col-12 col-md-6">
                  <label for="currentPassword" class="label-control">Mevcut Şifre</label>
                  <input id="currentPassword" name="currentPassword" type="password" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="newPassword" class="label-control">Yeni Şifre</label>
              <input id="newPassword" name="newPassword" type="password" class="form-control">
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="newPasswordAgain" class="label-control">Yeni Şifre (Tekrar)</label>
              <input id="newPasswordAgain" name="newPasswordAgain" type="password" class="form-control">
            </div>
            <div class="col-12 form-group d-flex justify-content-end">
              <input type="submit" id="submit" class="button button--primary" value="Kaydet" name="password-update">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


    
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <header class="modal-header" style="background-image:url(assets/img/img_1584283951_0a66ebe3cc9d4da9acb6d66cef74ec66.webp);">
        <div class="modal-header__content">
          <div>
            <h4 class="h4">10 min Arms & Shoulders Strength</h4>
            <p class="h5">Rebecca Kennedy·Strength</p>
            <small>Sun 3/15/20 @ 5:05 PM</small>
          </div>
          <a href="" class="button button--primary">Katıl</a>
        </div>
      </header>
      <div class="modal-body">
        <p>Loosen up your arms and shoulders after a challenging workout with a stretch that gives your muscles the love and care they need to be fresh for your next sweat.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="button button-secondary" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>


<?php include('includes/footer.php'); ?>
