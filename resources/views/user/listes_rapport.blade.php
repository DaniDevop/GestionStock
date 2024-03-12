<!DOCTYPE html>
<html lang="en">

<style>
    img {
        width: 50px; /* You can adjust the width as needed */
        height: auto; /* Maintain the aspect ratio */
    }
</style>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>LISTES DES FOURNISSEUR</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Favicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="/img/favicon.png" rel="icon">
    <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

 
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
            <h1>LISTES DES RAPPORTS</h1>
            <nav>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Listes des Rapports</h5>
                            
                                  <form action="{{route('creation.rapport')}}">
                                  <label>Date Rapport</label>
                                  <input type="text" name="date" value="{{date('Y-m-d')}}" class="form-control">
                                    <button type="submit" class="btn btn-success">Creer un Rapport</button>
                                  </form>
                                <div class="card-body">
    

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Numéro</th>
                                        <th scope="col">Somme-Total</th>
                                        <th scope="col">Somme-sorties</th>
                                        <th scope="col">Somme-produit</th>
                                        <th scope="col">Somme-impression</th>
                                        <th scope="col">Somme-mois</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($rapportAll as $rapport)
                                        <th scope="row">{{$rapport->id}}</th>
                                        <td>{{$rapport->somme_total}} FCFA</td>
                                        <td>{{$rapport->total_sorties}} FCFA</td>
                                        <td>{{$rapport->total_produit}} FCFA</td>                                                                           
                                        <td>{{$rapport->total_impression}} FCFA</td>
                                        <td>{{$rapport->total_month}} FCFA</td>
                                        <td>{{$rapport->date_creation}}</td>
                                            <td><button class="btn btn-dark"
                                                ><a onclick="confirmer()"
                                                    href="{{route('delete.rapport',['id'=> $rapport->id])}}"><i
                                                        class="bi bi-trash3"></i></button></td>
                                    </tr>
                                    </tr>
                                    @endforeach             
                                </tbody>
                            </table>
                            <!-- Formulaire d'ajout de fournisseur -->
                            
                            </div>
                        </div>
                    </div>
        </section>
    </main>

   @include('layouts.footer')

    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function afficherFormulaire() {
            // Affiche le formulaire en changeant le style pour le rendre visible
            var formulaire = document.getElementById('formulaireAjoutFournisseur');
            formulaire.style.display = formulaire.style.display === 'none' ? 'block' : 'none';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
<script >
   function confirmer(){
    let confirme = confirm("Etes vous sur de vouloir supprimer");
    if (!confirme) {
      event.preventDefault(); // Assurez-vous de passer l'événement en tant que paramètre
    }
  }
</script>
</html>
