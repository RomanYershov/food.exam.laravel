@extends('layouts.app')
<style>
    .card:hover{
        box-shadow: black 0 0 7px;
    }
    .category{
        color: #009688;
    }
    .category:hover{
        cursor: hand;
        text-shadow: #969696 0px 4px 7px;
    }
    .categories{
        padding-top: 20px;
        height: 100%;
        background-color: #f2dede7d;
    }
</style>
@section('content')

<div class="row">
    <div class="col-md-2" style="text-align: center;font-weight: bold">

      <div class="categories">
          <p class="category" category_id="0">Все</p>
          @foreach($categories as $category)
              <p class="category" category_id="{{$category->id}}">{{$category->name}}</p>
          @endforeach
      </div>

    </div>
    <div class="col-md-10">
        <div class="result">
     @foreach($recipes as $recipe)
     <div class="col-md-3" style="margin: 15px;cursor: hand">
         <div class="card well" style="width:220px; background-image: url({{$recipe->image}});
                 background-repeat: no-repeat;
                 background-size: cover;
                 background-color: #2ab27b">
             <div class="card-body">
             <h4 class="card-title">{{$recipe->category->name}}</h4>
               <p class="card-text">{{$recipe->name}}</p>
             <a href="recipe/{{$recipe->id}}" class="btn btn-primary">См. Рецепт</a>
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
{{$recipes->links()}}
@endsection