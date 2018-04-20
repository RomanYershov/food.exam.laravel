

@extends('layouts.app')
<style>
    .cover{
        background-color: rgba(12, 11, 12, 0.55);
        /*background-color: rgba(0, 150, 136, 0.72);*/
        height: 100%;
        width: 70%;
        padding: 20px;
        border-radius: 0px;
        margin: 0px 200px 0px 200px;
        /*border: 1px solid wheat;*/
        color: wheat;
        position: absolute;
    }
    .col-md-12{
        height: 100%;
        border-left: 10px solid rgba(245, 222, 179, 0.0784313725490196);
        border-right: 10px solid rgba(245, 222, 179, 0.0784313725490196);
        position: fixed;
        overflow: auto;
    }
    .text{
        color: #FFD490;
        text-align: justify;
        /*font-style: italic;*/
        /*color:  #d6e25e;*/
        /*text-shadow: black 2px 2px 7px;*/
    }
    .text img{
        width: 40%;
        height: 40%;
        margin: 12px;
        float: right;
    }
    .comments{
        /*border: 1px solid wheat;*/
    }
    .comment{
        padding: 7px;
        margin-bottom: 15px;
        border-bottom: 3px solid #fcf8e338;
    }
    textarea{
        background-color: #0909095c;
        width: 60%;
        height: 100px;
    }
    h1{
        font-weight: bold;
        font-style: italic;
        margin: 0px;
        text-decoration: underline;
    }
    span{
        float: left;
        text-align: justify;
    }

    ::-webkit-scrollbar{
        width:12px;
    }
    ::-webkit-scrollbar-thumb{
        border-width:1px 1px 1px 2px;
        border-color: #777;
        background-color: transparent;
    }
    ::-webkit-scrollbar-thumb:hover{
        border-width: 1px 1px 1px 2px;
        border-color: #555;
        background-color: #777;
    }

    ::-webkit-scrollbar-track{
        border-width:0;
    }
    ::-webkit-scrollbar-track:hover{
        border-left: solid 1px #aaa;
        background-color: #eee;
    }
</style>
@section('content')
<div class="cover">
   <div class="col-md-12">
       <div class="text">
           <h1>{{$recipe->name}}</h1>
           <img src="{{$recipe->image}}" alt="" class="img-thumbnail">
           <ul>
               @foreach(preg_split('/[\r\n]+/', $recipe->recipe) as $row)
                   <li><strong>{{$row}}</strong></li>
               @endforeach
           </ul>
       </div>
       @if(\Illuminate\Support\Facades\Auth::user())
           <form class="comment-form" action="/food" method="post">
               {{csrf_field()}}
               <textarea name="text"  required maxlength="1500" placeholder="Ваш комментарий:"></textarea><br>
               <input type="hidden" name="food_id" value="{{$recipe->id}}">
               <input type="submit" class="btn btn-danger">
           </form>
       @endif
       <div class="comments text" >
           @foreach($recipe->comments as $comment)
               <div class="comment">
                   <ul>
                       <h4 style="text-decoration: underline;color: #2ab27b">{{$comment->user->email}}</h4>
                       <li> {{$comment->text}} <i class="fas fa-comment-dots"></i> </li>
                       <li  style="float: right;">{{$comment->created_at}}
                           @if(\Illuminate\Support\Facades\Auth::user() && $comment->user_id==\Illuminate\Support\Facades\Auth::user()->id)
                               <a style="font-size:15px;" href="/delete/{{$comment->code}}" ><i class="fas fa-trash-alt"></i></a>
                           @endif
                       </li>
                   </ul>

               </div>
           @endforeach
   </div>
</div>
{{--<div class="cover" style="border-radius: 10px 10px 0px 0px;">--}}
    {{--@if(\Illuminate\Support\Facades\Auth::user())--}}
        {{--<form class="comment-form" action="/food" method="post">--}}
            {{--{{csrf_field()}}--}}
            {{--<textarea name="text"  required maxlength="1500" placeholder="Ваш комментарий:"></textarea><br>--}}
            {{--<input type="hidden" name="food_id" value="{{$recipe->id}}">--}}
            {{--<input type="submit" class="btn btn-danger">--}}
        {{--</form>--}}
    {{--@endif--}}
    {{--<div class="comments text" >--}}
        {{--@foreach($recipe->comments as $comment)--}}
           {{--<div class="comment">--}}
                {{--<ul>--}}
                    {{--<h4 style="text-decoration: underline;color: #2ab27b">{{$comment->user->email}}</h4>--}}
                    {{--<li> {{$comment->text}} <i class="fas fa-comment-dots"></i> </li>--}}
                    {{--<li  style="float: right;">{{$comment->created_at}}--}}
                        {{--@if(\Illuminate\Support\Facades\Auth::user() && $comment->user_id==\Illuminate\Support\Facades\Auth::user()->id)--}}
                            {{--<a style="font-size:15px;" href="/delete/{{$comment->code}}" ><i class="fas fa-trash-alt"></i></a>--}}
                        {{--@endif--}}
                    {{--</li>--}}
                {{--</ul>--}}

            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
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