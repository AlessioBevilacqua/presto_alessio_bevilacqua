<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        $reviews = [
        ['description' => 'Ottimo sito!', 'user' => 'Mario', 'voto' => 5],
        ['description' => 'Servizio veloce', 'user' => 'Luca', 'voto' => 4],
        ['description' => 'Consigliato', 'user' => 'Giulia', 'voto' => 5],
        ['description' => 'Buona esperienza', 'user' => 'Francesca', 'voto' => 3],
        ['description' => 'Soddisfatto', 'user' => 'Alessio', 'voto' => 5],
    ];

        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('welcome', compact('articles', 'reviews'));
    }
    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
