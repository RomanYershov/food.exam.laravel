
@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Category
                </div>

                <div class="panel-body">



                    <form action="/admin/addcategory" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-plus"></i>Add Category
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