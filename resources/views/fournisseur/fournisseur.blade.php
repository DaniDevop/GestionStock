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
            <h1>LISTES DES FOURNISSEUR</h1>
            <nav>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Listes des fournisseurs</h5>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajoutFournisseurModal">
                                Ajouter Fournisseur
                            </button>
                                <a href="{{route('imprimer.fournisseur')}}" class="btn btn-primary"><i class="bi bi-printer-fill"></i></a>  
                                
                                <div class="card-body">


                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Numéro</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($fournisseur as $user)
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->nom}}</td>
                                        <td>{{$user->prenom}}</td>
                                        <td>{{$user->tel}}</td>
                                        <td><a href="{{route('show_details_fournisseur', ['id' => $user->id]) }}"
                                                class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
                                        <td><button class="btn btn-dark"
                                                ><a onclick="confirmer()"
                                                    href="{{route('delete.fournisseur',['id'=> $user->id])}}"><i
                                                        class="bi bi-trash3"></i></button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Formulaire d'ajout de fournisseur -->
                            <div class="modal fade" id="ajoutFournisseurModal" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ajoutFournisseurModalLabel">Ajouter un Fournisseur</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Votre formulaire d'ajout de fournisseur -->
                                            <form action="{{ route('fournisseur_create') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Nom</label>
                                                    <input type="text" name="nom" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Prenom</label>
                                                    <input type="text" name="prenom" class="form-control" required>
                                                </div>  
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Téléphone</label>
                                                    <input type="text" name="tel" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Profile</label>
                                                    <input type="file" name="profile" class="form-file"  >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Adresse</label>
                                                    <input type="text" name="adresse" class="form-control" >
                                                </div>                           
                                                
                                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
