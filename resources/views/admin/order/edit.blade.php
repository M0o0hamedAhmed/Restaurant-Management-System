@extends('admin.layouts.master')
@section('title','Edit Order')
@push('styles')
    @include('admin.layouts.style_form')
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Edit Order</li>
@endsection
@section('content')

    <div class="row">

        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card ">
                <div class="card-header d-flex justify-content-end">
                    {{--                    <h3 class="card-title">Quick Example</h3>--}}
                    <a href="{{route('orders.index')}}" type="button" class="btn btn-dark ">Back</a>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('orders.update',$order->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>created at</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                        @foreach($order->menu_items as $menu_item)
                                        <tr>
                                            <td>{{$menu_item->id}}</td>
                                            <td>{{$menu_item->user->name}}</td>
                                            <td>{{$menu_item->total}}</td>
                                            <td>{{$menu_item->created_at}}</td>
                                            <td>

                                                <div class="input-group input-group-lg mb-3">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-info dropdown-toggle"
                                                                data-toggle="dropdown">
                                                            Actions
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li class="dropdown-item"><a class="btn " href="{{route('orders.edit',$order->id)}}">Edit</a>
                                                            </li>
                                                            {{--                                                <form method="post" action="{{route('orders.destroy',$order->id)}}">--}}
                                                            {{--                                                    @csrf--}}
                                                            {{--                                                    @method('delete')--}}
                                                            {{--                                                    <li class="dropdown-item">--}}
                                                            {{--                                                        <button class="btn" type="submit">Delete</button>--}}
                                                            {{--                                                    </li>--}}
                                                            {{--                                                </form>--}}
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












                            <label for="exampleInputEmail1"> Name : {{$menu_item->name}}  - Quentity : {{$menu_item->pivot->quantity}}  Price : {{$menu_item->pivot->price}}  -  Total : {{$menu_item->pivot->total}}</label> <br>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Text</label>
                                    <input type="number" class="form-control" placeholder="Enter ..." value="{$menu_item->pivot->quantity}}">
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
{{--                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"--}}
{{--                                   value="{{$category->name }}" required>--}}
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

