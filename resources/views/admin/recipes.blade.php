@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                Food
                {{--<a href="/employees?lang=en">en</a>--}}
                {{--<a href="/employees?lang=ru">ru</a>--}}
                {{--<a href="/employees?lang=kz">kz</a>--}}
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
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)

                        <tr>
                            <td><img src="{{$recipe->image}}" alt="" height="40px" width="40px"></td>
                            <td>{{$recipe->name}}</td>
                            <td>{{$recipe->category->name}} food</td>
                            <td>
                                <form action="{{url('admin/'.$recipe->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">delete</button>
                                    <a href="/admin/{{$recipe->id}}" class="btn btn-info">More</a>
                                    <a href="/admin/{{$recipe->id}}/edit" class="btn btn-warning">Edit</a>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                   <div class="well">
                       <a href="/admin/create" class="btn btn-success">Add recipe</a>
                   </div>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>
    {{--{{$employees->links()}}--}}
@endsection
