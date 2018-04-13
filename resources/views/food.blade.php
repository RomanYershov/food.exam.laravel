@extends('layouts.app')
<style>
    .card{
        color: #f1d393;
        font-weight: bold;
    }
    .card:hover{
        box-shadow: black 0 0 7px;transform: scale(1.008);
    }
    .box{
        background-color: #0e0e0e82;
        padding: 5px;
        border-radius: 7px;
        margin-bottom: 5px;
    }

    .category-item:hover{
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
          <div class="list-group">
              <div class="list-group-item list-group-item-success  category-item" category_id="0">
                  <span>Все</span>
              </div>
          @foreach($categories as $category)
              <div class="list-group-item list-group-item-warning category-item" category_id="{{$category->id}}">
                  <span>{{$category->name}}</span>
              </div>

          @endforeach
          </div>
      </div>

    </div>
    <div class="col-md-10">
        <div class="result">
     @foreach($recipes as $recipe)
     <div class="col-md-3" style="margin: 15px;cursor: hand">
         <div class="card well" recipe_id="{{$recipe->id}}" style="width:220px;height: 180px;border: none; background-image: url({{$recipe->image}});
                 background-repeat: no-repeat;
                 background-size: cover;
                 background-color: #2ab27b">
             <div class="card-body">
            <div class="box">
                <h4 class="card-title">{{$recipe->category->name}}</h4>
                <p class="card-text">{{$recipe->name}}</p>
            </div>
             <a href="recipe/{{$recipe->id}}" class="btn btn-danger">См. Рецепт</a>
             </div>
         </div>
     </div>
     @endforeach
 </div>

    </div>
</div>
{{$recipes->links()}}
@endsection

@section('scripts')
    <script>
        $(function () {
//        var categoryId = 0;
            $('.category-item').click(function () {
                var item = $(this);
                var id = item.attr('category_id');
                var url = "/food/show/";
                $.get(url ,{id:id},function (data) {
                    $('.result').html(data);
//                      console.log($('.category-item').attr('category_id' , categoryId));
//              item.addClass('active');
//                      categoryId = id;
                });
            });
//            $('.card').click(function () {
//                var recipeId = $(this).attr('recipe_id');
//                location.href = '/recipe/'+recipeId;
//            });
        });
    </script>
    @endsection