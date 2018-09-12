<?php 

use App\Models\Option;

// bloginfo parameter recive value of option_name column from options table

function bloginfo($option_name){
   
   
        $optioin_value = Option::where('option_name', $option_name)->get();
        

     echo $optioin_value[0]->option_value;


}
