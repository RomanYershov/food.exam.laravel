@extends('layouts.app')
<style>
    .card{
        color: #f1d393;
        font-weight: bold;


    -webkit-transition: all 300ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
        -moz-transition: all 300ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
        -o-transition: all 300ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
        transition: all 300ms cubic-bezier(0.215, 0.610, 0.355, 1.000); /* easeOutCubic */

        -webkit-transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
        -moz-transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
        -o-transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
        transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000); /* easeOutCubic */
    }
    .card:hover{
        box-shadow: black 0px 0px 7px;
        transform: scale(1.3);
        z-index: 1;
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
        <div class="col-md-2" style="text-align: center;font-weight: bold;">

            <div class="categories">
                <div class="list-group">
                    <div class="list-group-item list-group-item-success  category-item" category_id="0">
                        <span>Все</span>
                    </div>
                    @foreach($categories as $category)
                        <div class="list-group-item list-group-item-warning category-item" category_id="{{$category->id}}">
                            <span>{{$category->name}}</span><i class="fas fa-arrow-circle-right"></i>
                        </div>

                    @endforeach
                </div>
            </div>

        </div>

        <div class="col-md-10" style="display: flex">
            <div class="result">
                @foreach($recipes as $recipe)
                    <div class="col-md-3 well card" recipe_id="{{$recipe->id}}"
                         style="width:180px;
                                 height: 220px;
                                 margin: 10px;
                                 cursor: hand;
                                 border: none;
                                 background-image: url({{$recipe->image}});
                                 background-repeat: no-repeat;
                                 background-size: cover;
                                 background-color: #2ab27b;">

                        <div class="card-body">
                            <div class="box">
                                <h4 class="card-title">{{$recipe->category->name}}</h4>
                                <p class="card-text">{{$recipe->name}}</p>
                            </div>
                            <a href="recipe/{{$recipe->id}}" style="display: block" class="btn btn-danger">См. Рецепт</a>
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