<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  
    public $timestamps = false;
    protected $fillable = ['name'];


    public function users(){
        return $this->belongsToMany('App\Role', 'role_user','role_id','user_id'); 
    }
}
