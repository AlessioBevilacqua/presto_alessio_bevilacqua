<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteArticle extends Component
{
    public $article;

    #[On('deleteArticle')]
    public function deleteArticle()
    {

    $article = $this->article;

    if ($this->article->user_id !== Auth::id()) {
        return redirect()->route('homepage')
            ->with('errorMessage', __('ui.you_are_not_authorized_to_delete'));
    }

    // Cancella immagini
    foreach ($this->article->images as $image) {
        Storage::disk('public')->delete($image->path);
        $image->delete();
    }

    $name = $this->article->title;
    $this->article->delete();

    return redirect()->route('homepage')
        ->with('successMessage', __("ui.article_deleted_successfully", ['name' => $name]));
    }


    public function render()
    {
        return view('livewire.delete-article');
    }
}
