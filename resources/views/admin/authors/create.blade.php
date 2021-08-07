@extends('backends.admin.layouts.master1')
@section('content')
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <h3>CREATE AUTHOR</h3>
            <div class="mb-3">
                <label for="" class="form-label">image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">date_of_birth</label>
                <input type="text" class="form-control @error('dateOfBirth') is-invalid @enderror" id=""
                       name="dateOfBirth">
                @error('dateOfBirth')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="" name="address">
                @error('address')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
    </div>
@endsection


