<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('index') }}">
                <i class="bi bi-grid"></i>
                <span>Tableau de bord</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#fournisseurs-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-check-fill"></i><span>Fournisseurs</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="fournisseurs-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('listes_fournisseur') }}">
                        <span>Listes des fournisseurs</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Fournisseurs Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#produits-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bag-check"></i><span>Produit</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="produits-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('listes_produit') }}">
                        <i class="bi bi-circle"></i><span>Listes des produits</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Produits Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#categories-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-window-plus"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="categories-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('listes_categorie') }}">
                        <i class="bi bi-circle"></i><span>Listes des catégories</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Categories Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#commandes-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cart4"></i><span>Commandes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="commandes-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('suivis_commandes.listes') }}">
                        <i class="bi bi-circle"></i><span>Suivis des commandes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('listes_commandes') }}">
                        <i class="bi bi-circle"></i><span>Listes des commandes</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Commandes Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#sorties-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-currency-euro"></i><span>Factures</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="sorties-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('factures_vue') }}">
                        <i class="bi bi-circle"></i><span>Listes des Factures</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('produit_vente')}}">
                        <i class="bi bi-circle"></i><span>Créer une Factures</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Sorties Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#ranger-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-r-circle-fill"></i><span>Ranger</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ranger-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('listes.view_ranger_listes') }}">
                        <i class="bi bi-circle"></i><span>Listes des rangers</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Ranger Nav -->


         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#ranger-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-plus-fill"></i></i><span>Rapport</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ranger-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('listes_rapport.application') }}">
                        <i class="bi bi-circle"></i><span>Listes des rapports</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Ranger Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('register_users') }}">
                <i class="bi bi-person-gear"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

 
        
        
    </ul>
</aside>
