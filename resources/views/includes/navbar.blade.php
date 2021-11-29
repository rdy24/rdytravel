<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <div class="container">
    <a class="navbar-brand fs-2 fw-bolder" href="#">NAVBAR</a>
    <button
      class="navbar-toggler navbar-toogler-right"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto fw-bold pe-md-4">
        <li class="nav-item pe-md-2">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item pe-md-2">
          <a class="nav-link" href="#">Paket Travel</a>
        </li>
        <li class="nav-item dropdown pe-md-2">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            Services
          </a>
          <ul
            class="dropdown-menu"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>
        <li class="nav-item pe-md-2">
          <a class="nav-link" href="#">Testimonial</a>
        </li>
      </ul>
      
      @guest
      <!-- Mobile Button -->
      <form class="form-inline d-sm-block d-md-none">
        <button class="btn btn-login my-2 my-sm-0" type="button"
                onclick="event.preventDefault(); location.href='{{ url('login') }}';">
          Masuk
        </button>
      </form>

      <!-- Desktop Button -->
      <form class="form-inline my-2 my-lg-0 d-none d-md-block">
        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                onclick="event.preventDefault(); location.href='{{ url('login') }}';">
          Masuk
        </button>
      </form>
    @endguest

    @auth
    <!-- Mobile Button -->
        <form class="form-inline d-sm-block d-md-none" action="{{  url('logout') }}" method="POST">
            @csrf
            <button class="btn btn-login my-2 my-sm-0" type="submit">
                Keluar
            </button>
        </form>

        <!-- Desktop Button -->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{  url('logout') }}" method="POST">
            @csrf
            <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                Keluar
            </button>
        </form>
    @endauth
    </div>
  </div>
</nav>