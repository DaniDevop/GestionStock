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

    <title>LISTES DES PRODUITS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

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
                            <h5 class="card-title">LISTES DES PRODUIT EN STOCK</h5>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#ajoutFournisseurModal">
                                Ajouter un Produit
                            </button>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Categorie</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Prix_d'achat</th>
                                        <th scope="col">Prix-de-vente</th>
                                        <th scope="col">Quantité en stock</th>
                                        <th scope="col">Ranger</th>
                                        <th scope="col">Seuil Alerte</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($produit as $product)
                                            <th scope="col">{{ optional($product->categorie)->categorie }}</th>
                                            <td>{{ $product->designation }}</td>
                                            <td>{{ $product->prix_achat }}</td>
                                            <td>{{ $product->prix_vente }}</td>
                                            <td>{{ $product->qteStock }}</td>
                                            <td>{{ optional(optional($product->categorie)->ranger)->ranger_name }}</td>

                                            <td>{{ $product->seuil_alert }}</td>
                                            @if ($product->qteStock < $product->seuil_alert)
                                                <td><span style="color:red;">Fair un approvisonnement</span> </td>
                                            @else
                                                <td> <span style="color:blue;">Stock stable</span></td>
                                            @endif
                                            <td><a href="{{ route('details_produit_vue', ['id' => $product->id]) }}"
                                                    class="btn btn-danger"><i class="bi bi-pencil-square"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- Modal for adding a new product -->
                <div class="modal fade" id="ajoutFournisseurModal" tabindex="-1"
                    aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">FORMULAIRE PRODUIT</h5>
                                <!-- ... (other modal header content) ... -->
                            </div>
                            <div class="modal-body">
                                <form id="form" method="post" action="{{ route('new_product') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nomFournisseur" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="nomFournisseur"
                                            name="designation" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adresseFournisseur" class="form-label">PRIX-ACHAT</label>
                                        <input type="number" class="form-control" id="adresseFournisseur"
                                            min="1" name="prix_achat" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adresseFournisseur" class="form-label">PRIX-VENTE</label>
                                        <input type="number" class="form-control" id="prix_vente" min="1"
                                            name="prix_vente" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adresseFournisseur" class="form-label">QUANTITE ENTRANT</label>
                                        <input type="number" class="form-control" id="adresseFournisseur"
                                            min="1" name="qteStock" value="1" required>
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
                    </div>
                </div>
            </div>
            </div>
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
