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
    <style>

    </style>
@endforeach

