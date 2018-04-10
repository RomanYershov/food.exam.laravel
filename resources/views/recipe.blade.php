@extends('layouts.app')
<style>
    .cover{
        background-color: #131212c2;
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
        text-align: center;
        /*color:  #d6e25e;*/
        text-shadow: black 2px 2px 7px;
    }
    .text img{
        float: right;
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
       @foreach(preg_split('/[\r\n]+/', $recipe->recipe) as $row)
           <span>{{$row}}</span><br>
           @endforeach
    </div>

</div>
<div class="cover" style="border-radius: 0px">
    @if(\Illuminate\Support\Facades\Auth::user())
        <form class="comment-form" action="/food" method="post">
            {{csrf_field()}}
            <textarea name="text" id="" cols="50" rows="5" style="background-color: #0909095c" required maxlength="300" placeholder="Ваш комментарий:"></textarea><br>
            <input type="hidden" name="food_id" value="{{$recipe->id}}">
            <input type="submit" class="btn btn-danger" style="float: right">
        </form>
    @endif
    <div class="comments text" style="text-align: justify">
        @foreach($recipe->comments as $comment)
            <span  class="badge badge-info">{{$comment->user->email}}</span>
      <p>~~~ {{$comment->text}} ~~~</p>

        @endforeach
        <div class="result"></div>


    </div>
</div>


<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
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
                 $('.result').html($('.result').html()+res);
                 $('textarea').val("");
              }
          });


           return false;
       });
    });
</script>
    @endsection