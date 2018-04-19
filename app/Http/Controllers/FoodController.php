<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Category;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        $recipes=Food::paginate(10);
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
       $comment->code=str_random(7);
       $comment->save();
       $data = array('date' => $comment->created_at,
                     'email' => Auth::user()->email,
                     'text'=>$comment->text,
                     'user_id' => $comment->user_id,
                     'code' => $comment->code);
       return  view('comment')->with(compact('data'));
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

    public function signOff($sign_code)
    {
        $user=User::where('signCode', $sign_code)->first();
        if(!isset($user)) {
            return  "<span>Вы уже отписаны от рассылки,</span><h3></h3>
            <p><a href='http://food.loc/'>Перейти на сайт</a></p>";
        }
        $user->isSign=0;
        $user->signCode=null;
        $user->save();
        return "<span>Вы успешно отписались от рассылки,</span><h3>$user->name</h3>
            <p><a href='http://food.loc/'>Перейти на сайт</a></p>";
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($code)
    {
       $comment=Comment::where('code', $code)->first();
       if($comment)
       $comment->delete();
       return back();
    }


}
