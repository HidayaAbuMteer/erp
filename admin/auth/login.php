<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>دخول الادارة</title>

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style-rtl.css" rel="stylesheet">
  <script src="../../js/jquery-3.7.1.min.js"></script>
  <script src="../../js/sweetalert2.all.min.js"></script>
  <script src="../../js/functions.js"></script>
   <style>
        @font-face {
            font-family: "Cairo";
            src: url('../assets/fonts/Cairo-Light.ttf');
        }

     * {
            font-family: "Cairo", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }
    </style>
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php
gsite();//احضار اعدادات  الموقع

if(login_check_admin()){
   echo '<meta http-equiv="refresh" content ="0; url=../index"/>';
}else{
if(isset($_POST['login'])){
    $csrf->verify();
    $email = safer($_POST['email']);
    $password = safer($_POST['password']);
    if(empty($email) or empty($password)){
        sweet("error", "خطأ", "جميع الحقول مطلوبة ");
    }else{
     $login = login_admin($email, $password);

     if($login == "success"){
      $date = date("Y-m-d H-i-s");
      //جلب اي بي الجهاز
      $ip = getIP();
     //جلب نظام الجهاز
      $os=getOS();
      //جلب نوع المتصفح
      $browser=getBrowser();
     //حفظ البيانات في مصفوفة
      $login_info=[
      "ip"=>$ip,
      "os"=>$os,
      "browser"=>$browser];
      dbInsert("logs", "date, admin_id, login_info, action", [$date, $_SESSION['user_id'], serialize($login_info), "login"]);
       // sweet("success","نجاح","تم الدخول بنجاح","index");
        echo '<meta http-equiv="refresh" content ="0; url=../"/>';
    }else{
         sweet("error", "خطأ", "  البيانات المدخلة غير صحيحة  " ,"here");
         echo "فشل الدخول";
     }
    }
}
}
?>

<body>
  
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">الدخول الى النظام</h5>
                    <p class="text-center small">ادخل البريد الالكتروني وكلمة المرور للدخول</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post">

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">الايميل الالكتروني</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" >@</span>
                        <input type="email" name="email" class="form-control" id="yourEmail"placeholder="ادخل البريد الالكتروني" required>
                        <div class="invalid-feedback">يرجى ادخال البريد الالكتروني </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">كلمة المرور</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" placeholder="ادخل كلمة المرور" required>
                      <div class="invalid-feedback">يرجى ادخال كلمة المرور</div>
                    </div>
                    <?php 
                    $csrf ->input();
                    ?>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">الدخول</button>
                    </div>
                    <div class="col-12">
                    ** لتجربة النظام **
                    البريد الالكتروني:admin@gmail.com
                    كلمة السر:admin
                    </div>
                     
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                جميع الحقوق محفوظة &copy;<?php echo $site['siteName']?>

              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>