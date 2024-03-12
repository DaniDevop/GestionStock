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
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CATEGORIE</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="/img/favicon.png" rel="icon">
    <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">
      <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Sep 18 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
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
                <select name="ranger_id" required>
                  <option value="null">Aucune</option>
                  @foreach($rangerAll as $ranger)
                  <option value="{{$ranger->id}}">{{$ranger->ranger_name}} </option>
                  @endforeach
                </select>
                <button type="submit" class="btn btn-dark">Ajouter</button>
              </form>

              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Date création</th>
                    <th scope="col">Date Mise à jour</th>
                    <th scope="col">Position</th>
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
                    <td>{{optional($cat->ranger)->ranger_name ? :'Aucune'}}</td>
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

        <div class="modal fade" :class="{ 'show': showModal }" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true" @click.away="showModal = false">
                      <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editCategoryModalLabel">Modifier la Catégorie</h5>
                      <button type="button" class="btn-close" @click="showModal = false" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Form for updating category -->
                      <form>
                        <div class="mb-3">
                          <label for="categoryName">Nom de la Catégorie</label>
                          <input x-model="categorie" type="text" class="form-control" id="categoryName" name="categoryName" required>
                        </div>
                              <div class="mb-3">
                                <select name="ranger_id" required>
                            @foreach($rangerAll as $ranger)
                            <option value="{{$ranger->id}}">{{$ranger->ranger_name}} </option>
                            @endforeach
                                  </select>
                              </div>

                        <input type="text" x-model="categorieId" name="categoryId">

                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
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