@extends('backends.admin.layouts.master1')
@section('content')
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="image"
                       value="{{asset('storage/'.$author->image)}}">
                <img src="{{asset('storage/'.$author->image)}}" style="width: 100px; height: 100px" alt="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">date of birth</label>
                <input type="text" class="form-control" id="" name="dateOfBirth" value="{{ $author->date_of_birth }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">address</label>
                <input type="text" class="form-control" id="" name="address" value="{{ $author->address }}">
            </div>
            <button type="submit" class="btn btn-success"> Update</button>

        </form>

    </div>
@endsection
