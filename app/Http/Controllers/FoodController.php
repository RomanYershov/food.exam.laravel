<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Category;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $recipes=Food::paginate(6);
       return view('food')->with(compact('recipes', 'category', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $comment=new Comment();
       $comment->user_id=Auth::user()->id;
       $comment->name="";
       $comment->text=$request->text;
       $comment->food_id=$request->food_id;
        $comment->save();
        $email=Auth::user()->email;
       return  "<span  class=\"badge badge-info\">$email</span>
                  <p>~~~ $request->text  ~~~</p>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipes=($id==0)
            ?Food::all()
            :Food::where('category_id','=',$id)->get();
        return view('showFoods')->with(compact('recipes', 'category'));
    }

    public function recipe($id)
    {
        $recipe=Food::find($id);
        return view('recipe')->with(compact('recipe', 'comments'));
    }


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
