<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Auth;
use App\Models\Media;

class AdminPostsController extends Controller {

	public function index() {
	   $tekst  =  'ovo je Neki Moj tekSt';
		$posts =  Post::orderBy('created_at','desc')->get();

		
		return view('admin.posts.index')->with('posts',$posts);
	}

	public function create() {

	 
	
		$categories = Category::orderBy('name','asc')->get();
		$statuses = Post::show_status_column_values();
	//	return $statuses;
		return view('admin.posts.create')->with('categories', $categories)
		                                 ->with('statuses', $statuses);
	}

	public function store(Request $request) {

 //return  $image = $request->file('featured_image')->move('img',$filename);
		//return $request->status;
		$this->validate($request, [
			'title' => 'required|unique:posts|min:5|max:100',
			'body' => 'required|min:10',
		
		]);

		$post = new Post;
		$post->title = $request->input('title');
		$post->body = $request->input('body');
		$post->status = $request->input('status');
	

        // if($request->hasFile('featured_image')) {
        //     // Get filename with the extension
        //     $fileNameWithExt = $request->file('featured_image')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //     // Get just extension
        //     $ext = $request->file('featured_image')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore = $filename;
        //     // Upload image  - najvazniji korak, konkretno upload slike
        //     $path = $request->file('featured_image')->storeAs('public/img', $fileNameToStore);
        //     // link do slike
        //     $post->featured_image = $fileNameToStore;
        //     // nepotrebno kod edit-a ... samo za store ako nema defaultna vrednost null
        // }   


         
		if ($request->file("featured_image") !== null) {

			$name = time() . '_' . $request->file('featured_image')->getClientOriginalName();

			$request->file('featured_image')->move('img', $name);

			$post->featured_image = $name;
		}
          
		// if ($request->hasFile('featured_image')) {
		// 	$name = $request->file('featured_image')->getClientOriginalName();

		// 	$request->file('featured_image')->move('img', $name);

		// 	$post->featured_image = $name;
		// }
		
	    if($request->input('category_id') == null){
			$post->category_id = 1;
		}else{
			$post->category_id = $request->input('category_id');
		}

		$post->slug =   str_slug($request->input('title'));
		$post->user_id =  Auth::user()->id;
		$post->save();
		
		$inserted_id =  $post->id;
	
		return redirect('admin/posts/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		$post =  Post::findOrFail($id);
		
		$categories =  Category::orderBy('name', 'asc')->get();
		$statuses = Post::show_status_column_values();
		return view('admin.posts.edit')->with('post', $post)
									   ->with('categories', $categories)
									   ->with('statuses', $statuses);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
	
		$post = Post::find($id);
		$post->title = $request->input('title');
		$post->body = $request->input('body');
		
		if ($request->hasFile('featured_image')) {
			//$image = $request->file('featured_image')->store('img');
			$filename = $request->file('featured_image')->getClientOriginalName();
			$request->file('featured_image')->move('img', $filename);
			$post->featured_image = $filename;
		}
		// if ($request->hasFile('avatar')) {
		// 	$name = time() . '_' . $request->file('avatar')->getClientOriginalName();

		// 	$request->file('avatar')->move('img', $name);

		// 	$user->avatar = $name;
		// }
	   
		/**************************************/
		 $slug_request = str_slug($request->input('title'));
		// $found_slug_in_db =  DB::select('select slug from posts where slug = :slug', ['slug' => $slug_request]);
		// $found_slug_in_db = $found_slug_in_db[0]->slug;
  
		// $last_char_of_slug = substr($found_slug_in_db, -1);
		// $count =  $last_number_of_slug;
		// if(is_numeric($last_char_of_slug)){
		// //	$last_number_of_slug = substr($found_slug_in_db, -1);
        //    // $found_slug_in_db = substr($found_slug_in_db, 0, -1);
		
		
		// 		$count++;
		// 		$post->slug = str_replace($last_number_of_slug,$count, $count,found_slug_in_db );
			
		// }else {
		// 	if($found_slug_in_db == $slug_request){
			
		// 		  $post->slug = $slug_request._.$count++;
		// 	}else{
		// 		  $post->slug = $slug_request;
		// 	}
		// }

		 $post->slug = $slug_request;
	 
		
	


		//*************************************/
		if($request->input('category_id') == null){
			$post->category_id = 1;
		}else{
			$post->category_id = $request->input('category_id');
		}
		$post->slug =   str_slug($request->input('title'));
		$post->user_id = $request->input('user_id');
		$post->save();
        return redirect()->back()->with('success', ['your message,here']);   
	} 

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		// $post = Post::findOrFail($id);
		// $post->delete();
		//redirect('/admin/posts')->with('success', 'uspesno ste obrisali post'+ $post->title);
	}
}
