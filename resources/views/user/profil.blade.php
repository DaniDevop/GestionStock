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

  <title>Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="user-card">
                                <img class="img-thumbnail" src="{{ asset('storage/'. $userUpdate->profile) }}" alt="Photo de l'utilisateur">
                                <h6 class="">NOM : {{$userUpdate->name}}</h6>
                                <h6 class="">PRENOM: {{$userUpdate->prenom}}</h6><br>
                                <h6 class="">EMAIL: {{$userUpdate->email}}</h6>
                                <h6 class="">TEL : {{$userUpdate->tel}}</h6>
                                <form action="{{route('update.information.password')}}" method="post">
                                  @csrf

                              <div class="mb-3">
                            <br>
                            <span id="renvoie">Ancien mot de passe</span>
                            <input type="password"  id="vendue" class="form-control"   name="ancien_password">
                        </div>
                        <div class="mb-3">
                            <span id="renvoie">Nouveau Mot de passe</span>
                            <input type="password"  id="vendue" class="form-control"   name="newpassword"  >
                        </div>
                        <div class="mb-3">
                            <span id="renvoie">Confirmation-Nouveau-Mot-de-Passe</span>
                            <input type="password"  id="vendue" class="form-control"   name="renewpassword"  >
                        </div>
                         <input type="hidden" name="id" value="{{$userUpdate->id}}"/>
                              <button class="btn btn-dark">Mise à jour</button>
                            </form>
                            </div>

                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                <h3 class="card-title">MODIFICATIONS DES MES INFORMATIONS </h3>
                                                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="post" action="{{route('update.information.client')}}" enctype="multipart/form-data">
                                         @csrf
                                         @method('post')
                              <div class="mb-3">
                                  <br>
                                  <span id="renvoie"></span>
                                  <label for="adresseFournisseur" class="form-label">NOM</label>
                                  <input type="text"  id="vendue" class="form-control"  name="name"  value="{{$userUpdate->name}}">
                              </div>

                        <div class="mb-3">
                            <br>
                            <span id="renvoie"></span>
                            <label for="adresseFournisseur" class="form-label">PRENOM</label>
                            <input type="text"  id="vendue" class="form-control"   name="prenom" value="{{$userUpdate->prenom}}" >
                        </div>
                    <div class="mb-3">

                        <label for="adresseFournisseur" class="form-label">EMAIL</label>
                        <input type="email"  id="vendue" class="form-control"  name="email" value="{{$userUpdate->email}}">
                    </div>

            <div class="mb-3">
                <br>
                <span id="renvoie"></span>
                <label for="adresseFournisseur" class="form-label">IMAGE</label>
                <input type="file" class="form-control"  id="vendue"  name="profile"  value="{{$userUpdate->profile}}">
            </div>




            <input type="hidden"  name="id"  value="{{$userUpdate->id}}">
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
      var password = document.getElementById("yourPassword");
            var showPassword = document.getElementById("showPassword");

          showPassword.addEventListener("click", function(){
            console.log("Oui c'est bon")
             if(password.type ==="password"){
              password.type="text";
             }else{
              password.type="password"
             }
          });
</script>

</body>
</html>
