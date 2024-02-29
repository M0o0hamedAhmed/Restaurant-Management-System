@php
    $title =  ucfirst($status ?? '') . ' ' . __('Orders')
@endphp
@extends('admin.layouts.master')
@section('title','Dashboard')
@push('styles')

@endpush
@section('breadcrumb')
    @parent
@endsection
@section('content')
    <div class="row">

    </div>
@endsection
@push('scripts')

@endpush

