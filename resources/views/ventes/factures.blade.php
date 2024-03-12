<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Factures</title>
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
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        @include('layouts.header')
    </header>
    <aside id="sidebar" class="sidebar">
        @include('layouts.sidebar')
    </aside>

    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    

                    <div class="modal fade" id="ajoutFournisseurModal" tabindex="-1"
                        aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <form id="form" action="{{ route('addProduct.to.Factures') }}" method="post">
                                        @csrf
                                        <div>
                                            <h4>{{$matricule}}</h4>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <label for="">Date</label>
                                                <label for="">Produit</label>
                                                <select name="produit_id" id="produit"
                                                    class="form-select form-select-sm">
                                                    @foreach($produit as $prod)
                                                    <option value="{{ $prod->id }}">Designation :
                                                        {{ $prod->designation }} | Prix : {{ $prod->prix_vente }} | Quantité |
                                                        {{ $prod->qteStock }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="mb-3">
                                                    <label for="">Prix</label>
                                                    <input type="number" id="qte" name="prix_vendue"
                                                        class="form-control form-control-sm" value="0">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Quantité vendue</label>
                                                    <input type="number" id="qte" name="qte_vendue"
                                                        class="form-control form-control-sm" required>
                                                </div>
                                                <p>
                                                    <button class="btn btn-danger" id="ajouter">Ajouter</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add this table within the <body> section, where you want to display the selected products -->
                    <table id="selectedProductsTable" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Designation</th>
                                <th>Prix De vente</th>
                                <th>Quantité</th>
                                <th>Retirer</th>
                            </tr>
                        </thead>
                        <tbody>         
                            @foreach($panier as $item)
                            <tr>
                                <td>{{ $item['produit_id'] }}</td>
                                <td>{{ $item['designation'] }}</td>
                                <td>{{ $item['prix_vente'] }}</td>
                                <td>{{ $item['qte_vendue'] }}</td>
                                <td><a href="{{route('delete.product.panier',['id'=>$item['produit_id']])}}" class="btn btn-primary" onclick="return confirme()"><i class="bi bi-trash-fill"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#ajoutFournisseurModal">
                            Ajouter un Produit à la facture
                        </button>
                    <form action="{{ route('createFactureVentes') }}" method="post">
                        @csrf
                        <label for="">Date-de-Factures</label>
                        <input type="date" name="date" class="form-control form-control-sm" required>
                        <input type="hidden" value="{{ $matricule }}" name="matricule">
                        <button class="btn btn-dark">Valider la vente</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
 



   @include('layouts.footer')
   <script>
    function confirme() {
        // Utilisez return pour prendre en compte la valeur retournée par confirm
        return confirm("Êtes-vous sûr ?");
    }
   
</script>
</body>

</html>
