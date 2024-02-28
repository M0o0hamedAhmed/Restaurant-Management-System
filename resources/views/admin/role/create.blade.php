@extends('admin.layouts.master')
@section('title','Create Role')
@push('styles')
    @include('admin.layouts.style_form')
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Create Role</li>
@endsection
@section('content')

    <div class="row">

        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card ">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('roles.index')}}" type="button" class="btn btn-dark ">Back</a>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('roles.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control {{$errors->get('name') ?  'border-danger ': ''}} " id="name" placeholder="Enter Name" name="name"
                                   value="{{old('name',"")}}" required>
                            @if($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                                    </a>
                                @endforeach
                            @endif
                        </div>


                        <div class="col-md-6">
                            <div class="form-group select2-blue">
                                <label>Permission Name</label>
                                <select name="permissions[]" class="  select2" multiple="multiple"
                                        data-placeholder="Select a State"
                                        style="width: 100%;">
                                    @foreach($permissions as $permission)
                                        <option >{{$permission->name}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('permissions'))
                                    @foreach($errors->get('permissions') as $error)
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                            <!-- /.form-group -->
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

