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

  <title>VENTES MISE A JOUR</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('layouts.link')

</head>

<body>

  <!-- ======= Header ======= -->

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

                                <h6 class="">PRODUIT : {{$ventesUpdate->produit->designation}}</h6>
                                <h6 class="">PRiX : {{$ventesUpdate->prix_marchande}}</h6>
                                <h6 class="">QUANTITE  : {{$ventesUpdate->qte_vendue}}</h6>
                                <h6 class="">DATE-DE-CREATION: {{$ventesUpdate->date_creation}}</h6><br>


                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                <h3 class="card-title">MODIFICATIONS DES INFORMATIONS DE LA VENTES</h3>
                                    <form method="post" action="{{route('update.vente.informations')}}" >
                                         @csrf
                                         @method('post')
                              <div class="mb-3">
                                  <br>
                                  <span id="renvoie"></span>
                                  <label for="adresseFournisseur" class="form-label">PRODUIT</label>
                                   <select name="produit_id" id="form-select" class="">
                                     <option value="{{$ventesUpdate->produit_id}}"> {{$ventesUpdate->produit->designation}}</option>
                                     @foreach($produitAll as $produit)
                                     <option value="{{$produit->id}}">{{$produit->designation}}</option>
                                     @endforeach
                                   </select>
                              </div>

                        <div class="mb-3">
                            <br>
                            <span id="renvoie"></span>
                            <label for="adresseFournisseur" class="form-label">Quantité</label>
                            <input type="number"  id="vendue" class="form-control"  name="qte_vendue" value="{{$ventesUpdate->qte_vendue}}" min="1" >
                        </div>
                    <div class="mb-3">

                        <label for="adresseFournisseur" class="form-label">PRIX-MARCHANDE</label>
                        <input type="number" class="form-control"  id="vendue"    name="prix_marchande" value="{{$ventesUpdate->prix_marchande}}">
                    </div>

                <input type="hidden"  id="vendue" class="form-control"  name="id"  value="{{$ventesUpdate->id}}">


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

 @include('layouts.footer')
  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>

</body>
</html>
