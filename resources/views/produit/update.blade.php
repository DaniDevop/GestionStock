<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MODIFICATION PRODUIT</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

    <div class="pagetitle">
      <nav>
      
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
    <div class="card-body">
       

        <h5 class="card-title">MODIFICATION DE  PRODUIT</h5>
        <form  id="form">

            @csrf
            <div class="mb-3">
                <label for="nomFournisseur" class="form-label">Designation</label>
                <input type="text" class="form-control" id="nomFournisseur" name="designation" value="{{$produit->designation}}">
            </div>
            <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">PRIX-ACHAT</label>
                <input type="text" class="form-control" id="adresseFournisseur" name="prix_achat" value="{{$produit->prix_achat}}">
            </div>
            <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">PRIX-VENTE</label>
                <input type="text" class="form-control" id="prix_vente" name="prix_vente" value="{{$produit->prix_vente}}">
            </div>
            <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">QUANTITE ENTRANT</label>
                <input type="text" class="form-control" id="adresseFournisseur" name="qteStock" value="{{$produit->qteStock}}">
            </div>
            <div class="mb-3">
                <label for="emailFournisseur" class="form-label">IMAGE</label>
                <input type="file" class="form-control" id="emailFournisseur" name="image" accept="image/*" value="{{$produit->image}}">
            </div>
            
            <div class="mb-3">
                <label for="telephoneFournisseur" class="form-label">FOURNISSEUR</label>
                <select name="fournisseur_id" class="form-select" id="">
                    <option value="{{$produit->fournisseur_id}}">{{$produit->fournisseur->nom}}</option>
                    @foreach ($fournisseurAll as $user)
                    <option value="{{$user->id}}">{{$user->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="telephoneFournisseur" class="form-label">CATEGORIE</label>
                <select name="categorie_id" class="form-select" id="">
                <option value="{{$produit->categorie_id}}">{{$produit->categorie->categorie}}</option>
                    @foreach ($categorie as $cat)
                    <option value="{{$cat->id}}">{{$cat->categorie}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden"  " name="id" value="{{$produit->id}}">

            <button type="submit" class="btn btn-primary">Ajouter Fournisseur</button>
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
      &copy; Copyright <strong><span>STOCK</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
  <script>
    $(document).ready(function(){
        $("#form").submit(function(event){
            event.preventDefault();
            
            var form = $("#form")[0];
            var data = new FormData(form);

            $.ajax({
                type: "Post",
                url: "{{ route('update.produit') }}",
                data: data,
                processData: false,
                contentType: false,
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                success: function(response){
                    alert("PRODUIT MODIFIER AVEC SUCCESS"); // Utilisez le bon nom de la propriété dans la réponse JSON
                },
                error: function(error){
                    alert(error.responseJSON);
                }
            });
        });     
    });
</script>


</body>

</html>