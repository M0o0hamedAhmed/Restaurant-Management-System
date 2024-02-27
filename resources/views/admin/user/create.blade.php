@extends('admin.layouts.master')
@section('title',trans('main.Create User'))
@push('styles')
    @include('admin.layouts.style_form')
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{trans('main.Create User')}}</li>
@endsection
@section('content')

    <div class="row">

        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card ">
                <div class="card-header d-flex justify-content-end">
                    {{--                    <h3 class="card-title">Quick Example</h3>--}}
                    <a href="{{route('users.index')}}" type="button" class="btn btn-dark ">{{trans('main.Back')}}</a>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('users.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
                                   value="{{old('name',"")}}" required>
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
                                   name="email" value="{{old('email','')}}" required>
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
                                <input type="number" class="form-control"
                                       name="phone_number"
                                       placeholder="Enter mobile number "
                                       value="{{old('phone_number')}}" min="10" max="12" required>
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
                        <!-- /.form group -->

                        <div class="col-md-6">
                            <div class="form-group select2-blue">
                                <label>Roles Name</label>
                                <select name="roles[]" class="  select2" multiple="multiple"
                                        data-placeholder="Select a State"
                                        style="width: 100%;">
                                    @foreach($roles as $role)
                                        <option >{{$role->name}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('roles'))
                                    @foreach($errors->get('roles') as $error)
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Password" name="password" required>
                            @if($errors->has('password'))
                                @foreach($errors->get('password') as $error)
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                                        </a>
                                @endforeach
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password Confirmation</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="password confirmation" name="password_confirmation" required>
                            @if($errors->has('password_confirmation'))
                                @foreach($errors->get('password_confirmation') as $error)
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                                    </a>
                                @endforeach
                            @endif
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

