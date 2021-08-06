@extends('backends.admin.layouts.master1')
@section('content')
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <h3>CREATE categories</h3>

            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
    </div>
@endsection

