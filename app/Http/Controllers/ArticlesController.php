<?php

namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index(){
        $articles= Article::latest('published_at')->Unpublished()->get();

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

    public function store(){

        Article::create(Request::all());

        return redirect('articles');
    }

}
