
@foreach($recipes as $recipe)
    <div class="col-md-3 well card" recipe_id="{{$recipe->id}}"
         style="width:180px;
                height: 220px;
                border: none;
                margin: 10px;
                cursor: hand;
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


