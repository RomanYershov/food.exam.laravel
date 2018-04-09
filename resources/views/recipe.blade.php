@extends('layouts.app')
<style>
    .cover{
        background-color: #00000059;
        height: auto;
        padding: 20px;
        border-radius: 50px;
        margin: 100px;

    }
    .text{
        overflow: auto;
        color: wheat;
        text-align: center;
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
        <img src="{{$recipe->image}}" alt="" class="float-right img-fluid">
       @foreach(preg_split('/[\r\n]+/', $recipe->recipe) as $row)
           <span>{{$row}}</span><br>
           @endforeach
    </div>
</div>


    @endsection