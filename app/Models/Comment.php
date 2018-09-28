<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Post;
use App\User;

class Comment extends Model
{
    protected $table =  "comments";

    protected $fillable =  ['body', 'post_id'];


    public function post(){
        return $this->belongsTo(Post::class);
    }
}
