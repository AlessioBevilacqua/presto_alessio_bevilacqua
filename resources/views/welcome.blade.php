<x-layout>
    <!-- Hero section -->
    <header class="hero-section d-flex justify-content-center align-items-center text-center">
        <div class="hero-content">
            <h1 class="hero-title mb-4">Benvenuti su Presto.it</h1>
            <a class="btn btn-secondary" href="{{route('create.article')}}">Crea Articolo</a>
        </div>
    </header>
    <!-- Hero section end -->
    
    <!-- Info section -->
    <section class="info-section py-5">
        <div class="container">
            <div class="row justify-content-around">
                <div class="info-cards col-11 col-md-3 text-center mb-5">
                    <i class="fa-solid fa-magnifying-glass fa-3x mb-3"></i>
                    <h3>Trova ciò che cerchi</h3>
                    <p>Esplora una vasta gamma di annunci per trovare esattamente ciò di cui hai bisogno.</p>
                </div>
                <div class="info-cards col-11 col-md-3 text-center mb-5">
                    <i class="fa-solid fa-user-plus fa-3x mb-3"></i>
                    <h3>Pubblica i tuoi annunci</h3>
                    <p>Condividi facilmente i tuoi articoli in vendita con la nostra piattaforma intuitiva.</p>
                </div>
                <div class="info-cards col-11 col-md-3 text-center mb-5">
                    <i class="fa-solid fa-shield-halved fa-3x mb-3"></i>
                    <h3>Transazioni sicure</h3>
                    <p>Garantiamo un ambiente sicuro per tutte le tue transazioni online.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Info section end -->
    
    <!-- Latest articles section -->
    <section class="latest-articles py-5">
        <div class="container text-center">
            <h2 class="text-center mb-5">Ultimi Articoli</h2>
            <div class="row height-custom justify-content-center align-items-center py-5">
                @forelse ($articles as $article)
                <div class="col-12 col-md-3 ">
                    <x-card :article="$article" />
                </div>
                @empty
                <div class="col-12">
                    <h3 class="text-center">
                        Non sono ancora stati creati articoli
                    </h3>
                </div>
                @endforelse
            </div>
            <a class="btn btn-dark my-5" href="{{route('article.index')}}">Tutti gli articoli</a>
        </div>
    </section>
    <!-- Latest articles section end -->
</x-layout>