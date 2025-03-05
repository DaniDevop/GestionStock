


<main>


<style>
        /* Styles du sidebar */
        .sidebar {
            width: 280px;
            height: 100vh;
            background: #f8f9fa; /* Fond clair */
            padding: 5px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            left: 0;
            top: 0;
            overflow-y: auto;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            font-size: 16px;
            padding: 10px;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .sidebar a:hover, .sidebar .nav-link.active {
            background: #007bff;
            color: white;
        }

        .sidebar img {
            width: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .sidebar .nav li {
            margin-bottom: 8px;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 18px;
        }

        /* Ajustement du contenu principal pour éviter que le sidebar cache tout */
        .content {
            margin-left: 300px;
            padding: 20px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
  <div class="b-example-divider"></div>

  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="{{route('index')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img src="{{asset('storage/images/logo.jpg')}}" alt="" width="50px">

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
        <a href="{{route('listes_rapport.application')}}" class="nav-link link-dark">
          <i class="bi bi-calendar-check"></i>
         Listes Rapports
        </a>
      </li>
    </ul>
    <hr>

  </div>


</main>

