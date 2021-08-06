@extends('backends.admin.layouts.master1')
@section('content')
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            {{--  @method('PUT')--}}

            <div class="mb-3">
                <label for="" class="form-label">img</label>
                <input type="file" class="form-control" id="image" name="image" value="{{ $book->image }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">author</label>
                <?php
                $authors = \App\Models\Author::all();
                ?>
                @if(isset($authors) && count($authors)>0)
                    <select class="form-control" id="" name="author">
                        <option>author</option>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">category</label>
                <?php
                $categories = \App\Models\Category::all();
                ?>
                @if(isset($categories) && count($categories) > 0)
                    <select class="form-control" id="" name="category">
                        <option>category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div class="mb-3">
                <label for="" class="form-label">year publication</label>
                <input type="text" class="form-control" id="" name="year_publication"
                       value="{{ $book->year_publication }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">content</label>
                <input type="text" class="form-control" id="" name="contents" value="{{ $book->content }}">
            </div>
            <button type="submit" class="btn btn-success"> Update</button>

        </form>

    </div>
@endsection

