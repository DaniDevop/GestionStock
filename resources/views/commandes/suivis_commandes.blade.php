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
      <h1>NOMBRES DE COMMANDES VALIDER : {{ $commandesNumber}}</h1>
      <nav>
      
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">LISTES DES COMMANDES</h5>

               
                <table class="table datatable">
        
                  
                <thead>
                  <tr>
                    <th scope="col">References</th>
                    <th scope="col">Quantité entrant</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Fournisseur</th>
                    <th scope="col">Date D'entrée</th>
                    <th scope="col">Statut</th>
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
                    <td ><span style="color:green;">{{$command->date_commandes}}/
                    <td ><span style="color:blue;">{{$command->statut}}</span></td>
                    <td ><a  href="{{route('details_commandes.view',['id'=>$command->id])}}" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

 @include('layouts.footer')
  

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