@extends('admin.layouts.master')
@section('title','Orders')
@push('styles')
    @include('admin.layouts.style_form')

@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{$status}} Orders</li>
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    {{--                    <h3 class="card-title">DataTable with minimal features & hover style</h3>--}}
                    {{--                    <a type="button" href="{{route('categories.create')}}" class="btn btn-info">Create Category</a>--}}

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Total</th>
                            <th>created at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr id="order_{{$order->id}}">
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>

                                    <div class="input-group input-group-lg mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a class="btn "
                                                                             href="{{route('orders.edit',$order->id)}}">Edit</a>
                                                <li class="dropdown-item">
                                                    <a class="change_order_status btn " data-order-id="{{$order->id}}">Complete</a>
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
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection
@push('scripts')
    @include('admin.layouts.script_form')

    <script >
        $('.change_order_status').on('click',function (e){
            e.preventDefault();
            let id = $(this).data('order-id')
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "PUT",
                url: "{{ route('orders.update',"id") }}".replace("id", id),
                success: function (data) {
                    $('#order_'+id).remove();
                    toastr.success('{{trans('toastr.complete order')}}');


                    // $.each(items, function (index, item) {
                    //     // console.log(item);
                    //     let optionText = item.name + ' - $' + item.price;
                    //     $('#selectOption').append($('<option>', {
                    //         value: item.id,
                    //         text: optionText
                    //     }));
                    // });

                },
                error: function (data) {

                    toastr.error('{{trans('toastr.error_occurred')}}}');

                }

            })
        });

    </script>
@endpush

