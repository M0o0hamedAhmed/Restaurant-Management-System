@extends('admin.layouts.master')
@section('title','Users')
@push('styles')
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Users</li>
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    {{--                    <h3 class="card-title">DataTable with minimal features & hover style</h3>--}}
                    <a type="button" href="{{route('users.create')}}" class="btn btn-info">Create User</a>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>phone number</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>

                                    <div class="input-group input-group-lg mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a class="btn " href="{{route('users.edit',$user->id)}}">Edit</a>
                                                </li>
                                                <form method="post" action="{{route('users.destroy',$user->id)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <li class="dropdown-item">
                                                        <button class="btn" type="submit">Delete</button>
                                                    </li>
                                                </form>
                                                {{--                                        <li class="dropdown-divider"></li>--}}
                                            </ul>
                                        </div>
                                        <!-- /btn-group -->
                                        {{--                                <input type="text" class="form-control">--}}
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection
@push('scripts')
@endpush

