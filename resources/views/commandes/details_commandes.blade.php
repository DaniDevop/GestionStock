<!DOCTYPE html>
<html lang="en">

<style>
        .user-card {
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
            text-align: center;
        }

        .user-image {
            max-width: 95%;
            height: auto;
            border-radius: 90%;
        }
        /* Ajoutez vos styles personnalisés ici */

/* Exemple de style minimal pour le formulaire */
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input,
select {
    width: 50%;
    padding: 3px;
    box-sizing: border-box;
    margin-bottom: 5px;
}

button {
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

    </style>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Details commandes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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

    <div class="pagetitle">
      <nav>

      </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="user-card">
                              <h3>Produit commandés</h3>
                                <img class="user-image" src="{{ asset('storage/'. $commandes->produit->image) }}" alt="Photo de l'utilisateur">
                                <h6 >Produit : {{$commandes->produit->designation}}</h6>
                                <h6 class="">PRIX_ACHAT : {{$commandes->produit->prix_achat}}</h6>
                                <h6 class="">Date d'écheances de la commandes : {{$commandes->date_commandes}}</h6><br>
                                <h6 class="">Statut : {{$commandes->statut}}</h6>
                                <h6 class="">FOURNISSEUR : {{ optional(optional($commandes->produit)->fournisseur)->nom }}</h6>
                                <h6 class="">References Commande : {{$commandes->reference}}</h6>
                                <h6 class="">Date de creation : {{$commandes->created_at}}</h6>
                                <h6 class="">Date de Mise à jour : {{$commandes->updated_at}}</h6>

                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                  @if(session('Error'))
                                  <h3 style="color: red;">'Une erreur  c'est produite</h3>
                                  @endif
                                  @if(session('valider'))
                                  <h3 style="color: blue;">Commande mise à jour avec succès !!!</h3>
                                  @endif
                                <h3 class="card-title">Modification de la commandes n°: {{$commandes->reference}}</h3>
                                    <form method="post" action="{{route('update_commandes')}}" >
                                         @csrf
                                         @method('post')
                                         <div class="mb-3">
                                    <label for="nomFournisseur" class="form-label">References</label>
                                    <input type="text" class="form-control" id="nomFournisseur" disabled  value="{{$commandes->reference}}">



                                       <div class="mb-3">
                              <label for="adresseFournisseur" class="form-label">Date de la commandes</label>
                              <input type="date" class="form-control" id="adresseFournisseur" name="date_commandes" value="{{$commandes->date_commandes}}" required>
                          </div>
                          <div class="mb-3">
                              <label for="adresseFournisseur" class="form-label">Produit</label>
                              <select name="produit_id" id="" class="form-select">
                                <option value="{{$commandes->produit_id}}">{{$commandes->produit->designation}}</option>
                                  @foreach($produits as $product)
                                  <option value="{{$product->id}}">{{$product->designation}}</option>
                                  @endforeach
                              </select>

                              </div>

                              <div class="mb-3">
                                  <label for="emailFournisseur" class="form-label">Quantité entrant</label>
                                  <input type="number" class="form-control" id="emailFournisseur" name="qte_entrant" value="{{$commandes->qte_entrant}}" required>
                              </div>
                                <input type="hidden" name="id_commandes" value="{{$commandes->id}}">
                                <input type="submit" value="Mise à jour" class="btn btn-dark">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
  @if(session('sucess1'))
        <script>
      alert("OPERATION REUSSIE AVEC SUCCCESS");
        </script>
    </div>
@endif
@if(session('sucess2'))
        <script>
      alert("OPERATION REUSSIE AVEC SUCCCESS");
        </script>
    </div>
@endif
<script>
  function benefice(a,b){
    return b-a;
  }
</script>
</body>
</html>
