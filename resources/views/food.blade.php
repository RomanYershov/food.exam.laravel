@extends('layouts.app')
<style>
    .card:hover{
        box-shadow: black 0 0 7px;
    }
</style>
@section('content')

<div class="row">
    <div class="col-md-2" style="text-align: center">
        <p class="category" category_id="0">Все</p>
       @foreach($cat as $category)
           <p class="category" category_id="{{$category->id}}">{{$category->name}}</p>
       @endforeach
    </div>
    <div class="col-md-10">
 <div class="result">
     @foreach($recipes as $recipe)
     <div class="col-md-3" style="margin: 15px;cursor: hand">
         <div class="card well" style="width:300px;">
         <img class="card-img-top" src="https://wallpaper.wiki/wp-content/uploads/2017/04/wallpaper.wiki-Green-Best-Nature-HD-Wallpapers-PIC-WPD003784-1.jpg" alt="Card image" style="width:100%">
             <div class="card-body">
             <h4 class="card-title">{{$recipe->category->name}}</h4>
               <p class="card-text">{{$recipe->name}}</p>
             <a href="#" class="btn btn-primary">See Profile</a>
             </div>
         </div>
     </div>
     @endforeach
 </div>




    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
<script>
    $(function () {
            $('.category').click(function () {
                  var id = $(this).attr('category_id');
                  var url = "/food/show/"+id;
                  $.get(url ,function (data) {
              $('.result').html(data);
           });
        });
    });
</script>

@endsection