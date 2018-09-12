<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['name','slug','post_id'];

    public $timestamps = false;

    public function setTitleAttribute($title){
        $this->title = $title;
        $this->attributes['slug'] = str_slug($this->title , "-");
    }
    
    public function posts(){
        return $this->hasMany('App\Post');
    }

}
