<x-layout>
    <!-- Hero section -->
    <header class="hero-section d-flex justify-content-center align-items-center text-center">
        <div class="position-absolute text-center">
            <x-success-message />
            <x-error-message />
        </div>
        <div class="hero-content">
            <h1 class="hero-title mb-4">{{ __('ui.welcome') }}</h1>
            <a class="btn btn-dark my-3" href="{{route('create.article')}}">{{ __('ui.create_article') }}</a>
        </div>
    </header>
    <!-- Hero section end -->
    
    <!-- Info section -->
    <section class="info-section py-5">
        <div class="container">
            <div class="row justify-content-around">
                <div class="info-cards col-11 col-md-3 text-center mb-5">
                    <i class="fa-solid fa-magnifying-glass fa-3x mb-3"></i>
                    <h3>{{ __('ui.info_1') }}</h3>
                    <p>{{ __('ui.description_1') }}</p>
                </div>
                <div class="info-cards col-11 col-md-3 text-center mb-5">
                    <i class="fa-solid fa-user-plus fa-3x mb-3"></i>
                    <h3>{{ __('ui.info_2') }}</h3>
                    <p>{{ __('ui.description_2') }}</p>
                </div>
                <div class="info-cards col-11 col-md-3 text-center mb-5">
                    <i class="fa-solid fa-shield-halved fa-3x mb-3"></i>
                    <h3>{{ __('ui.info_3') }}</h3>
                    <p>{{ __('ui.description_3') }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Info section end -->
    
    <!-- Latest articles section -->
    <section class="latest-articles py-5">
        <div class="container text-center">
            <h2 class="text-center mb-5">{{ __('ui.latest_articles') }}</h2>
            <div class="row height-custom justify-content-center align-items-center py-5">
                @forelse ($articles as $article)
                <div class="col-11 col-md-3 my-3">
                    <x-card :article="$article" />
                </div>
                @empty
                <div class="col-12">
                    <h3 class="text-center">
                        {{ __('ui.no_articles') }}
                    </h3>
                </div>
                @endforelse
            </div>
            <a class="btn btn-dark my-5" href="{{route('article.index')}}">{{ __('ui.all_articles') }}</a>
        </div>
    </section>
    <!-- Latest articles section end -->

    <!-- Recensioni -->
    <script>
        const reviews = @json($reviews);
    </script>

    <section class="container my-5">
        <div class="row text-center my-5">
            <h2 class="display-6">{{ __('ui.reviews') }}</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper"></div>
                    <div class="swiper-button-prev swiperBtn d-none d-lg-block"></div>
                    <div class="swiper-button-next swiperBtn d-none d-lg-block"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- recnsioni end -->
</x-layout>