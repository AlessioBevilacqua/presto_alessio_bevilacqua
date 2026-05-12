<x-layout>
    <div class="container-fluid my-5">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="text-center my-5">{{ __('ui.search_results_for') }} <br>"{{ $query }}"</h1>
            </div>
        </div>
        <div class="row vh-100 justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-md-4 mb-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">{{ __('ui.no_articles_found') }}</h3>
                </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>