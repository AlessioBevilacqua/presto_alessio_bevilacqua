<form class="mt-5" wire:submit.prevent="store">
    <x-success-message />

    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" wire:model.live="title" class="form-control" id="title">
        @error('title') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea wire:model.live="description" class="form-control" id="description" rows="5"></textarea>
        @error('description') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="number" wire:model.live="price" class="form-control" id="price" step="0.01">
        @error('price') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Categoria</label>
        <select id="category" wire:model.live="category" class="form-control">
            <option value="" disabled selected>Seleziona una categoria</option>
            @foreach ($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        @error('category') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="mb-3 text-center">
        <button type="submit" class="btn btn-primary">Crea Articolo</button>
    </div>

</form>
