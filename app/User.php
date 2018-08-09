<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Media;

class User extends Authenticatable {
	use Notifiable;

	const IS_NOT_ADMIN = 0;
	const IS_ADMIN = 1;

	const IS_ACTIVE = 1;
	const IS_NOT_ACTIVE = 0;

	protected $fillable = [
		'name', 'email', 'password', 'avatar', 'is_admin', 'status',
	];

	protected $hidden = [
		'password', 'remember_token',
	];
	public function getNameAttribute($value) {
		return strtoupper($value);
	}

	public static function scopeFirstTenUser($query) {
		return $query->orderBy('name', 'asc')->take(10)->get();
	}
	public function roles() {
		// return $this->belongsToMany('App\Role');
		return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
	}
	public function posts() {
		return $this->hasMany('App\Post');
	}

	public function media(){
		return $this->hasMany(Media::class);
	}

	public function superAdmin() {

		if ($this->is_admin) {
			return true;
		}
		return false;

	}
	public function isAdmin() {

		if ($this->roles[0]->name === 'administrator' && $this->status === 1) {
			return true;
		}

		return false;
	}

	public function is_active() {

		if ($this->status == 1) {
			return true;
		} else {
			return false;
		}
	}

	
	public function hasAnyRole($roles){
		if(is_array($roles)){
			foreach($roles as $role){
				if($this->hasRole($role)){
					return true;
				}
			}
		}else {
			if($this->hasRole($roles)){
				return true;
			}
		}
		return false;
	}

	public function hasRole($role)
    {
       if($this->roles()->where('name', $role)->first()){

           return true;
	   }
	       return false;
	}





}
