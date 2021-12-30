<nav class=" navbar-expand-lg navbar-light bg-success">
    <div class="container d-flex flex-column flex-lg-row justify-content-center">
        <div class="pr-5 d-flex justify-content-center mt-3">
            <a href="/home">
                <img src="/gambar/h.png" alt="" width="30" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white py-3 h4 px-lg-5" href="/paket">Paket</a>
                </li>


                @if (\Session::has('user'))
                <li class="nav-item">
                    <a class="nav-link text-white py-3 h4" href="/keranjang">Keranjang</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white py-3 h4" href="/log">Keranjang</a>
                </li>
                @endif

                @if (\Session::has('user'))
                <li class="nav-item">
                    <a class="nav-link text-white py-3 h4 px-lg-5" href="/dashboard-user">Dashboard</a>
                </li>
                @endif

            </ul>
            <span class="navbar-text d-flex py-3">
                @if (Session::has('user'))
                <a href="/logout"><button class="btn btn-danger ml-5" type="submit">Logout</button></a>
                @else
                <a href="/log"><button class="btn btn-danger ml-5" type="submit">Login</button></a>
                @endif
            </span>
        </div>
    </div>
</nav>