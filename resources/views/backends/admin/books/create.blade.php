@extends('backends.admin.layouts.master1')
@section('content')
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <h3>CREATE BOOK</h3>
            <?php
            $authors = \App\Models\Author::all();
            $categories = \App\Models\Category::all();
            ?>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="book" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">year_publication</label>
                <input type="text" class="form-control" id="year_publication" name="year_publication">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"><span> author </span> <span><a class="btn btn-success"
                                                                                href="{{route('authors.create')}}">add author</a></span></label>
                @if(isset($authors) )
                    <select class="form-control" id="" name="author">
                        <option>select author</option>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div class="mb-3">
                <label for="" class="form-label"><span> category </span> <span><a class="btn btn-success"
                                                                                  href="{{route('categories.create')}}">add category</a></span></label>

                @if(isset($categories) )
                    <select class="form-control" id="" name="category">
                        <option>select category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div class="mb-3">
                <label for="" class="form-label">content</label>
                <input type="text" class="form-control" id="contents" name="contents">
            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
    </div>
@endsection

