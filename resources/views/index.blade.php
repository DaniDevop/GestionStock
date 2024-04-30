<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Acceuil</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">


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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
          <li class="breadcrumb-item active">Date : {{$dateConnexion}}</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div>
                @if(count($produitStock)<0)
                <span style="color:blue;"> <h4>Aucun Message</h4> </span>
                <img src="{{ asset('/images/message.png') }}" alt="Profile" class="rounded-circle">
                @else
                <span style="color:red;"> <h4>Nom de produit en rupture {{count($produitStock)}} </h4> </span>
                <img src="{{ asset('/images/error.png') }}" alt="Profile" class="rounded-circle"><br>
                <a href="{{route('recherche.produit.stock')}}"> <span style="color: blue">Details</span></a>
                @endif

            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                </div>

                <div class="card-body">
                  <h5 class="card-title">Photocopies</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <a href="#"><i class="bi bi-cup-hot-fill"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span>


                    </div>
                      <ol>
                       <li><button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ajoutPhotocopie"><span>Photocopie</span></button></li><br>
                      <li><button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ajoutImpression"><span>Impression</span></button></li><br>
                       <li><button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#ajoutScanner"><span>Scanner</span></button></li><br>
                       <li><button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#ajoutPlastifier"><span>Plastification</span></button></li><br>
                       <li><button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#ajoutReliure"><span>Reliure</span></button></li><br>

                      </ol>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                </div>

                <div class="card-body">

                  <h5 class="card-title">Rapport Journalier</h5>
                    <a href="{{route('rapport.application')}}" class="btn btn-primary"><i class="bi bi-journal-medical"></i></a>

                  <div class="d-flex align-items-center">
                    </div>
                    <h4>Rapport avec Date</h4>
                    <div class="ps-3">
                        <form action="{{route('rapport.date.application')}}" method="GET">
                        @csrf
                         <label>Date</label>
                            <input type="text" name="date" value="{{ date('Y-m-d') }}" required class="form-control"><br>
                            <p>
                            <button class="btn btn-success">Valider</button>
                            </p>
                        </form>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                </div>

                <div class="card-body">
                  <h5 class="card-title">Ventes Produit</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                     <a href="#"><i class="bi bi-currency-exchange"></i></a>

                    </div>
                    <div class="ps-3">

                    </div>
                    <p>
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajoutVentes" >Cliquer</button>

                    </p>

                  </div>

                  </div>



                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                </div>

                       <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li>Ajouter une prod</li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Produit retournée <span> | Nombre :</span>{{$backProduitCount}}</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Numéro</th>
                        <th scope="col">Produit</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Motif</th>
                        <th scope="col">Date-creation</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($backProduitAll as $back)
                      <tr>
                        <th scope="row"><a href="#">{{$back->id}} </a></th>
                        <td><a href="#" class="text-primary fw-bold">{{$back->produit->designation}}</a></td>
                        <td>{{$back->qte_entrant}}</td>
                        <td class="fw-bold">{{$back->motif}}</td>
                        <td>{{$back->date_creation}}</td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->


            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                </div>

                <div class="card-body">
                  <h5 class="card-title">Ventes de Produits  :<span></span></h5>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Entrer jour
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Revenue</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
         @foreach($productDate as $produc)
         <li>{{$produc->sommes_produits }}-FCFA</li>
         @endforeach
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 <table class="table table-borderless datatable">
    <thead>
        <tr>
            <th scope="col">Product</th>
            <th scope="col">Prix</th>
            <th scope="col">Date-ventes</th>
            <th scope="col">Quantité vendue</th>
            <th scope="col">Quantité-stock</th>
            <th scope="col">Annulation</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventes as $vente)
        <tr x-data="{ showModal: false, venteId: {{$vente->id}}, motif: 'Aucun', qteRetourner: '{{$vente->qte_vendue}}' }">
            <th scope="row"><a href="#">#{{optional($vente)->produit->designation}}</a></th>
            <td>{{optional($vente)->prix_marchande}}</td>
            <td>{{optional($vente)->date_creation}}<a href="#" class="text-primary"></a></td>
            <td>{{optional($vente)->qte_vendue}}</td>
            <td><span class="badge bg-success">{{optional($vente->produit)->qteStock}}</span></td>
            <td>
                <span class="badge bg-success">
                    <button  class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#retourProduit" onclick="fillFormFields({{ $vente->id }}, {{ $vente->qte_vendue }})">
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </span>

                <!-- Modal pour l'annulation de vente -->
                  <div class="modal fade" id="retourProduit" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                      </div>
                                      <div class="modal-body">
                                    <form action="{{route('return_ventes_simple.stock')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                        <h4>Annulation de ventes</h4>
                                            <label for="motif">Motif</label>
                                            <input x-model="motif" type="text" class="form-control" name="motif">
                                        </div>
                                        <div class="mb-3">
                                            <label for="qte_retourner">Quantité retournée</label>
                                            <input id="qteRetourner" class="form-control" type="text" name="qte_retourner">
                                        </div>
                                                <input type="hidden" name="id" id="id_ventes">

                                        <button type="submit" class="btn btn-info">Valider</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li>Ajouter une prod</li>
                  </ul>
                </div>



                <div class="card-body pb-0">
                  <h5 class="card-title">IMPRESSION : {{$impressionCount}}<span></span></h5>
           <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Details impressions
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Impression</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
         @foreach(optional($impressionDate) as $impression)
         <li>{{$impression->sommes_impression}} FCFA</li>
         @endforeach
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Taille</th>
                        <th scope="col">Couleur</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Quantité-vendue</th>
                        <th scope="col">Date-creation</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach( $impressionAll as $impression)
                      <tr>
                        <th scope="row"><a href="#">{{optional($impression)->type_impression}} </a></th>
                        <td><a href="#" class="text-primary fw-bold">{{optional($impression)->taille}}</a></td>
                        <td>{{optional($impression)->couleur}}</td>
                        <td class="fw-bold">{{optional($impression)->prix}}</td>
                        <td>{{optional($impression)->qte_vendue}}</td>
                        <td>{{$impression->date_creation}}</td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>



      </div>
    </section>

  </main><!-- End #main -->

  <div class="modal fade" id="ajoutImpression" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="card-body">
            <h5 class="card-title">Effectuer une Impression</h5>
            <form method="post" action="{{route('simple_ impression.data')}}">
              @csrf
              <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">Page</label>
                <select name="page" id="" class="form-select">
                  <option value="A3">A3</option>
                  <option value="A4">A4</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">Type</label>
                <select name="couleur" id="" class="form-select">
                  <option value="Noir">Noir</option>
                  <option value="Couleur">Couleur</option>
                  <option value="Cartonnee">Cartonnée</option>
                  <option value="Autant-collant">Autant-collant</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Prix-marchandé</label>
                <input type="number" class="form-control" id="emailFournisseur" name="prix_marchande" value="0">

              </div>

              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Quantité à imprimer</label>
                <input type="number" class="form-control" id="emailFournisseur" name="qte_entrant" min="1" required>
              </div>

              <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ajoutPhotocopie" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="card-body">
            <h5 class="card-title">Effectuer une Photocopie</h5>
            <form method="post" action="{{route('simple_photocopies')}}">
              @csrf
              <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">Page</label>
                <select name="page" id="" class="form-select">
                  <option value="A3">A3</option>
                  <option value="A4">A4</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">Type</label>
                <select name="couleur" id="" class="form-select">
                  <option value="Noir">Noir</option>
                  <option value="Couleur">Couleur</option>

                </select>
              </div>

              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Prix-marchandé</label>
                <input type="number" class="form-control" id="emailFournisseur" name="prix_marchande" value="0">
              </div>

              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Quantité à imprimer</label>
                <input type="number" class="form-control" min="1" id="emailFournisseur" name="qte_entrant" required>
              </div>

              <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ajoutScanner" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="card-body">
            <h5 class="card-title">Effectuer un Scanner</h5>
            <form method="post" action="{{route('simple.scanner')}}">
              @csrf
              <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">Page</label>
                <select name="page" id="" class="form-select">
                  <option value="A3">A3</option>
                  <option value="A4">A4</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">Type</label>
                <select name="couleur" id="" class="form-select">
                  <option value="Noir">Noir</option>
                  <option value="Couleur">Couleur</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Prix-marchandé</label>
                <input type="number" class="form-control" id="emailFournisseur" name="prix_marchande" value="0">
              </div>

              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Quantité à imprimer</label>
                <input type="number" min="1" class="form-control" id="emailFournisseur" name="qte_entrant" required>
              </div>

              <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ajoutReliure" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="card-body">
            <h5 class="card-title">Effectuer une Reliure</h5>
            <form method="post" action="{{route('simple_impression.reliure')}}">
              @csrf
              <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">Page</label>
                <select name="page" id="" class="form-select">
                  <option value="A3">A3</option>
                  <option value="A4">A4</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">Type</label>
                <select name="couleur" id="" class="form-select">
                  <option value="Spirale">Spirale</option>
                  <option value="Baguette">Baguette</option>

                </select>
              </div>

              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Prix-marchandé</label>
                <input type="number" class="form-control" id="emailFournisseur" value="0" name="prix_marchande">
              </div>

              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Quantité à imprimer</label>
                <input type="number" class="form-control" id="emailFournisseur" name="qte_entrant" required>
              </div>

              <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ajoutPlastifier" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="card-body">
            <h5 class="card-title">Effectuer une Plastification</h5>
            <form method="post" action="{{route('simple_plastification')}}">
              @csrf
              <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">Page</label>
                <select name="page" id="" class="form-select">
                  <option value="A3">A3</option>
                  <option value="A4">A4</option>
                  <option value="A6">A6</option>
                </select>
              </div>



              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Prix-marchandé</label>
                <input type="number" class="form-control" id="emailFournisseur" value="0" name="prix_marchande">
              </div>

              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Quantité à imprimer</label>
                <input type="number" min="1" class="form-control" id="emailFournisseur" name="qte_entrant" required>
              </div>

              <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


     <div class="modal fade" id="ajoutVentes" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="card-body">
            <h5 class="card-title">Ventes Produits</h5>
            <form method="post" action="{{route('ventes_simple.stock')}}">
              @csrf

              <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">Recherche</label>
                <input type="text" name="search" id="searchInput">
              </div>


              <div class="mb-3">
                <label for="adresseFournisseur" class="form-label">Produit</label>

                <select name="produit_id" id="product_select" class="form-select"></select>

              </div>


              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Prix-marchandé</label>
                <input type="number" class="form-control" id="emailFournisseur" value="0" name="prix_marchande">
              </div>

              <div class="mb-3">
                <label for="emailFournisseur" class="form-label">Quantité</label>
                <input type="number" class="form-control" id="emailFournisseur" name="qte_vendue" required>
              </div>

              <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  @include('layouts.footer')

<script>



let dataArray;

async function getProduct(){

    const myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");


const requestOptions = {
  method: "GET",
  headers: myHeaders,
  redirect: "follow"
};

const res= await fetch("http://127.0.0.1:8000/produit/produitAll", requestOptions)

const response=await res.json();
if(res.ok){
    console.log(response)
    return response;
}

}
const productSelect = document.getElementById("product_select");

getProduct().then(data=>{
    dataArray=data;

})

document.addEventListener("DOMContentLoaded", () => {
    getProduct().then(data => {
        dataArray = data;

        const productSelect = document.getElementById("product_select");
        const searchInput = document.getElementById("searchInput");

        // Fonction de mise à jour des options du select en fonction de la recherche
        function updateOptions(searchValue) {
            // Effacez les options existantes
            productSelect.innerHTML = '';

            // Affichez toutes les options si aucun texte n'est saisi
            if (!searchValue) {
                dataArray.produitAll.forEach(product => {
                    const option = document.createElement("option");
                    option.value = product.id;
                    option.textContent = `${product.designation} | Prix : ${product.prix_vente} | Quantité : ${product.qteStock}`;
                    productSelect.appendChild(option);
                });
            } else {
                // Filtrer et afficher les options correspondant à la recherche
                dataArray.produitAll.forEach(product => {
                    if (product.designation.toLowerCase().includes(searchValue)) {
                        const option = document.createElement("option");
                        option.value = product.id;
                        option.textContent = `${product.designation} | Prix : ${product.prix_vente} | Quantité : ${product.qteStock}`;
                        productSelect.appendChild(option);
                    }
                });
            }
        }

        // Ajoutez un événement input au champ de recherche pour détecter les changements de valeur
        searchInput.addEventListener("input", () => {
            const searchValue = searchInput.value.trim().toLowerCase();
            updateOptions(searchValue);
        });

        // Chargez toutes les options au chargement initial de la page
        updateOptions('');
    });
});

      function fillFormFields(id,quantity){
        document.getElementById('id_ventes').value = id;
        document.getElementsByName('qte_retourner')[0].value = quantity;
      }

</script>


</body>

</html>
