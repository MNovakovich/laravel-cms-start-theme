<?php 

use App\Models\Option;

// bloginfo parameter recive value of option_name column from options table

function bloginfo($option_name){
   
   
        $optioin_value = Option::where('option_name', $option_name)->get();
        

     echo $optioin_value[0]->option_value;


}

/**
 * function return activated theme
 */
function path_activated_theme(){
      $activated_theme = Option::where('option_name','activated_theme')->get();

       $path = resource_path().'/themes';
       return $path.'/'.$activated_theme[0]->option_value;
}
/**
 * return folder name of activated theme
 */
function activated_theme(){
      $activated_theme = Option::where('option_name','activated_theme')->get();
       
       return $activated_theme[0]->option_value;
}