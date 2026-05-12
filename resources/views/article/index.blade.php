<x-layout>
    <div class="container-fluid vh-100 my-5">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{ __('ui.all_articles') }}</h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
            <div class="col-12 col-md-3">
                <x-card :article="$article" />
            </div>
            @empty
            <div class="col-12 text-center">
                <h3 class="text-center">
                    {{ __('ui.no_articles') }}
                </h3>
                <a href="{{ route('create.article') }}" class="mt-5 btn btn-dark">{{ __('ui.create_article') }}</a>
            </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            <div>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-layout>
