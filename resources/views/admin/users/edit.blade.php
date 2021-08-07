@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            Register
        </div>
        <div class="card-body">
            <form method="post" action="{{route('users.edit', $user->id)}}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{$user->name}}" placeholder="Enter name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}"
                           placeholder="Enter email" readonly>
                </div>
                {{--                <div class="form-group row">--}}
                {{--                    <label class="col-sm 2 col-form-label">Role</label>--}}
                {{--                    <div class="col-sm 10 ">--}}
                {{--                        @foreach($roles as $role)--}}
                {{--                            <div class="col-form-check mt-2">--}}
                {{--                                <div class="form-check">--}}
                {{--                                    <input class="form-check-input" type="checkbox" name="roles[{{$role->id}}]" value="{{$role->id}}" id="roleCheck{{$role->id}}">--}}
                {{--                                    <label class="form-check-label" for="roleCheck{{$role->id}}">--}}
                {{--                                        {{$role->name}}--}}
                {{--                                    </label>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        @endforeach--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
@endsection


