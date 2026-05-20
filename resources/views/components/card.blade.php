<div class="card mx-auto shadow text-center mb-3 h-100 d-flex flex-column justify-content-evenly align-items-center">
    <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(800, 800) : 'https://picsum.photos/200' }}"
     class="card-img-top cardImg" alt="Immagine dell'articolo {{ $article->title }}">

    <div class="card-body d-flex flex-column">
        <h4 class="card-title my-3">{{ $article->title }}</h4>
        <h6 class="card-subtitle mb-3 text-body-secondary">{{ $article->price }} €</h6>

        <div class="mt-auto my-3 d-flex justify-content-center align-items-center">
            <a href="{{ route('article.show', compact('article')) }}" class="btn mx-2 btn-primary">{{ __('ui.detail') }}</a>
            <a href="{{ route('byCategory', ['category' => $article->category]) }}" class="btn mx-2 btn-outline-info">{{ __("ui." . $article->category->name) }}</a>
            @if (Auth::id() == $article->user->id)
                <a href="{{ route('edit.article', ['article' => $article]) }}" class="btn mx-2 btn-warning">{{ __('ui.edit') }}</a>
            @endif
        </div>
    </div>
</div>
