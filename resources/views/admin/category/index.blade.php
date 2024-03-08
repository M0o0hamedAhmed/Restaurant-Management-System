@extends('admin.layouts.master')
@section('title','Categories')
@push('styles')
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection
@section('content')

    @livewire('category')



{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header d-flex justify-content-end">--}}
{{--                    <a type="button" href="{{route('categories.create')}}" class="btn btn-info">Add Category</a>--}}
{{--                </div>--}}
{{--                <!-- /.card-header -->--}}
{{--                <div class="card-body">--}}
{{--                    <table id="example2" class="table table-bordered table-hover">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>ID</th>--}}
{{--                            <th>Name</th>--}}
{{--                            <th>Menu Item Count</th>--}}
{{--                            <th>Latest Menu Item</th>--}}
{{--                            <th>Lowest Menu Item</th>--}}
{{--                            <th>Actions</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <tr>--}}
{{--                                <td>{{$category->id}}</td>--}}
{{--                                <td>{{$category->name}}</td>--}}
{{--                                <td>{{$category->menuItem->count()}}</td>--}}
{{--                                <td>{!! $category?->latestMenuItem?->name .' <br> '. $category?->latestMenuItem?->price . ' EGP '!!}</td>--}}
{{--                                <td>{!! $category?->lowestPriceMenuItem?->name .' <br> '. $category?->lowestPriceMenuItem?->price . ' EGP '!!}</td>--}}
{{--                                <td>--}}

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
                                            </ul>
                                        </div>
                                        <!-- /btn-group -->
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

