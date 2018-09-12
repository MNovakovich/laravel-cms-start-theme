<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table =  'options';
    
    public $timestamps = false;
    
    protected $fillable = ['option_name', 'option_value','autoload'];

    




}
