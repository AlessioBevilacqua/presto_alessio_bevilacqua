<nav class="navbar navbar-expand-lg fixed-top w-100">
    <div id="customNavbar"  class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <i class="fa-solid fa-dragon fa-2x"></i>
        </a>
        <button class="navbar-toggler order-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-between text-center order-3 order-lg-1" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">{{ __('ui.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">{{ __('ui.articles') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.categories') }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item text-capitalize" href="{{ route('byCategory', $category) }}">{{ __("ui.$category->name") }}</a></li>
                        @if (!$loop->last)
                        <hr class="dropdown-divider">
                        @endif
                        @endforeach
                    </ul>
                </li>  
            </ul>
            <form class="d-flex" role="search" action="{{ route('article.search') }}" method="GET">
                <div class="input-group">
                    <input class="form-control me-2" type="search" placeholder="{{ __('ui.search_placeholder') }}" aria-label="Search" name="query">
                    <button class=" btn btn-outline-warning" type="submit">{{ __('ui.search') }}</button>
                </div>
            </form>
            <div class="nav-item dropdown ms-auto col-2 col-lg-1">
                <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('vendor/blade-flags/country-'.app()->getLocale().'.svg')}}" width="32" height="32">
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-center">
                    <li>
                        <x-_locale lang="it" />
                    </li>
                    <hr class="dropdown-divider">
                    <li>
                        <x-_locale lang="uk" />
                    </li>
                    <hr class="dropdown-divider">
                    <li>
                        <x-_locale lang="es" />
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="d-flex nav-item ms-auto mx-2 order-1">
            @auth
            <div class="nav-item dropdown">
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
                        <a class="dropdown-item" href="{{ route('create.article') }}">{{ __('ui.create_article') }}</a>
                    </li>
                    <hr class="dropdown-divider">
                    @if (Auth::user()->is_revisor)
                    <li>
                        <a class="dropdown-item" href="{{ route('revisor.index') }}">
                            @if (\App\Models\Article::toBeRevisedCount() > 0)
                            {{ \App\Models\Article::toBeRevisedCount() }} {{ __('ui.articles_to_review') }}
                            @else
                            {{ __('ui.revisor_dashboard') }}
                            @endif
                        </a>
                    </li>
                    <hr class="dropdown-divider">
                    @endif
                    <li>
                        <a class="dropdown-item fw-bolder" href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{ __('ui.logout') }}</a>
                    </li>
                    <form action="{{ route('logout') }}" id="form-logout" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
            @else
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-end" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-circle-user"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('ui.login') }}</a></li>
                    <hr class="dropdown-divider">
                    <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('ui.register') }}</a></li>
                </ul>
            </div>
            @endauth
        </div>
    </div>
</nav>