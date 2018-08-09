<?php


/*  Helper funkcije definisemo u composer.js fajlu
    u files : ['App/Http/Helpers/create_slug']
    nakon toga restartujemo kompozer komandom:
      composer dump-auto
*/


// funkcija za kreiranje slug-a
    function create_slug($text){
        $remove_white_spice = str_replace(' ','-',$text);
        $slug = strtolower($remove_white_spice);
         return str_replace(' ','-',$slug);
    }

