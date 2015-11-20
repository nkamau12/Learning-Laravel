<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //
    protected $fillable=[
        'title',
        'body',
        'published_at',
        'user_id'
    ];

    protected $dates=['published_at'];

    public function setPublishedAtAttribute($date){

        $this->attributes['published_at'] =Carbon::parse( $date);
    }

    public function scopePublished($query){
        $query->where('published_at','<=',Carbon::now());

    }
    public function scopeUnpublished($query){
        $query->where('published_at','>',Carbon::now());

    }

    /**
     * An article is owned by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * get tag associated with the given article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag',"article_tags","tags_id","article_id")->withTimestamps();
    }

    public function getTagListAttribute(){
        return $this->tags->lists('id')->toArray();
    }
}
