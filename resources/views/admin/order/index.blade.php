@php
    $title =  ucfirst($status) . ' ' . __('Orders')
@endphp
@extends('admin.layouts.master')
@section('title',$title)
@push('styles')
    @include('admin.layouts.style_form')

@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{$title}} </li>
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="order_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{__('ID')}}</th>
                            <th>{{__('User Name')}}</th>
                            <th>{{__('Total')}}</th>
                            <th>{{__('created at')}}</th>
                            <th>{{__('Actions')}}</th>
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

    @if ($orders->hasPages())
        <div class="pagination-wrapper  d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    @endif

@endsection
@push('scripts')
    @include('admin.layouts.script_form')

    <script>
        $('.change_order_status').on('click', function (e) {
            e.preventDefault();
            let id = $(this).data('order-id')
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "PUT",
                url: "{{ route('orders.update',"id") }}".replace("id", id),
                success: function (data) {
                    $('#order_' + id).remove();
                    toastr.success('{{trans('toastr.complete order')}}');
                },
                error: function (data) {
                }

            })
        });

        $(function () {
            $("#order_table").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#order_table_wrapper .col-md-6:eq(0)');

        });

    </script>
@endpush

