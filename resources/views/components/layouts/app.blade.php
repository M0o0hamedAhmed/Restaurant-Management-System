<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.layouts.head')
    @include('admin.layouts.style_form')
    {{--    @section('title', $title ?? 'Page Title')--}}
    <title>{{ $title ?? config('app.name' ,'Laravel') }}</title>

</head>
<body>
<div class="wrapper">
    <!-- Navbar -->
    <!-- /.navbar -->
    @include('admin.layouts.main-header')


    <!-- Main Sidebar Container -->
    @include('admin.layouts.main-sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        @include('admin.layouts.page-header')
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                {{ $slot }}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->


    <!-- Main Footer -->
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
        let route = "/orders"; // Define the route template
        route = route.replace(':id', order.id);
        let newOrder = `<div class="dropdown-divider"></div>
                    <a href="${route}" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> ${order.description.substr(0, 10)}
        <span  class="float-right text-muted text-sm">${moment(order.created_at).fromNow()}</span></a>`
        $('#notification_container').after(newOrder)
        toastr.success('New Order #' + order.id);
        document.getElementById('newOrderSound').play();

    });
</script>
{{--@script--}}
{{--@section('script')--}}
{{--    <script>--}}

{{--    </script>--}}
{{--@endsection--}}
{{--@endscript--}}

</body>
</html>
