<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Media extends Model
{
    protected $table = "media";

    protected $fillable = ['file'];



    public function user(){
        return $this->belongsTo(User::class);
    }
}
