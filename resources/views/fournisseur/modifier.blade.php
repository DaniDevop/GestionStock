<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MODIFICATION FOURNISSEUR</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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


<header id="header" class="header fixed-top d-flex align-items-center">
          @include('layouts.header')
          </header>
          <aside id="sidebar" class="sidebar">
          @include('layouts.sidebar')
</aside>

  <main id="main" class="main">

    <div>MODIFICATION  FOURNISSEUR</h1>
      <nav>

      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
    <div class="card-body">

          @if(isset($sucess2))
          <h2 class="card-title">
            <script>
              alert("Fournisseur Modifié avec succès");
            </script>
          </h2>
          @endif
          @if(isset($Sucess1))
          <script>
              alert("Fournisseur Modifié avec succès");
            </script>
          @endif
        <h5 class="card-title">MODIFICATION FOURNISSEUR</h5>
        <form method="post" action="{{route('modification_fournisseur')}}" enctype="multipart/form-data">

        @method('post')
            @csrf
            <div class="mb-3">
                <label for="nomFournisseur" class="form-label">USERNAME</label>
                <input type="text" class="form-control" id="nomFournisseur" name="nom" value="{{$fournisseur->nom}}" >
            </div>
            <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">PRENOM</label>
                <input type="text" class="form-control" id="adresseFournisseur" value="{{$fournisseur->prenom}}" name="prenom" >
            </div>
            <div class="mb-3">
                <label for="emailFournisseur" class="form-label">IMAGE</label>
                <input type="file" class="form-control" id="emailFournisseur" name="profile" value="{{$fournisseur->profile}}" accept="image/*" >
            </div>
            <div class="mb-3">
                <label for="emailFournisseur" class="form-label">EMAIL</label>
                <input type="email" class="form-control" id="emailFournisseur" name="email" value="{{$fournisseur->email}}" >
            </div>
            <div class="mb-3">
                <label for="telephoneFournisseur" class="form-label">Phone</label>
                <input type="text" class="form-control" id="telephoneFournisseur" name="tel" value="{{$fournisseur->tel}}" >
            </div>
            <div class="mb-3">
                <label for="telephoneFournisseur" class="form-label">ADRESSE</label>
                <input type="text" class="form-control" id="telephoneFournisseur" value="{{$fournisseur->adresse}}" name="adresse" >
                <input type="hidden" class="form-control" id="telephoneFournisseur" value="{{$fournisseur->id}}" name="id" >

            </div>
            <button type="submit" class="btn btn-primary">Mise à jour</button>
        </form>
    </div>
</div>


        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>STOCK</span></strong>
    </div>
    <div class="credits">

        Designed by <a href="#">mapangounzigoudaniellevy@gmail.com</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/chart.js/chart.umd.js"></script>
  <script src="/vendor/echarts/echarts.min.js"></script>
  <script src="/vendor/quill/quill.min.js"></script>
  <script src="/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/vendor/tinymce/tinymce.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>

</body>

</html>
