@extends('backends.admin.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">User list</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a class="btn btn-success" href="{{route('users.create')}}">Add user</a>
                </h6>
            </div>
            <div class="card-body">
                @if(session()->has('add_success'))
                    {{ session()->get('add_succes') }}
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @forelse($user->roles as $role)
                                        {{$role ->name. ' '}}
                                    @empty
                                        User
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('users.delete', $user->id)}}"
                                       class="btn btn-outline-danger">Delete</a>
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-info">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

