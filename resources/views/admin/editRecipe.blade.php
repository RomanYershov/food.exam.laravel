
@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Recipe
                </div>

                <div class="panel-body">



                    <form action="/admin/update" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}



                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{$recipe->name}}" >
                                <input type="hidden" name="id" value="{{$recipe->id}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-6">
                                <select name="category_id" id="" >
                                    @foreach($categories as $category)
                                        <option @if($recipe->category->id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-6">
                                <input type="file" name="image" id="task-name" class="form-control">
                                <img src="{{$recipe->image}}" alt="" width="80px" height="80px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Text</label>
                            <div class="col-sm-6">
                                <textarea name="recipe" id="" cols="60" rows="10">{{$recipe->recipe}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-plus"></i>Update
                                </button>
                            </div>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection