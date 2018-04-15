@extends('layouts.app')
<style>
    .cover{
        background-color: rgba(51, 51, 51, 0.98);
        height: auto;
        padding: 20px;
        border-radius: 50px;
        margin: 100px;
        border: 1px solid wheat;
        color: wheat;
    }
    .text{
        overflow: auto;
        color: wheat;
        text-align: justify;
        /*color:  #d6e25e;*/
        /*text-shadow: black 2px 2px 7px;*/
    }
    .text img{
        margin: 12px;
        float: right;
    }
    .comments{
        /*border: 1px solid wheat;*/
    }
    .comment{
        padding: 7px;
        margin-bottom: 15px;
        /*border-radius: 10px;*/
        border-bottom: 1px solid wheat;
        /*background-color: #1b6d855e;*/
    }
    h1{
        font-weight: bold;
        font-style: italic;
        margin: 0px;
    }
    span{
        float: left;
        text-align: justify;
    }
</style>
@section('content')
<div class="cover">
    <div class="text">
        <h1>{{$recipe->name}}</h1>
        <img src="{{$recipe->image}}" alt="" class="img-thumbnail">
          <ul>
       @foreach(preg_split('/[\r\n]+/', $recipe->recipe) as $row)
           <li><strong>{{$row}}</strong></li>
           @endforeach
          </ul>
    </div>

</div>
<div class="cover" style="border-radius: 10px 10px 0px 0px;">
    @if(\Illuminate\Support\Facades\Auth::user())
        <form class="comment-form" action="/food" method="post">
            {{csrf_field()}}
            <textarea name="text" id="" cols="80" rows="5" style="background-color: #0909095c" required maxlength="400" placeholder="Ваш комментарий:"></textarea><br>
            <input type="hidden" name="food_id" value="{{$recipe->id}}">
            <input type="submit" class="btn btn-danger" >
        </form>
    @endif
    <div class="comments text" >
        @foreach($recipe->comments as $comment)
           <div class="comment">
               <ul>
                   <h4 style="text-decoration: underline;color: #2ab27b">{{$comment->user->email}}</h4>
                   <li> {{$comment->text}} </li>
                   <li class="badge" style="float: right;">{{$comment->created_at}}</li>
               </ul>
           </div>
        @endforeach
    </div>
</div>
    @endsection

@section('scripts')
    <script>
        $(function () {
            $('.comment-form').submit(function () {
                var that=$(this);
                var text = that[0][1].value;
                var food_id = that[0][2].value;
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                var url=($(this).attr("action"));

                $.ajax({
                    url:url,
                    type:'POST',
                    data:{"text":text,"food_id":food_id,"_token":csrf_token},
                    success:function (res) {
                        $('.comments').append(res);
                        $('textarea').val("");
                    }
                });
                return false;
            });
        });
    </script>
    @endsection