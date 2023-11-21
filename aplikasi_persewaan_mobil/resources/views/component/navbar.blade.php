<!--Navbar-->
<nav class="navbar fixed-top navbar-light navbar-expand-md bg-light justify-content-center">
    <div class="container">
        <a class="navbar-brand ms-4" href="{{ url('/beranda') }}">
            🚗Aplikasi Penyewaan Mobil
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
            <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
                <li class="nav-item">
                    <a class="nav-link text-secondary fw-bold" href="{{ url('dashboard') }}">Mobil Disewakan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary fw-bold" href="{{ url('/artikel') }}">Daftar Anda Sewa</a>
                </li>
                <span class="sectionWithVertcalLine"></span>
                <li class="nav-item">
                    <a class="nav-link text-secondary fw-bold" href="{{ url('/buatsewa') }}">Sewakan Mobil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-secondary fw-bold dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf    
                        <button type="submit" class="btn btn-light text-center dropdown-menu dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
                                <b class="text-white">Logout</b>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
