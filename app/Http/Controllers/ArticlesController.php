<?php

namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest;

class ArticlesController extends Controller
{
    /**
     *
     * @return view articles
     */
    public function index(){
        $articles= Article::latest('published_at')->Published()->get();

        return view('articles.index',compact('articles'));
    }
    public function show($id){
        $articles=Article::findorFail($id);

        dd($articles->published_at);

        return view('articles.show',compact('articles'));
    }

    public function create(){
        return view('articles.create');
    }


    public function store(CreateArticleRequest $request){

        Article::create($request->all());

        return redirect('articles');
    }

}
