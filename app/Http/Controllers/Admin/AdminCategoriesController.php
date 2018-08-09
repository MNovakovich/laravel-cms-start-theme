<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Helpers\create_slug;

class AdminCategoriesController extends Controller
{
   
    public function index()
    {
     
         $categories = Category::orderBy('name','asc')->get();
         //return $categories->load('posts');
        
        
       // $tekst = "Ovo je moj tekst i dobar";
       //   return str_slug($tekst , "-");
       //  return   create_slug($tekst);  // ovo je moja cutom funkcija
        return view('admin.categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.partials.new-categories');
    }

  
    public function store(Request $request)
    {
      $category = new Category;
      $category->name =  $request->input('name');
      $category->save();

      return redirect('/admin/categories')->with('success', 'Uspesto ste dodali kategoriju');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
