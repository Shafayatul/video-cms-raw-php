<?php 
// include('includes/header.php'); 
session_start();
include('class/database.php');
include('class/User.php');
$database = new Database();
$db = $database->getConnection();
$users = new User($db);
$result = $users->viewUserinfo();
$user = mysqli_fetch_assoc($result);


// $uid = $_SESSION['id'];
// if(!$user->get_session()){
//   header('location: user-login.php');
// }  



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
        <form id="profileForm" class="form">
          <h1 class="h2 form__title">Profil Düzenle</h1>
          <div class="row">
            <div class="col-12 col-md-6 form-group">
              <label for="fullName" class="label-control">Ad Soyad</label>
              <input id="fullName" name="fullName" value="<?php echo $user['name']?>" type="text" class="form-control">
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="fullName" class="label-control">E</label>
              <input id="fullName" name="fullName" value="<?php echo $user['email']?>" type="email" class="form-control">
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="" class="label-control">Cinsiyet</label>
              <div class="select-styled">
                <select name="gender" id="gender" class="form-control">
                  <option value="">Seçiniz</option>
                  <option value="kadin">Kadın</option>
                  <option value="erkek">Erkek</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="birthday" class="label-control">Doğum Tarihi (Yıl/Gün/Ay)</label>
              <input id="birthday" name="birthday" type="date" class="form-control date" placeholder="2020/01/01">
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="" class="label-control">Ülke</label>
              <div class="select-styled">
                <select name="country" id="country" class="form-control">
                  <option value="">Ülke Seçiniz</option>
                  <option value="tr">Türkiye</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="" class="label-control">Şehir</label>
              <div class="select-styled">
                <select name="city" id="city" class="form-control">
                  <option value="">Şehir Seçiniz.</option>
                  <option value="34">İstanbul</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-6 form-group">
              <label for="" class="label-control">Üye Olma Nedeni?</label>
              <div class="select-styled">
                <select name="reasonForRegistration" id="reasonForRegistration" class="form-control">
                  <option value="">Seçiniz</option>
                  <option value="kilo-vermek">Kilo vermek</option>
                  <option value="guclenmek">Güçlenmek</option>
                  <option value="bolgesel-incelme">bölgesel incelme</option>
                  <option value="kaslanmak">Kaslanmak</option>
                  <option value="fit-olmak">Fit Olmak</option>
                </select>
              </div>
            </div>
            <div class="col-12 form-group d-flex justify-content-end">
              <input type="submit" id="profileSubmit" class="button button--primary" value="Kaydet">
            </div>
          </div>
        </form>

        <form id="profilePasswordForm" class="form mt-5">
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
              <input type="submit" id="submit" class="button button--primary" value="Kaydet">
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
