<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a wire:navigate class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a wire:navigate href="{{route('dashboard')}}" class="nav-link">Home</a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown dropdown-notification">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span id="notifications_count" data-count="{{count($notifications)}}"
                      class="badge badge-warning navbar-badge">{{count($notifications)}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right overflow-auto "
                 style="max-height: 200px; overflow-y: auto;">
                <span class="dropdown-item dropdown-header">{{count($notifications)}}  Orders</span>
                {{--                <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>--}}
                <div id="notification_container"></div>
                @foreach($notifications->take(5) as $notification)
                    <div class="dropdown-divider"></div>
                    <a wire:navigate href="" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> {{substr($notification->description,0,15)}}
                        <span
                            class="float-right text-muted text-sm">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>
                    </a>
                @endforeach
                <div class="dropdown-divider"></div>
                <a wire:navigate href="/orders?status=pending" class="dropdown-item dropdown-footer">See All
                    Orders</a>
            </div>
        </li>
    </ul>
</nav>
