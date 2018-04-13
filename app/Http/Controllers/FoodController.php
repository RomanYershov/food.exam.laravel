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
       $comment->text=$request->text;
       $comment->food_id=$request->food_id;
        $comment->save();
        $email=Auth::user()->email;
        $date=$comment->created_at;
       return  "<div class=\"comment\">
                     <ul>
                          <li  class=\"badge\">$email</li>
                          <li> $request->text </li>
                          <li>$date</li>
                     </ul>
               </div>";
    }


    public function show(Request $request)
    {
        if($request->ajax())
        {
                $recipes=($request->id==0)
                ?Food::all()
                :Food::where('category_id','=',$request->id)->get();
            return view('showFoods')->with(compact('recipes', 'category'));
        }
        return back();
    }

    public function recipe($id)
    {
        $recipe=Food::find($id);
        if($recipe){
            return view('recipe')->with(compact('recipe', 'comments'));
        }
        return redirect('food');

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


}
