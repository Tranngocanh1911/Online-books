@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            Add new user
        </div>
        <div class="card-body">
            <form method="post" action="{{route('users.store')}}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Enter name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter email">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <div class="col-auto">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-eye-slash"></i></div>
                            </div>
                            <input name="password" type="password" class="form-control"  placeholder="">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label >Password Confirm</label>
                    <div class="col-auto">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-eye-slash"></i></div>
                            </div>
                            <input name="password confirm" type="password" class="form-control"  placeholder="">
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-sm 2 col-form-label">Role</label>
                    <div class="col-sm 10 ">
                        @foreach($roles as $role)
                            <div class="col-form-check mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[{{$role->id}}]" value="{{$role->id}}" id="roleCheck{{$role->id}}">
                                    <label class="form-check-label" for="roleCheck{{$role->id}}">
                                        {{$role->name}}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
