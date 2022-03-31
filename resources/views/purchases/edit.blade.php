@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>{{ $equipment_serial_number }}</h1>
@stop

@section('content')

    <form method="POST" action="{{ route('purchases.update', ['purchase' => $purchase->id]) }}">
        @method('PUT')
        @csrf
        <x-adminlte-input name="invoice" label="Invoice" value="{{ $purchase->invoice }}" />
        <x-adminlte-input name="purchased_on" label="Purchase Date" type="date" value="{{ $purchase->purchased_on }}" />
        <x-adminlte-input name="user_info_first_name" label="User First Name"
            value="{{ $purchase->user_info->first_name }}" />
        <x-adminlte-input name="user_info_last_name" label="User Last Name"
            value="{{ $purchase->user_info->last_name }}" />
        <x-adminlte-input name="user_info_email" label="Sales Email" value="{{ $purchase->user_info->email }}" />
        <x-adminlte-input name="user_info_phone_number" label="Sales Phone Number" type="tel"
            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="{{ $purchase->user_info->phone_number }}" />

        <x-adminlte-button type="Submit" label="Submit" />
    </form>
@stop
