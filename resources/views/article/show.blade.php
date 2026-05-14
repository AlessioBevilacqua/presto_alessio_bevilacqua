<x-layout>
    <div class="container py-5">

        {{-- Titolo --}}
        <div class="row justify-content-center text-center mb-5">
            <div class="col-12">
                <h1 class="display-4 fw-bold">
                    {{ __('ui.article_detail') }}<br>{{ $article->title }}
                </h1>
            </div>
        </div>

        {{-- Contenuto --}}
        <div class="row justify-content-center align-items-center g-5">

            {{-- Carousel --}}
            <div class="col-12 col-md-5">
                <div class="shadow-lg carouselContainer overflow-hidden">
                    @if ($article->images->count() > 0)
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($article->images as $key => $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ $image->getUrl(300, 300) }}"
                                             class="d-block w-100 carouselImg"
                                             alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                    </div>
                                @endforeach
                            </div>

                            @if ($article->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            @endif
                        </div>
                    @else
                        <img src="https://picsum.photos/600/400" class="w-100 rounded" alt="Nessuna foto inserita">
                    @endif
                </div>
            </div>

            {{-- Dettagli articolo --}}
            <div class="col-12 col-md-5">
                <div class="p-4 shadow bgCustom">

                    <h2 class="fw-bold mb-3">{{ $article->title }}</h2>

                    <h4 class=" fw-bold mb-4">
                        {{ __('ui.price') }}: {{ $article->price }} €
                    </h4>

                    <h5 class="fw-semibold">{{ __('ui.description') }}</h5>
                    <p class="text-muted">{{ $article->description }}</p>

                    <hr>

                    <div class="mt-4">
                        <a href="{{ route('article.index') }}" class="btn btn-outline-dark px-4">
                            {{ __('ui.all_articles') }}
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-layout>
