<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Listes des commandes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 @include('layouts.link')



  @livewireStyles

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
                <table class="table datatable">


                <thead>
                  <tr>
                    <th scope="col">References</th>
                    <th scope="col">Quantité entrant</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Fournisseur</th>
                    <th scope="col">Date échances</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Details</th>
                    <th scope="col">Valider</th>
                    <th scope="col">Supprimer</th>

                  </tr>
                </thead>
                <tbody>
                <tr>
                     @foreach($commandes as $command)
                    <td> <span style="color:blue;">{{$command->reference}}</span> </td>
                    <td>{{$command->qte_entrant}}</td>
                    <td>{{$command->produit->designation}}</td>
                    <td>{{ optional(optional($command->produit)->fournisseur)->nom }}</td>
                    @if(date('Y-m-d') >= $command->date_commandes)
                    <td ><span style="color:red;">{{$command->date_commandes}}/
                     Date dépassé
                  </span></td>
                    @else
                    <td ><span style="color:blue;">{{$command->date_commandes}}</span></td>
                    @endif
                    <td ><span style="color:blue;">{{$command->statut}}</span></td>
                    <td ><a  href="{{route('details_commandes.view',['id'=>$command->id])}}" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a></td>
                    <td ><a onclick="valider()" href="{{route('commandes_valide',['id'=>$command->id])}}" class="btn btn-dark"><i class="bi bi-bookmark-check-fill"></i></a></td>
                    <td ><a  onclick="confirme()"  href="{{route('delete_commandes',['id'=>$command->id])}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              <div class="modal fade" id="ajoutFournisseurModal" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                <div class="card-body">
                                    <h5 class="card-title">EFFECTUER UNE COMMANDES</h5>
                                    <form  method="post" action="{{route('commandes_new_commandes_produits')}}">
                                        @csrf


                          <div class="mb-3">
                              <label for="adresseFournisseur" class="form-label">DATE DE LA COMMANDES</label>
                              <input type="date" class="form-control" id="adresseFournisseur" name="date_commandes" required>
                          </div>
                          <div class="mb-3">
                              <label for="adresseFournisseur" class="form-label">PRODUITS</label>
                              <select name="produit_id" id="" class="form-select">
                                  @foreach($produits as $product)
                                  <option value="{{$product->id}}">{{$product->designation}} |Stock-Actuel : {{$product->qteStock}}</option>
                                  @endforeach
                              </select>

                              </div>

                              <div class="mb-3">
                                  <label for="emailFournisseur" class="form-label">QUANTITE ENTRANT</label>
                                  <input type="number" class="form-control" id="emailFournisseur" name="qte_entrant" required>
                              </div>

                                <input type="hidden" class="form-control" id="emailFournisseur" name="statut" value="Non valide" >

                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </form>
                                </div>
                            </div>
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

  <!-- Vendor JS Files -->
  <script src="/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/chart.js/chart.umd.js"></script>
  <script src="/vendor/echarts/echarts.min.js"></script>
  <script src="/vendor/quill/quill.min.js"></script>
  <script src="/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/vendor/tinymce/tinymce.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

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
@livewireScripts

  </body>
</html>
