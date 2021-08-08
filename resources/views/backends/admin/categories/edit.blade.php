@extends('backends.admin.master')
@section('content')
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
            </div>
            <button type="submit" class="btn btn-success"> Update</button>
        </form>
    </div>
@endsection

