@extends('backends.admin.layouts.master1')
@section('title','list books')
@section('content')
    <div>
        <p><a class="btn btn-success btn-lg" href="{{route('books.create')}}">add book</a></p>
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
                <th scope="col">image</th>
                <th scope="col">author</th>
                <th scope="col">category</th>
                <th scope="col">year publication</th>
                <th scope="col">content</th>
                <th scope="col">view</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <?php
            $books = \App\Models\Book::all();
            $authors = \App\Models\Author::all();
            $categories = \App\Models\Category::all();
            ?>
            @foreach($books as $book)
                <tbody>
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <th> {{$book->name}}</th>
                    <th><img src="{{asset('storage/'.$book->image)}}" alt="{{asset('storage/'.$book->image)}}"
                             style="width: 100px;height: 100px"></th>
                    {{--@if(isset($book))
                        @foreach($categories as $category)
                        <th>{{$category->name}}</th>
                        @endforeach
                    @endif--}}
                    <th> {{$book->author_id}}</th>
                    <th> {{$book->category_id}}</th>
                    <th> {{$book->year_publication}}</th>
                    <th> {{$book->content}}</th>
                    <th> {{$book->view}}</th>
                    <th><a href="{{route('books.edit',$book)}}" class="btn-warning edit">edit</a></th>
                    <th><a href="{{route('books.destroy',$book)}}" class="btn-danger destroy"
                           onclick="confirm('are you sure')">delete</a></th>
                </tr>
                </tbody>
            @endforeach
        </table>

    </div>
@endsection

