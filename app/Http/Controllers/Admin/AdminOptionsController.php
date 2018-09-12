<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Option;

class AdminOptionsController extends Controller
{
    
    public function index(){
       
       // $options  =  Option::all();
        $optioins = DB::table('options')
                    ->whereIn('option_name', array('blogname', 'blogdescription'))->get();
        

   
        return view('admin.options.general')->with('options', $optioins);
    }

    /*
       this is request options from admin/options-general url;
    */
    public function update(Request $request){
     
       // save blogname optin 

       if($request->input('blogname') != ''){
            $option = Option::where('option_name','=','blogname')->get();

            // I have to find better solution for this 
            $option[0]->option_value = $request->input('blogname');
            $option[0]->autoload = 'yes';
            $option[0]->save();
       }

       if($request->input('blogdescription') != ''){
            $option = Option::where('option_name','=','blogdescription')->get();

            // I have to find better solution for this 
            $option[0]->option_value = $request->input('blogdescription');
            $option[0]->autoload = 'yes';
            $option[0]->save();
       }
            
       return back();
    }
}
