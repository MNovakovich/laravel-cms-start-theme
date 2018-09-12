<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller {
	public function index(User $users) {
	   
		$users = User::orderBy('created_at','desc')
				 ->get()
				 ->load('roles');
	
  
		return view('admin.users.index')->with('users', $users);
	}

	public function create() {
		$roles = Role::all();

		return view('admin.users.create')->with('roles', $roles);

	}

	public function store(Request $request) {

		$user = new User;
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->password = bcrypt($request->input('password'));
		// $user->role_id = $request->input('role_id');
		$user->status = $request->input('status');
		if ($request->input('is_admin') === null) {
			$user->is_admin = User::IS_NOT_ADMIN;
		} else {
			$user->is_admin = $request->input('is_admin');
		}

		if ($request->file("avatar") !== null) {

			$name = time() . '_' . $request->file('avatar')->getClientOriginalName();

			$request->file('avatar')->move('img', $name);

			$user->avatar = $name;
		}
          
		$user->save();

		
		$user->roles()->attach($request->input('role_id'));

		return redirect('admin/users')->with('status', 'Success!');
	}
	public function show($id) {
		$user = User::find($id);
		return view('admin.users.show')->with('user', $user);
	}

	public function edit($id) {

		//return $_SERVER["PHP_SELF"];

		$user = User::find($id);

		$roles = Role::all();
		return view('admin.users.edit')->with('user', $user)
			->with('roles', $roles);
	}

	public function update(Request $request, $id) {
       // return $request->route()->getAction();
		$user = User::find($id);

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->password = bcrypt($request->input('password'));

		//  $user->role_id = $request->input('role_id');
		$user->status = $request->input('status');
		if ($request->input('is_admin') === null) {
			$user->is_admin = User::IS_NOT_ADMIN;
		} else {
			$user->is_admin = $request->input('is_admin');
		}

		if ($request->hasFile('avatar')) {
			$name = time() . '_' . $request->file('avatar')->getClientOriginalName();

			$request->file('avatar')->move('img', $name);

			$user->avatar = $name;
		}
		$user->save();

		// preuzimamo niz role_id koji smestamo u tabelu role_user
		$user->roles()->sync($request->input('role_id'));
		return redirect('admin/users/' . $user->id . '/edit')->with('status', 'Success!');
	}

	public function destroy($id) {
		$user = User::findOrFail($id);

		// opcija za brisanj slike iz foldera
		unlink(public_path() . '/img/' . $user->avatar);
		$user->delete();

		//  Session::flash('delete_user','User  je izbrisan');
		return redirect('/admin/users')->with('status', 'User ' . $user->name . ' je obrisan!');
	}

}
