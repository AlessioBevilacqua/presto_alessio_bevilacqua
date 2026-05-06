<nav class="navbar navbar-expand-lg fixed-top w-100">
    <div id="customNavbar"  class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fa-solid fa-dragon fa-2x"></i>
        </a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">Articoli</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item text-capitalize" href="{{ route('byCategory', $category) }}">{{ $category->name }}</a></li>
                        @if (!$loop->last)
                        <hr class="dropdown-divider">
                        @endif
                        @endforeach
                    </ul>
                </li>
                
            </ul>
        </div>
        
        <div class="d-flex navbar-nav d-none d-lg-block">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                @if (Auth::user()->is_revisor && \App\Models\Article::toBeRevisedCount() > 0)
                <span class="position-absolute top-0 start-0 my-1 translate-middle badge rounded-pill bg-danger">
                    {{ \App\Models\Article::toBeRevisedCount() }}
                </span>
                @endif
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('create.article') }}">Crea Articolo</a>
                    </li>
                    <hr class="dropdown-divider">
                    @if (Auth::user()->is_revisor)
                    <li>
                        <a class="dropdown-item" href="{{ route('revisor.index') }}">
                            @if (\App\Models\Article::toBeRevisedCount() > 0)
                            {{ \App\Models\Article::toBeRevisedCount() }} Articoli da revisionare
                            @else
                            Dashboard Revisore
                            @endif
                        </a>
                    </li>
                    <hr class="dropdown-divider">
                    @endif
                    <li>
                        <a class="dropdown-item fw-bolder" href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                    </li>
                    <form action="{{ route('logout') }}" id="form-logout" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </li>
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Login
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                    <hr class="dropdown-divider">
                    <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                </ul>
            </li>
            @endauth
        </div>
    </div>
</nav>