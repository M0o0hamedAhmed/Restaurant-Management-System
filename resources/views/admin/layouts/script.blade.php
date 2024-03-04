<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.tailwindcss.com"></script>
{{--<script src="{{ asset('js/tailwind-3.4.1.css') }}"></script>--}}

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
@stack('scripts')
