<!doctype html>
<html lang="en" dir="ltr">
<head>
    @include('admin.layouts.head')
    @include('admin.layouts.style_form')

</head>
<body class="hold-transition sidebar-mini">
<audio id="newOrderSound" preload="auto">
    <source src="{{asset('sounds/oder_please.mp3')}}" type="audio/mpeg">
</audio>
<div class="wrapper">
    @include('admin.layouts.main-header')
    @include('admin.layouts.main-sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title','Page Title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @section('breadcrumb')
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Main</a></li>
                            @show
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content','Content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    @include('admin.layouts.footer')
</div>
@include('admin.layouts.script')
@include('admin.layouts.script_form')


<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('7a27b568dee67a731048', {
        cluster: 'mt1'
    });

    var channel = pusher.subscribe('new-order');
    channel.bind('new-order', function (data) {
        let order = data.order;
        let notificationsCount = $('#notifications_count').attr('data-count');
        notificationsCount++;
        $('#notifications_count').attr('data-count', notificationsCount)
        $('#notifications_count').text(notificationsCount)
        let route = "{{ route('orders.edit', ':id') }}"; // Define the route template
        route = route.replace(':id', order.id);
        let newOrder = `<div class="dropdown-divider"></div>
                    <a href="${route}" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> ${order.description.substr(0,10)}
        <span  class="float-right text-muted text-sm">${moment(order.created_at).fromNow()}</span></a>`
        $('#notification_container').after(newOrder)
        toastr.success('New Order #' + order.id);
        document.getElementById('newOrderSound').play();

    });
</script>
</body>
</html>
