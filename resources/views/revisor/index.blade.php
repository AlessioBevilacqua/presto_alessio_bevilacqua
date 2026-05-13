<x-layout>
    <div class="container-fluid my-5 ">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{ __('ui.revisor_dashboard') }}</h1>
            </div>
        </div>
        
        <x-success-message />
        @if ($article_to_check)
            <div class="row justify-content-evenly vh-100 align-items-center">
                <div id="carouselExample" class="carousel slide col-md-4">
                    <div class="carousel-inner">
                        @if ($article_to_check->images->count())
                            @foreach ($article_to_check->images as $key => $image)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ Storage::url($image->path) }}" class="d-block w-100 rounded shadow"
                                alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title}}'">
                            </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/300" class="d-block w-100 rounded shadow"
                                alt="Nessuna foto inserita dall'utente">
                            </div>
                        @endif
                    </div>
                    @if ($article_to_check->images->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>{{ __('ui.author') }} {{ $article_to_check->user->name }}</h3>
                        <h4>{{ $article_to_check->price }}€</h4>
                        <h4 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h4>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger py-2 px-5 fw-bold">{{ __('ui.reject') }}</button>
                        </form>
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success py-2 px-5 fw-bold">{{ __('ui.accept') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row vh-100 justify-content-center align-items-center height-custom text-center">
                <div class="col-12 my-5">
                    <h3 class="text-center">{{ __('ui.no_articles_to_review') }}</h3>
                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-dark">{{ __('ui.back_to_homepage') }}</a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
