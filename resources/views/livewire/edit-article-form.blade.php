<form class="mt-5 custom-form" wire:submit.prevent="updateArticle">

    <div class="mb-3">
        <label for="title" class="form-label">{{ __('ui.title') }}</label>
        <input type="text" wire:model.live="title" class="form-control" id="title">
        @error('title') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">{{ __('ui.description') }}</label>
        <textarea wire:model.live="description" class="form-control" id="description" rows="5"></textarea>
        @error('description') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">{{ __('ui.price') }}</label>
        <input type="number" wire:model.live="price" class="form-control" id="price" step="0.01">
        @error('price') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">{{ __('ui.category') }}</label>
        <select id="category" wire:model.live="category" class="form-control">
            <option value="" disabled>{{ __('ui.select_category') }}</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}">{{ __('ui.' . $cat->name) }}</option>
            @endforeach
        </select>
        @error('category') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="mb-3">
        <input type="file" wire:model.live="temporary_images" multiple
               class="form-control @error('temporary_images.*') is-invalid @enderror" />
        @error('temporary_images.*') <p class="fst-italic text-danger">{{ $message }}</p> @enderror
        @error('temporary_images') <p class="fst-italic text-danger">{{ $message }}</p> @enderror
    </div>

    @if (!empty($images))
        <div class="row mb-4">
            <div class="col-12 border border-4 border-warning rounded shadow py-4">
                <div class="row">
                    @foreach ($images as $key => $image)
                        <div class="col d-flex flex-column align-items-center my-3">
                            <div class="img-preview mx-auto shadow rounded"
                                 style="background-image: url({{ $image->temporaryUrl() }});">
                            </div>
                            <button type="button" class="btn btn-danger mt-5"
                                    wire:click="removeImage({{ $key }})">X</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if (!empty($existingImages))
        <div class="row mt-4 mb-4">
            <div class="col-12 border border-4 border-primary rounded shadow py-4">
                <div class="row">
                    @foreach ($existingImages as $img)
                        <div class="col d-flex flex-column align-items-center my-3">
                            <div class="img-preview mx-auto shadow rounded"
                                 style="background-image: url({{ Storage::url($img['path']) }});">
                            </div>
                            <button type="button" class="btn btn-danger mt-3"
                                    wire:click="removeExistingImage({{ $img['id'] }})">X</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="my-3 text-center">
        <button type="submit" class="mt-3 btn btn-dark">
            {{ __('ui.update_article') }}
        </button>
    </div>

    <x-success-message />

</form>
