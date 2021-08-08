@extends('backends.admin.master')
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
                <input type="file" class="form-control " id="image" name="image">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>
            <div class="mb-3">
                <label for="book" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">year_publication</label>
                <input type="text" class="form-control"
                       id="year_publication @error('year_publication') is-invalid @enderror" name="year_publication">
                @error('year_publication')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> <span><a class="btn btn-success"
                                                                                href="{{route('authors.create')}}">add author</a></span></label>
                @if(isset($authors) )
                    <select class="form-control @error('author') is-invalid @enderror" id="" name="author">
                        <option>select author</option>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                @endif
                @error('author')
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-3">
                <label for="" class="form-label"><span><a class="btn btn-success"
                                                                                  href="{{route('categories.create')}}">Add category</a></span></label>

                @if(isset($categories) )
                    <select class="form-control @error('category') is-invalid @enderror" id="" name="category">
                        <option>select category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                @endif
                @error('category')
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-3">
                <label for="" class="form-label">content</label>
                <input type="text" class="form-control @error('content') is-invalid @enderror" id="contents"
                       name="contents">
                @error('contents')
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
    </div>
@endsection

