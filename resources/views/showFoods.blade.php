
@foreach($recipes as $recipe)
    <div class="col-md-3" style="margin: 15px;cursor: hand">
        <div class="card well" style="width:220px; height: 180px;border: none; background-image: url({{$recipe->image}});
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


{{--@section('scripts')--}}
    {{--<script>--}}
        {{--$(function () {--}}
            {{--$('.card').click(function () {--}}
                {{--var recipeId = $(this).attr('recipe_id');--}}
                {{--location.href = '/recipe/'+recipeId;--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}

