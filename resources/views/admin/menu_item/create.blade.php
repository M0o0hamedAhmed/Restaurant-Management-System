@extends('admin.layouts.master')
@section('title','Create Menu Item')
@push('styles')
    @include('admin.layouts.style_form')
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Create Menu Item</li>
@endsection
@section('content')

    <div class="row">

        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card ">
                <div class="card-header d-flex justify-content-end">
                    {{--                    <h3 class="card-title">Quick Example</h3>--}}
                    <a href="{{route('menu_items.index')}}" type="button" class="btn btn-dark ">Back</a>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('menu_items.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control  {{$errors->get('name') ?  'border-danger ': ''}}" id="name" placeholder="Enter Name" name="name"
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
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" class="form-control  {{$errors->get('description') ?  'border-danger ': ''}}" id="name" placeholder="Enter Description"
                                   name="description"
                                   value="{{old('description',"")}}" required>
                            @if($errors->has('description'))
                                @foreach($errors->get('description') as $error)
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number" class="form-control  {{$errors->get('price') ?  'border-danger ': ''}}" id="name" placeholder="Enter Price" name="price"
                                   value="{{old('price',"")}}" required>
                            @if($errors->has('price'))
                                @foreach($errors->get('price') as $error)
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Minimal</label>
                            <select class="form-control select2bs4" style="width: 100%;" name="category_id" required>
                                <option></option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->

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

