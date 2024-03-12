<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CONNEXION</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Stock Application</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Changes Mot de passe</h5>
                    <p class="text-center small"></p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" action="{{route('verify_email.changes')}}" novalidate>
                     @csrf
                     @method('post')
                     
                    <div class="col-12">
                
                      <label for="yourUsername" class="form-label">Entrer votre email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"></span>
                        <input type="email" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback"></div>
                        
                      </div>
                      
                    </div>

                    
                    <div class="col-12">
                <label for="yourUsername" class="form-label">Nouveau mot de passe</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"></span>
                  <input type="password" name="password" class="form-control" id="yourUsername" required>
                  <div class="invalid-feedback">

                  </div>
                  
                </div>
                <div class="col-12">
                
                <label for="yourUsername" class="form-label">Confirmation mot de passe</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"></span>
                  <input type="password" name="password2" class="form-control" id="yourUsername" required>
                  <div class="invalid-feedback"></div>
                  
                </div>
                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Valider</button>
                    </div><br>
                    <div class="col-12">
                        <br>
                      <p class="small mb-0"><a href="{{route('login_users')}}">Retour</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                 <a href="">mapangounzigoudaniellevy@gmail.com</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="//vendor/apexcharts/apexcharts.min.js"></script>
  <script src="//vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="//vendor/chart.js/chart.umd.js"></script>
  <script src="//vendor/echarts/echarts.min.js"></script>
  <script src="//vendor/quill/quill.min.js"></script>
  <script src="//vendor/simple-datatables/simple-datatables.js"></script>
  <script src="//vendor/tinymce/tinymce.min.js"></script>
  <script src="//vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>
  @if(session('error'))
  <script>
   alert("L'email n'existe pas dans la base de données");
  </script>
  @endif
  @if(session('different'))
  <script>
   alert("Les mots de passes ne sont pas identique");
  </script>
  @endif

</body>

</html>