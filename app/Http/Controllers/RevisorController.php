<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('successMessage', __('ui.article_accepted_successfully', ['name' => $article->title]));
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('successMessage', __('ui.article_rejected_successfully', ['name' => $article->title]));
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));

        return redirect()->route('homepage')->with('successMessage', __('ui.become_revisor_request_sent'));
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->route('homepage')->with('successMessage', __('ui.user_made_revisor', ['name' => $user->name]));
    }
}
