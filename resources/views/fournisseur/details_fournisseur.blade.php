<!DOCTYPE html>
<html lang="en">

<style>
        .user-card {
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
            text-align: center;
        }

        .user-image {
            max-width: 95%;
            height: auto;
            border-radius: 90%;
        }
        /* Ajoutez vos styles personnalisés ici */

/* Exemple de style minimal pour le formulaire */
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input,
select {
    width: 50%;
    padding: 3px;
    box-sizing: border-box;
    margin-bottom: 5px;
}

button {
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

    </style>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DETAILS FOURNISSEUR</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('layouts.link')

</head>

<body>

  <!-- ======= Header ======= -->

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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="user-card">
                                <img class="user-image" src="{{ asset('storage/'. $fournisseur->profile) }}" alt="Photo de l'utilisateur">
                                <h6 class="">NOM : {{$fournisseur->nom}}</h6>
                                <h6 class="">PRENOM : {{$fournisseur->prenom}}</h6>
                                <h6 class="">TELEPHONE : {{$fournisseur->tel}}</h6>
                                <h6 class="">EMAIL: {{$fournisseur->email}}</h6><br>
                                <h6 class="">ADRESSE : {{$fournisseur->adresse}}</h6>
                            
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                <h3 class="card-title">MODIFICATIONS DES INFORMATIONS DU FOURNISSEURS</h3>
                                    <form method="post" action="{{route('modification_fournisseur')}}" enctype="multipart/form-data">
                                         @csrf 
                                         @method('post')
                              <div class="mb-3">
                                  <br>
                                  <span id="renvoie"></span>
                                  <label for="adresseFournisseur" class="form-label">NOM</label>
                                  <input type="text"  id="vendue" class="form-control"  name="nom"  value="{{$fournisseur->nom}}">
                              </div>
                                          
                        <div class="mb-3">
                            <br>
                            <span id="renvoie"></span>
                            <label for="adresseFournisseur" class="form-label">PRENOM</label>
                            <input type="text"  id="vendue" class="form-control"  name="prenom" value="{{$fournisseur->prenom}}" >
                        </div> 
                    <div class="mb-3">
                        
                        <label for="adresseFournisseur" class="form-label">EMAIL</label>
                        <input type="email" class="form-control"  id="vendue"   name="email" value="{{$fournisseur->email}}">
                    </div> 
            <div class="mb-3">
                
                <label for="adresseFournisseur" class="form-label">TEL</label>
                <input type="text"  id="vendue" class="form-control"  name="tel"  value="{{$fournisseur->tel}}">
            </div> 
            <div class="mb-3">
                <br>
                <span id="renvoie"></span>
                <label for="adresseFournisseur" class="form-label">IMAGE</label>
                <input type="file" class="form-control"  id="vendue"  name="profile"  value="{{$fournisseur->profile}}">
            </div>
             <div class="mb-3">
                <br>
                <span id="renvoie"></span>
                <label for="adresseFournisseur" class="form-label">ADRESSE</label>
                <input type="text" class="form-control" class="form-control"  id="vendue"  name="adresse"  value="{{$fournisseur->adresse}}">
            </div>
             
   
            <input type="hidden" class="form-control"  id="vendue"  name="id"  value="{{$fournisseur->id}}">
            <button type="submit" class="btn btn-primary">MISE A JOUR</button>

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
  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>
 
</body>
</html>