<!DOCTYPE html>
<html lang="en">
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
      <h1></h1>
      <nav>

      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">LISTES DES COMMANDES</h5>


              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajoutFournisseurModal">
                              Faire une commandes
                            </button>
            
              <!-- End Table with stripped rows -->
              @include('commandes.components.listes')

                 @include('commandes.components.forms')

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

      Designed by <a href="#">mapangounzigoudaniellevy@gmail.com</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @include('layouts.footer')


  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>

 <script>
  function confirme(){
    let confirme = confirm("Etes vous sur de vouloir supprimer");
    if (!confirme) {
      event.preventDefault(); // Assurez-vous de passer l'événement en tant que paramètre
    }
  }
  function valider(){
    let confirme = confirm("Valider la commandes ... ?");
    if (!confirme) {
      event.preventDefault(); // Assurez-vous de passer l'événement en tant que paramètre
    }
  }
 </script>
<script>
        function afficherFormulaire() {
            // Affiche le formulaire en changeant le style pour le rendre visible
            var formulaire = document.getElementById('formulaireAjoutFournisseur');
            formulaire.style.display = formulaire.style.display === 'none' ? 'block' : 'none';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @if (session('error'))
  <script >
    alert('Commandes à échouée');
  </script>
  @endif
  @if(session('success'))
  <script >
    alert('Commandes effectué avec success');
  </script>
  @endif

</script>

  </body>
</html>
