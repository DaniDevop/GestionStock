<!DOCTYPE html>
<html lang="fr">
@include('layouts.link')

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        @include('layouts.header')
    </header>

    <aside id="sidebar" class="sidebar">
        @include('layouts.sidebar')
    </aside>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="text-primary">🛒 Produits en Stock : {{ $nombreProduit }}</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">📋 Liste des Produits</h5>

                            <div class="d-flex justify-content-between mb-3">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#ajoutProduitModal">
                                    ➕ Ajouter un Produit
                                </button>

                                <form action="{{ route('recherche.produit') }}" method="GET" class="d-flex">
                                    @csrf
                                    <input type="text" name="search" class="form-control me-2"
                                        placeholder="🔍 Rechercher un produit" required>
                                    <button class="btn btn-info">Rechercher</button>
                                </form>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @include('produit.components.listes')

                            
                            <div class="d-flex justify-content-center">
                                {{ $produit->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal d'ajout de produit -->
               @include('produit.components.forms')

            </div>
        </section>
    </main>

    @include('layouts.footer')
</body>
</html>
