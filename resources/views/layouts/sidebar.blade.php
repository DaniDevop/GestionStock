<!doctype html>
<html lang="en">
  <head>




    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      .nav-pills .nav-link:hover {
  background-color: blue;
  color: white;
}
.nav-pills .nav-link:hover {
  background-color: rgb(178, 240, 229);
  color: white;
}



      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>


<main>



  <div class="b-example-divider"></div>

  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="{{route('index')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img src="{{asset('storage/images/logo.jpg')}}" alt="" width="50px">

      <span class="fs-4">Top office Strore</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">

      <li>
        <a href="{{route('index')}}"class="nav-link active">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="{{route('listes_commandes')}}" class="nav-link link-dark">
          <i class="bi bi-cart-check"></i>
          Commandes
        </a>
      </li>
      <li>
        <a href="{{route('listes_produit')}}" class="nav-link link-dark">
          <i class="bi bi-gift"></i>
          Products
        </a>
      </li>
      <li>
        <a href="{{route('listes_fournisseur')}}" class="nav-link link-dark">
          <i class="bi bi-person-arms-up"></i>
          Fournisseurs
        </a>

      <li>
        <a href="{{route('listes_categorie')}}" class="nav-link link-dark">
          <i class="bi bi-tags-fill"></i>
         Listes Categories
        </a>
      </li>

      <li>
        <a href="{{route('listes.view_ranger_listes')}}" class="nav-link link-dark">
          <i class="bi bi-table"></i>
         Listes Rangers
        </a>
      </li>
      <li>
        <a href="{{route('listes_rapport.application')}}" class="nav-link link-dark">
          <i class="bi bi-calendar-check"></i>
         Listes Rapports
        </a>
      </li>
    </ul>
    <hr>

  </div>


</main>

  </body>
</html>
