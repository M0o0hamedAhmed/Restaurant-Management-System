@extends('admin.layouts.master')
@section('title','Create Category')
@push('styles')
    @include('admin.layouts.style_form')
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Create Category</li>
@endsection
@section('content')

    <div class="row">

        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card ">
                <div class="card-header d-flex justify-content-end">
                    {{--                    <h3 class="card-title">Quick Example</h3>--}}
                    <a href="{{route('categories.index')}}" type="button" class="btn btn-dark ">Back</a>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('categories.store')}}" method="post">
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

