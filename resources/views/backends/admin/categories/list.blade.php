@extends('backends.admin.layouts.master1')
@section('title','list categories')
@section('content')
    <div>
        <p><a class="btn btn-success btn-lg" href="{{route('categories.create')}}">add categories</a></p>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>

                <th scope="col">name</th>


            </tr>
            </thead>

            @foreach($categories as $category)
                <tbody>
                <tr>
                    <th scope="row">{{$category->id}}</th>

                    <th> {{$category->name}}</th>
                    <th><a href="{{route('categories.edit',$category)}}" class="btn-warning edit">edit</a></th>
                    <th><a href="{{route('categories.destroy',$category)}}" class="btn-danger destroy"
                           onclick="confirm('are you sure')">delete</a></th>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
