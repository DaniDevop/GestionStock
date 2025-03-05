  <!DOCTYPE html>
  <html lang="en">

  <style>
    /* Style pour les champs de saisie (input) */
  input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
    box-sizing: border-box;
  }

  /* Style pour les menus déroulants (select) */
  select {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
    box-sizing: border-box;
    /* Ajoutez une règle pour masquer la flèche de sélection par défaut dans certains navigateurs */
    appearance: none;
    -webkit-appearance: none;
    /* Ajoutez une règle pour ajouter une icône personnalisée à la place de la flèche de sélection */
    background-image: url('path/to/custom-arrow.png');
    background-position: right center;
    background-repeat: no-repeat;
    /* Ajoutez une marge à droite pour l'icône */
    padding-right: 25px;
  }

  /* Style pour les options dans le menu déroulant */
  select option {
    padding: 8px;
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
      <nav>

      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">LISTES DES CATEGORIE </h5>
              <h5 class="card-title">NOMBRE DE CATEGORIE : {{$categorieNumber}}</h5>
              <form action="{{route('ajouter_categorie')}}" method="post">

                @csrf
                @method('post')
                <label for="">Designation</label>
                <input type="text" name="categorie" required>
                <button type="submit" class="btn btn-dark">Ajouter</button>
              </form>

              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Date création</th>
                    <th scope="col">Date Mise à jour</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($categorie as $cat)
                  <tr x-data="{ showModal: false, categorieId: {{$cat->id}}, categorie:{{$cat->categorie}} }">
                    <th scope="row">{{$cat->id}}</th>
                    <td>{{$cat->categorie}}</td>
                    <td>{{$cat->date_creation}}</td>
                    <td>{{$cat->date_update ? :'Aucune-modification'}}</td>
                    <td>
                <a href="{{route('details.categorie',['id'=>$cat->id])}}" class="btn btn-info"><i class="bi bi-pencil-fill"></i></button>
                      </td>
                   <td>
        <a class="btn btn-dark" onclick="confirme();" href="{{ route('delete.categorie',['id'=>$cat->id]) }}">
            <i class="bi bi-trash-fill"></i>
        </a>
</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

        

      </div>
    </section>

  </main><!-- End #main -->


    @include('layouts.footer')

  </body>

<script >
   function confirme(){
    let confirme = confirm("Etes vous sur de vouloir supprimer");
    if (!confirme) {
      event.preventDefault(); // Assurez-vous de passer l'événement en tant que paramètre
    }
  }
</script>


  </html>