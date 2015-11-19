<?php

namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     *
     * @return view articles
     */
    public function __construct(){
        $this->middleware('auth',['except'=>'index']);
    }

    public function index(){
        $articles= Article::latest('published_at')->Published()->get();

        return view('articles.index',compact('articles'));
    }
    public function show(Article $article){
        //$articles=Article::findorFail($id);

        //dd($articles->published_at);

        return view('articles.show',compact('articles'));
    }

    public function create(){
        return view('articles.create');
    }


    public function store(ArticleRequest $request){

        Auth::user()->articles()->save(new Article($request->all()));

        return redirect('articles');
    }

    public function edit(Article $article){
        //$article=Article::findorFail($id);
        return view('articles.edit',compact('article'));
    }

    public function update(Article $article, ArticleRequest $request){
        //$article=Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }
}
