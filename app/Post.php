<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{

    protected $table = "posts";
    protected $fillable = ['title','body','slug','featured_image','status','user_id','category_id','image_id'];
   

    // public function setAttributeSlug($slug){

    // }
   
    // public function getSlugAttributeSlug($title){
    //    return str_slug($title);
    // }
    public function user(){
         return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
    
     /* value of status enum field = [published', 'draft','private]  */
    public static function show_status_column_values(){
        return $status = ['published', 'draft','private'];
    }
}
