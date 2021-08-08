@extends('backends.admin.layouts.master1')
@section('title','list categories')
@section('content')
    <div>
        <p><a class="btn btn-success btn-lg" href="{{route('authors.create')}}">add author</a></p>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">image</th>
                <th scope="col">name</th>
                <th scope="col">date of birth</th>
                <th scope="col">address</th>

            </tr>
            </thead>

            @foreach($authors as $author)
                <tbody>
                <tr>
                    <th scope="row">{{$author->id}}</th>
                    <th><img src="{{asset('storage/'.$author->image)}}" alt="{{asset('storage/'.$author->image)}}"
                             style="width: 100px;height: 100px"></th>
                    <th> {{$author->name}}</th>
                    <th> {{$author->date_of_birth}}</th>
                    <th> {{$author->address}}</th>
                    <th><a href="{{route('authors.edit',$author)}}" class="btn-warning edit">edit</a></th>
                    <th><a href="{{route('authors.destroy',$author)}}" class="btn-danger destroy"
                           onclick="confirm('are you sure')">delete</a></th>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection

