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

  <title>RANGER</title>
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
      <nav>
      
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
      
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">LISTES DES RANGER </h5>
              <h5 class="card-title" >NOMBRE DE RANGER : {{$rangerNumber}}</h5>
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajoutFournisseurModal">
                                Ajouter une Ranger
                            </button>
                            <div class="modal fade" id="ajoutFournisseurModal" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <form action="{{route('ajouter_ranger')}}" method="post">
                                            
                                            @csrf
                                            @method('post')
                                            <label for="">Nouvelle Ranger</label>
                                            <input type="text" name="ranger_name" required>
                                            <button type="submit" class="btn btn-dark">Valider</button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                
               <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Position</th>
                    <th scope="col">Date création</th>
                    <th scope="col">Date Mise à jour</th>
                    <th scope="col">Details</th>
                    <th scope="col">Supprimer</th>
                
                  </tr>
                </thead>
                <tbody>
                     @foreach($ranger as $rang)
                    <th scope="row">{{$rang->id}}</th>
                    <td>{{$rang->ranger_name}}</td>
                    <td>{{$rang->date_creation}}</td>
                    <td>{{$rang->date_update}}</td>
                      <td>
                <a href="{{route('details.ranger',['id'=>$rang->id])}}" class="btn btn-info"><i class="bi bi-pencil-fill"></i></button>
                      </td>
                        <td>
                <a onclick="confirme();" href="{{route('delete.ranger',['id'=>$rang->id])}}" class="btn btn-dark"><i class="bi bi-trash-fill"></i></button>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        
    </div>
  </div>
</div>




 


            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
<script >
   function confirme(){
    let confirme = confirm("Etes vous sur de vouloir supprimer");
    if (!confirme) {
      event.preventDefault(); // Assurez-vous de passer l'événement en tant que paramètre
    }
  }
</script>
  <!-- ======= Footer ======= -->
  @include('layouts.footer')

 