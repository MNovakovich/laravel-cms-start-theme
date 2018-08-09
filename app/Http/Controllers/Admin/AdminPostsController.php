<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Auth;
use App\Models\Media;

class AdminPostsController extends Controller {

	public function index() {

		$posts =  Post::orderBy('created_at','desc')->get();
		return view('admin.posts.index')->with('posts',$posts);
	}

	public function create() {

		
		$categories = Category::orderBy('name','asc')->get();
		return view('admin.posts.create')->with('categories', $categories);
	}

	public function store(Request $request) {

 //return  $image = $request->file('featured_image')->move('img',$filename);
		//return $request;
		$this->validate($request, [
			'title' => 'required|unique:posts|min:5|max:100',
			'body' => 'required|min:10',
		
		]);

		$post = new Post;
		$post->title = $request->input('title');
		$post->body = $request->input('body');
		 

		// 
		
		// if ($request->hasFile('featured_image')) {
		// 	$image = $request->file('featured_image')->store('img');
		// 	$filename = $request->file('featured_image')->getClientOriginalName();
		// 	$post->featured_image = $filename;
		// }
		 

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
		
	
        $post->category_id = $request->input('category_id');
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
		return view('admin.posts.edit')->with('post', $post)
		                               ->with('categories', $categories);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//return $request;
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
	
		$post->category_id = $request->input('category_id');
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
