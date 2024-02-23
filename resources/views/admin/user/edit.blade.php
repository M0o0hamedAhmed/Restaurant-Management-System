@extends('admin.layouts.master')
@section('title','Create User')
@push('styles')
    @include('admin.layouts.style_form')
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Create User</li>
@endsection
@section('content')

    <div class="row">

        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card ">
                <div class="card-header d-flex justify-content-end">
                    {{--                    <h3 class="card-title">Quick Example</h3>--}}
                    <a href="{{route('users.index')}}" type="button" class="btn btn-dark ">Back</a>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('users.update',$user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
                                   value="{{$user->name }}" required>
                            @if($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                                   name="email" value="{{$user->email}}" required>
                            @if($errors->has('email'))
                                @foreach($errors->get('email') as $error)
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>phone</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control"
                                       name="phone_number"
                                       placeholder="Enter mobile number "
                                       value="{{$user->phone_number}}" min="10" required>
                                @if($errors->has('phone_number'))
                                    @foreach($errors->get('phone_number') as $error)
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                            <!-- /.input group -->
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary d-flex justify-content-end">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->
    </div>

@endsection
@push('scripts')

    @include('admin.layouts.script_form')

@endpush

