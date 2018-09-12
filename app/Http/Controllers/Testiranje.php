<?php

namespace App\Http\Controllers;
use App\Category;

use App\Post;
use Illuminate\Http\Request;

class Testiranje extends Controller {
	public function index() {
		 
		if ($handle = opendir('..//resources/views/')) {

			while (false !== ($entry = readdir($handle))) {
		
				if ($entry != "." && $entry != "..") {
		
					echo "<a href=''>".$entry."</a> <br>";
				}
			}
		
			closedir($handle);
		}

		// getAttributeName();
		//$user = User::find(1);

		//return $user->name;

		// scope static method from user model scopeFirstTenUser()
	//	return $firstTen = User::FirstTenUser();

	}


}
