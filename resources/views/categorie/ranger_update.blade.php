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

  <title>DETAILS-RANGER</title>
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
              <h5 class="card-title">DETAILS DE RANGER </h5>
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajoutFournisseurModal">
                                Modification
                            </button>
                            <div class="modal fade" id="ajoutFournisseurModal" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <form action="{{route('update.ranger')}}" method="post">
                                            
                                            @csrf
                                            @method('post')
                                            <label for="">Nouvelle Ranger</label>
                                            <input type="text" name="ranger_name" value="{{$ranger->ranger_name}}" required>
                                            <input type="hidden" name="id" value="{{$ranger->id}}" >
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
                
                
                  </tr>
                </thead>
                <tbody>
                     
                    <th scope="row">{{$ranger->id}}</th>
                    <td>{{$ranger->ranger_name}}</td>
                    <td>{{$ranger->date_creation}}</td>
                    <td>{{$ranger->date_update}}</td>
                     
                  </tr>
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

  <!-- ======= Footer ======= -->
  @include('layouts.footer')

 