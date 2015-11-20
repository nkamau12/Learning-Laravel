<?php

namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Tag;
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

        //dd($article->body);

        return view('articles.show',compact('article'));
    }

    public function create(){
        $tags = Tag::lists('name','id');

        return view('articles.create',compact('tags'));
    }


    public function store(ArticleRequest $request){


        $this->createArticle($request);
        //session()->flash('flash_message','Your article has been created');
        //session()->flash('flash_message_important','Your article has been created');
        //flash()->overlay('your article has been created','good job');
        flash('Your article has been saved successfully');
        return redirect('articles');
    }

    private function createArticle(ArticleRequest $request){
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($request->input('tag_list'),$article);
        return $article;
    }

    private function syncTags(array $tags,Article $article){
        $article->tags()->sync($tags);
    }

    public function edit(Article $article){
        //$article=Article::findorFail($id);
        $tags = Tag::lists('name','id');
        return view('articles.edit',compact('article','tags'));

    }

    public function update(Article $article, ArticleRequest $request){
        //$article=Article::findOrFail($id);

        $this->syncTags($request->input('tag_list'),$article);

        return redirect('articles');
    }
}
