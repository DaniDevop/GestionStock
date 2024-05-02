  <!-- ======= Header ======= -->

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('index')}}" class="logo d-flex align-items-center">
        <img src="{{asset('storage/images/logo.jpg')}}" alt="">
        <span class="d-none d-lg-block">Top office Store</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
     
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <span class="badge bg-primary badge-number"></span>
          </a><!-- End Notification Icon -->


        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">



        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">
          @auth
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('storage/'.Illuminate\Support\Facades\Auth::user()->profile) }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{Illuminate\Support\Facades\Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Illuminate\Support\Facades\Auth::user()->email}}</h6>
              <span>{{Illuminate\Support\Facades\Auth::user()->name}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('user.update.profile', ['id' => Illuminate\Support\Facades\Auth::user()->id]) }}">
                <i class="bi bi-person">Profile</i>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>



            <li>
              <form action="{{route('auth.logout')}}" method="GET">
                @csrf

              <a class="dropdown-item d-flex align-items-center" >
              </a>
              <button class="btn btn-danger"><span>Deconnexion</span></button>
            </li>
            </form>
            @endauth

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

