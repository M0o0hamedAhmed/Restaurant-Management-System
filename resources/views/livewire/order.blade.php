<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
            </div>
            <!-- /.card-header [visible -keep-alive  ] -->
            <div {{$status == 'pending' ? 'wire:poll.visible.5s' : ''}} class="card-body">
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
                            <td>{{$order?->user?->name}}</td>
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
                                                                         href="">Edit</a>
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
