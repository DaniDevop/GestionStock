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

  <title>DETAILS PRODUIT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
 @include('layouts.link')

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
                                <img  class="user-image" src="{{ asset('storage/'. $produit->image) }}" alt="Photo de l'utilisateur">
                                <h6 >DESIGNATION : {{$produit->designation}}</h6>
                                <h6 class="">PRIX_ACHAT : {{$produit->prix_achat}}</h6>
                                <h6 class="">PRIX_VENTE : {{$produit->prix_vente}}</h6><br>
                                <h6 class="">QUANTITE AU STOCK : {{$produit->qteStock}}</h6>
                                <h6 class="">FOURNISSEUR : {{optional($produit->fournisseur)->nom}}</h6>
                                <h6 class="">CATEGORIE : {{optional($produit->categorie)->categorie}}</h6>
                                <h6 class="">DATE CREATION : {{$produit->date_creation}}</h6>
                                <h6 class="">DATE MISE A JOUR : {{$produit->date_update}}</h6>
                                <h6 class="btn btn-primary">BENEFICE DU PRODUIT : {{$produit->prix_vente - $produit->prix_achat}}FCFA</h6>
                                <h6 class="btn btn-primary">BENEFICE SELON LE STOCK : {{($produit->prix_vente - $produit->prix_achat) * $produit->qteStock}}FCFA</h6>

                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                <h3 class="card-title">MODIFICATIONS DES INFORMATIONS DU PRODUIT</h3>
                                    <form method="post" action="{{route('update.produit')}}" enctype="multipart/form-data">
                                         @csrf
                                         @method('post')
                              <div class="mb-3">
                                  <br>
                                  <span id="renvoie"></span>
                                  <label for="adresseFournisseur" class="form-label">DESIGNATION</label>
                                  <input type="text"  id="vendue" class="form-control"  name="designation"  value="{{$produit->designation}}">
                              </div>

                        <div class="mb-3">
                            <br>
                            <span id="renvoie"></span>
                            <label for="adresseFournisseur" class="form-label">PRIX-ACHAT</label>
                            <input type="number"  id="vendue" class="form-control"  min="1" name="prix_achat" value="{{$produit->prix_achat}}" >
                        </div>
                    <div class="mb-3">

                        <label for="adresseFournisseur" class="form-label">PRIX-DE-VENTE</label>
                        <input type="number"  id="vendue" class="form-control" min="1"  name="prix_vente" value="{{$produit->prix_vente}}">
                    </div>
            <div class="mb-3">

                <label for="adresseFournisseur" class="form-label">QUANTITE ENTRANT</label>
                <input type="number"  id="vendue" class="form-control"  name="qteStock"  value="{{$produit->qteStock}}">
            </div>
            <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">SEUIL_ALERT</label>
                <input type="number" class="form-control"  id="adresseFournisseur" name="seuil_alert" value="{{$produit->seuil_alert}}" required>
            </div>
            <div class="mb-3">
                <br>
                <span id="renvoie"></span>
                <label for="adresseFournisseur" class="form-label">IMAGE</label>
                <input type="file" class="form-control"  id="vendue"  name="image"  value="{{$produit->image}}">
            </div>

            <div class="mb-3">
                <label for="telephoneFournisseur" class="form-label">FOURNISSEUR</label>
                <select name="fournisseur_id" class="form-select" id="" required>
                  <option value="{{optional($produit)->fournisseur_id}}">{{optional($produit->fournisseur)->nom}}</option>
                    @foreach ($fournisseurAll as $user)
                    <option value="{{$user->id}}">{{$user->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="telephoneFournisseur" class="form-label">CATEGORIE</label>
                <select name="categorie_id" class="form-select" id="" required>
                  <option value="{{optional($produit)->categorie_id}}">{{optional($produit->categorie)->categorie}}</option>
                    @foreach ($categorie as $cat)
                    <option value="{{$cat->id}}">{{$cat->categorie}}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" class="form-control"  id="vendue"  name="id"  value="{{$produit->id}}">
            <button type="submit" class="btn btn-primary">MISE A JOUR</button>

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
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
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
