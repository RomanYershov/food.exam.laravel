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

