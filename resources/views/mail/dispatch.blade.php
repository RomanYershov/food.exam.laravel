<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="content">
    <h1>Дорогой(ая) {{$data['user_name']}}</h1>
    <p>Предлагаем вашему вниманию новый рецепт:</p>
    <h1>
        <a href="http://food.loc/recipe/{{$data['recipe_id']}}">{{$data['category']}}/{{$data['title']}}</a>
    </h1>
    <p>Будьте здоровы!!!</p>

    <p>опубликованно: {{$data['date']}}</p>
    <p><a href="http://food.loc/signoff/{{$data['sign_code']}}">Отписаться от рассылки</a></p>
</div>
<style>
    .content{
        background-color: rgb(242, 109, 0);
        padding: 20px;
        border-radius: 7px;
        color: white;
    }
    .content a{
        color: black;
    }
    .content a:hover{
        color: #737373;
    }
</style>
</body>
</html>