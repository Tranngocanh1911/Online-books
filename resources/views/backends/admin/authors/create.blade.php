@extends('backends.admin.layouts.master1')
@section('content')
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <h3>CREATE author</h3>
            <div class="mb-3">
                <label for="" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">date_of_birth</label>
                <input type="text" class="form-control" id="" name="dateOfBirth">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">address</label>
                <input type="text" class="form-control" id="" name="address">
            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
    </div>
@endsection


