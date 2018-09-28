<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminThemesController extends Controller
{
    
    public function index(){

        return path_activated_theme();
        $path = base_path().'/resources/views/themes';
        $themes = scandir($path);
        array_shift($themes);
        array_shift($themes);
       
        
        $theme_files =[];
         foreach($themes as $theme){
             $theme_files[] = $path.'/'.$theme;
           
         }
         array_shift($theme_files);
         array_shift($theme_files);
         // return $theme_files;

        // $th = "";
        // foreach($themes as $theme){
        //       $th .=$theme."<br>";
        // }

        // return $th;

        // $directories = glob($path . '/*' , GLOB_ONLYDIR);  
        // $activated_theme    = $directories[0];
        // $files = scandir($activated_theme);
        
        // $screenshot = $this->display_screenshot_theme($files);
          
      
        
         return view('admin.themes.index')->with('themes', $themes);
                                     
    }


    private function display_screenshot_theme($files){

           $screenshot = '';
         if (in_array("screenshot.png", $files)) {
              $screenshot = 'screenshot.png';
        }else{
            $screenshot = asset('/img/empty.jpeg');
        }
            
           return $screenshot;
    }


    public function activate_theme(Request $request){

    }
}
