@extends('admin.layouts.master')
@section('title',__('Edit Order'))
@push('styles')

        @include('admin.layouts.style_form')

@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{__('Edit Order')}}</li>
@endsection
@section('content')
    <!-- row -->
    <!-- main body -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{$error}} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button id="add_menu_item" type="button" class="button x-small btn btn-primary"  data-id="{{$order->id}}" data-toggle="modal" data-target="#addModel">
                        {{ trans('main.add menu item') }}
                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> {{trans('main.Product Name')}}</th>
                                <th> {{trans('main.Quantity')}}</th>
                                <th> {{trans('main.price')}}</th>
                                <th> {{trans('main.total')}}</th>
                                <th> {{trans('main.action')}}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>


                    <!-- add_modal_Grade -->
                    <div class="modal fade" id="addModel" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('main.Add Menu Item') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form id="myFormAdd"  method="POST">
                                        @csrf
                                        <input name="order_id" type="hidden" value="{{$order->id}}">
                                        <div class="row">
                                            <div class="form-group">
                                                <label>Select A product</label>
                                                <select name="menu_item_id"  id="selectOption" class="form-control">

                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="Quantity"
                                                       class="mr-sm-2">{{ trans('main.Quantity') }}
                                                    :</label>
                                                <input type="number" class="form-control" name="quantity" required>
                                            </div>
                                        </div>

                                        <br><br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('main.Close') }}</button>
                                            <button type="submit"
                                                    class="btn btn-success">{{ trans('main.submit') }}</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    {{--                    Edit Model --}}

                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('main.edit_Grade') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- edit_form -->
                                    <form id="myFormEdit"  method="POST">
                                        @csrf
                                        <input  type="hidden" name="id" class="form-control" >
                                        <div class="row">
                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2">{{ trans('main.stage_name_ar') }}
                                                    :</label>
                                                <input id="Name" type="text" name="Name" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="Name_en"
                                                       class="mr-sm-2">{{ trans('main.stage_name_en') }}
                                                    :</label>
                                                <input type="text" class="form-control" name="Name_en" required>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('main.Close') }}</button>
                                            <button type="submit"
                                                    class="btn btn-success">{{ trans('main.submit') }}</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- row closed -->

@endsection
@push('scripts')
        @include('admin.layouts.script_form')
        <!-- datatables -->

        <script>
            // Show All Data
            $(function () {
                let table = $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    searching: false, // Disable search input
                    paging: false, // Disable pagination
                    ajax: {
                        url: '{!! route('orders.show', $order->id) !!}',
                        dataSrc: 'data.items' // Access the items array within the data object
                    },
                    columns: [
                        {data: 'product_id', name: 'product_id'},
                        {data: 'name', name: 'name'},
                        {data: 'quantity', name: 'quantity'},
                        {data: 'price', name: 'price'},
                        {data: 'total', name: 'total'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                });
                table.draw();
            });

            // Store
            $(function () {
                $('#myFormAdd').submit(function (event) {
                    event.preventDefault();
                    const formData = $(this).serializeArray();
                    // let orderId = $('input[name="order_id"]').val();
                    $.ajax({
                        url: "{{ route('orders.set_new_item_in_order') }}",
                        method: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);
                            $('#myFormAdd').trigger('reset');
                            $('#dataTable').DataTable().ajax.reload();
                            $('.close').click()

                            toastr.success('{{ trans('toastr.added_successfully')}}');

                        },
                        error: function (xhr, status, error) {
                            toastr.error('{{trans('toastr.error_occurred')}}}');

                        }
                    })
                });
            })

            $('#add_menu_item').on('click',function (e){
                e.preventDefault();
                    let id = $(this).data('id')
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: "{{ route('orders.get_products_not_in_order',"id") }}".replace("id", id),
                    success: function (data) {
                        // console.log(data.data);
                        let items = data.data;
                            $('#selectOption').empty();
                        $.each(items, function (index, item) {
                            // console.log(item);
                            let optionText = item.name + ' - $' + item.price;
                            $('#selectOption').append($('<option>', {
                                value: item.id,
                                text: optionText
                            }));
                        });

                    },
                    error: function (data) {

                        toastr.error('{{trans('toastr.error_occurred')}}}');

                    }

                })
            });

            //Edit
            $('#dataTable').on('click', '.change_quantity', function (e) {
                e.preventDefault();
                let type = $(this).data('type');
                let menu_item_id = $(this).data('menu-item-id');
                let order_id = $(this).data('order-id');
                let data = {
                    menu_item_id : menu_item_id,
                    order_id : order_id,
                    type : type,
                }
                console.log("Request URL: " + "{{ route('order_items.update',"id") }}".replace("id", order_id))

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "PUT",
                    url: "{{ route('order_items.update',"id") }}".replace("id", order_id),
                    data:data,
                    success: function (data) {
                        toastr.success('success');

                        console.log(data);
                        $('#myFormAdd').trigger('reset');
                        $('#dataTable').DataTable().ajax.reload();
                    },
                    error: function (data) {
                        console.log(data)
                        toastr.error(data.responseJSON.message);

                    }

                })

            })



        </script>
@endpush

