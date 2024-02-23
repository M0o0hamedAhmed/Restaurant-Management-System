@extends('admin.layouts.master')
@section('title','Dashboard')
@push('styles')

{{--    @include('admin.layouts.style_form')--}}
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
    <div class="row">

    </div>


@endsection
@push('scripts')

{{--    @include('admin.layouts.script_fom')--}}

@endpush

