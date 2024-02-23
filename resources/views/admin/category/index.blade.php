@extends('admin.layouts.master')
@section('title','Category')
@push('styles')
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    {{--                    <h3 class="card-title">DataTable with minimal features & hover style</h3>--}}
                    <a type="button" href="{{route('categories.create')}}" class="btn btn-info">Create Category</a>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>

                                    <div class="input-group input-group-lg mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a class="btn " href="{{route('categories.edit',$category->id)}}">Edit</a>
                                                </li>
                                                <form method="post" action="{{route('categories.destroy',$category->id)}}">
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

