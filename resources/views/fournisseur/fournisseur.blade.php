<!DOCTYPE html>
<html lang="en">

<style>
    img {
        width: 50px; /* You can adjust the width as needed */
        height: auto; /* Maintain the aspect ratio */
    }
</style>

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


                                @include('fournisseur.components.listes')

                            <!-- Formulaire d'ajout de fournisseur -->
                             @include('fournisseur.components.forms')
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
