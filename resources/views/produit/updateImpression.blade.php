<!DOCTYPE html>
<html lang="en">

<style>
    img {
        width: 50px;
        /* You can adjust the width as needed */
        height: auto;
        /* Maintain the aspect ratio */
    }
</style>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DETAIL IMPRESSION</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>

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
            <h1>NOMBRES DES PRODUITS EN STOCKS : {{ $nombreProduit }}</h1>
            <nav>

            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">




                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">DETAILS IMPRESSION</h5>

                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#ajoutFournisseurModal">
                                Ajouter un Produit
                            </button>

                            <table class="table">
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
                               = <tbody>
                                    @foreach( $impressionAll as $impression)
                                    <tr>
                                      <th scope="row"><a href="#">{{optional($impression)->type_impression}} </a></th>
                                      <td><a href="#" class="text-primary fw-bold">{{optional($impression)->taille}}</a></td>
                                      <td>{{optional($impression)->couleur}}</td>
                                      <td class="fw-bold">{{optional($impression)->prix}}</td>
                                      <td>{{optional($impression)->qte_vendue}}</td>
                                      <td>{{$impression->date_creation}}</td>
                                      <td><a href="" class="btn btn-info"><i class="bi bi-pen"></i></a></td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
                <!-- Modal for adding a new product -->

                            <div class="modal-body">
                                <form id="form" method="post" action="{{ route('new_product') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nomFournisseur" class="form-label">Couleur</label>
                                        <input type="text" class="form-control" id="nomFournisseur"
                                            name="couleur" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adresseFournisseur" class="form-label">Taille</label>
                                        <input type="number" class="form-control" id="adresseFournisseur"
                                            min="1" name="taille" value="{{optional($impression)->taille}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adresseFournisseur" class="form-label">Quantité-vendue</label>
                                        <input type="number" class="form-control" id="prix_vente" min="1"
                                            name="prix_vente" value="{{optional($impression)->qte_vendue}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adresseFournisseur" class="form-label"> Type</label>
                                        <select name="" id="">
                                            <option value="Photocopie"></option>
                                            <option value="Impression"></option>
                                            <option value=""></option>
                                            <option value=""></option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adresseFournisseur" class="form-label">SEUIL_ALERT</label>
                                        <input type="number" class="form-control" id="adresseFournisseur"
                                            min="1" name="seuil_alert" value="1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="emailFournisseur" class="form-label">IMAGE</label>
                                        <input type="file" class="form-control" id="emailFournisseur"
                                            name="image" accept="image/*">
                                    </div>

                                    <div class="mb-3">
                                        <label for="telephoneFournisseur" class="form-label">FOURNISSEUR</label>
                                        <select name="fournisseur_id" class="form-select" id="" required>
                                            <option value="null">Aucun</option>
                                            @foreach ($fournisseurAll as $user)
                                                <option value="{{ $user->id }}">{{ $user->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telephoneFournisseur" class="form-label">CATEGORIE</label>
                                        <select name="categorie_id" class="form-select" id="" required>
                                            <option value="null">Aucun</option>
                                            @foreach ($categorie as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->categorie }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">VALIDER</button>
                                </form>

                                    </div>
                                    </div>
        </section>
    </main>
    @include('layouts.footer')

    <script src="/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>




</html>
