<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditArticleForm extends Component
{
    use WithFileUploads;

    public Article $article;

    #[Validate('required|min:5')]
    public $title;

    #[Validate('required|min:10')]
    public $description;

    #[Validate('required|numeric')]
    public $price;

    #[Validate('required')]
    public $category = '';

    public $images = [];              
    public $temporary_images = [];    
    public $existingImages = [];      

    public function mount(Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            return redirect()
            ->route('homepage')
            ->with('errorMessage', __('ui.you_are_not_authorized_to_edit'));
        }


        $this->article = $article;

        $this->title = $article->title;
        $this->description = $article->description;
        $this->price = $article->price;
        $this->category = $article->category_id;

        $this->existingImages = $article->images()->get()->toArray();

    }

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeExistingImage($imageId)
    {
        $image = $this->article->images()->find($imageId);

        if ($image) {
            File::delete(storage_path('app/public/' . $image->path));
            $image->delete();
        }

        $this->existingImages = $this->article->images()->get()->toArray();
    }

    public function removeImage($key)
    {
        if (isset($this->images[$key])) {
            unset($this->images[$key]);
        }
    }

    public function updateArticle()
    {
        $this->validate();

        $this->article->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'is_accepted' => null,
        ]);

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create([
                    'path' => $image->store($newFileName, 'public')
                ]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 800, 800),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('successMessage', __('ui.article_updated_successfully', ['name' => $this->article->title]));
    }

    public function render()
    {
        return view('livewire.edit-article-form');
    }
}
