<x-layout>
    <div class="container py-5">
        
        {{-- Titolo --}}
        <div class="row justify-content-center text-center mb-5">
            <div class="col-12">
                <h1 class="display-4 fw-bold">
                    {{ __('ui.revisor_dashboard') }}
                </h1>
            </div>
        </div>
        
        <x-success-message />
        
        @if ($article_to_check)
        
        {{-- Contenuto --}}
        <div class="row justify-content-center align-items-center g-5">
            
            {{-- Carousel --}}
            <div class="col-12 col-md-5">
                <div class="shadow-lg carouselContainer overflow-hidden">
                    
                    @if ($article_to_check->images->count() > 0)
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($article_to_check->images as $key => $image)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <div class="carousel-img-wrapper">
                                    <img src="{{ $image->getUrl(800, 800) }}"
                                    class="d-block w-100 carouselImg"
                                    alt="Immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}">
                                </div>
                                <div class="col-md-10 ps-3">
                                    <div class="card-body my-3">
                                        <h5 class="">Labels</h5>
                                        @if ($image->labels)
                                        @foreach ($image->labels as $label)
                                        {{ $label }},
                                        @endforeach
                                        @else
                                        <p class="fst-italic">No labels</p>
                                        @endif
                                    </div>
                                </div>
                                                        
                                <div class="col-md-8 ps-3">
                                    <div class="card-body">
                                        <h5 class="">Ratings</h5>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->adult }}">
                                                </div>
                                            </div>
                                            <div class="col-10">Adult</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class=" text-center mx-auto {{ $image->violence }}">
                                                </div>
                                            </div>
                                            <div class="col-10">Violence</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class=" text-center mx-auto {{ $image->spoof }}">
                                                </div>
                                            </div>
                                            <div class="col-10">Spoof</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class=" text-center mx-auto {{ $image->racy }}">
                                                </div>
                                            </div>
                                            <div class="col-10">Racy</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class=" text-center mx-auto {{ $image->medical }}">
                                                </div>
                                            </div>
                                            <div class="col-10">Medical</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                            
                        </div>
                        
                        @if ($article_to_check->images->count() > 1)
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
                    
                    <h2 class="fw-bold mb-3">{{ $article_to_check->title }}</h2>
                    
                    <h4 class="fw-semibold mb-2">
                        {{ __('ui.author') }}: {{ $article_to_check->user->name }}
                    </h4>
                    
                    <h4 class="fw-semibold mb-2">
                        {{ __('ui.price') }}: {{ $article_to_check->price }} €
                    </h4>
                    
                    <h5 class="fst-italic text-muted mb-3">
                        #{{ $article_to_check->category->name }}
                    </h5>
                    
                    <h5 class="fw-semibold">{{ __('ui.description') }}</h5>
                    <p class="text-muted">{{ $article_to_check->description }}</p>
                    
                    <hr>
                    
                    {{-- Pulsanti revisore --}}
                    <div class="d-flex justify-content-around mt-4">
                        
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger px-4 fw-bold">
                                {{ __('ui.reject') }}
                            </button>
                        </form>
                        
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success px-4 fw-bold">
                                {{ __('ui.accept') }}
                            </button>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
        
        @else
        
        {{-- Nessun articolo da revisionare --}}
        <div class="row vh-100 justify-content-center align-items-center text-center">
            <div class="col-12">
                <h3 class="mb-4">{{ __('ui.no_articles_to_review') }}</h3>
                <a href="{{ route('homepage') }}" class="btn btn-dark px-4">
                    {{ __('ui.back_to_homepage') }}
                </a>
            </div>
        </div>
        
        @endif
        
    </div>
</x-layout>
