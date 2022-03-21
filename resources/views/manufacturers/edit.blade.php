@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>{{ $manufacturer->name }}</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('manufacturers.update', ['manufacturer' => $manufacturer]) }}">
        @method('PUT')
        @csrf
        <x-adminlte-input name="sales_info_email" label="Sales Email" value="<?php echo $manufacturer->sales_info['email']; ?>" />
        <x-adminlte-input name="sales_info_phone_number" label="Sales Phone Number" value="<?php echo $manufacturer->sales_info['phone_number']; ?>" />
        <x-adminlte-input name="tech_support_email" label="Tech Support Email" value="<?php echo $manufacturer->tech_support['email']; ?>" />
        <x-adminlte-input name="tech_support_phone_number" label="Tech Support Phone Number" value="<?php echo $manufacturer->tech_support['phone_number']; ?>" />

        <x-adminlte-button type="Submit" label="Submit" />
    </form>
@stop
