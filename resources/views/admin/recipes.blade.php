@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                Food
            </div>

            <div class="panel-body">
                @if(session()->get("status"))
                    <div class="alert alert-success">
                        {{session()->get('status')}}
                    </div>
                @endif
                <table class="table table-striped task-table">
                    <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Added</th>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)

                        <tr>
                            <td><img src="{{$recipe->image}}" alt="" height="40px" width="40px"></td>
                            <td>{{$recipe->name}}</td>
                            <td>{{$recipe->category->name}}</td>
                            <td>{{$recipe->created_at}}</td>
                            <td>
                                <form action="{{url('admin/delete/'.$recipe->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">delete</button>
                                    <a href="/admin/edit/{{$recipe->id}}" class="btn btn-warning">Edit</a>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                   <div class="well">
                       <a href="/admin/create" class="btn btn-success">Add Recipe</a>
                       <a href="/admin/createcategory" class="btn btn-success">Add Category</a>
                       <a href="/admin/createadmin" class="btn btn-success">Add Admin</a>
                   </div>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>
@endsection

