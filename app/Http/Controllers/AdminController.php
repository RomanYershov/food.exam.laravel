<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function index()
    {
        $recipes=Food::all();
        return view('admin.recipes')->with(compact('recipes','category'));
    }


    public function create()
    {
        $categories=Category::all();
        return view('admin.createRecipe')->with(compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
            'category_id' => 'required',
            'image' => 'required',
            'recipe' => 'required'
        ]);

       $recipe=new Food($request->all());
       $name=Storage::put("public/images", $request->file("image"));
       $url=Storage::url($name);
       $recipe->image=$url;
       $recipe->save();
       return redirect('/admin');
    }

     public function createcategory()
     {
        return view('admin.createCategory');
     }

    public function addcategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        $category=new Category($request->all());
        $category->save();
        return redirect('/admin');
    }
    public function show($id)
    {

    }


    public function edit($id)
    {
        $categories=Category::all();
        $recipe=Food::find($id);
        return view('admin.editRecipe')->with(compact('recipe','categories'));
    }


    public function update(Request $request)
    {
      $recipe=Food::find($request->id);
        $recipe->name=$request->name;
        $recipe->recipe=$request->recipe;
        $recipe->category_id=$request->category_id;

      if($request->hasFile('image'))
      {
          $name=Storage::put("public/images", $request->file("image"));
          $url=Storage::url($name);
          $recipe->image=$url;
      }
        $recipe->save();

        return redirect('/admin');
    }


    public function destroy($id)
    {
        $recipe=Food::find($id);
        if($recipe)
        {
            $recipe->delete();
        }
      return back()->withInput();
    }
}
