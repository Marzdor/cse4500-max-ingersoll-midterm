@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>{{ $equipment->name }}</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('equipment.update', ['equipment' => $equipment->id]) }}">
        @method('PUT')
        @csrf
        <x-adminlte-input name="specification_serial_number" label="Serial Number"
            value=" {{ $equipment->specifications->serial_number }}" />

        <x-adminlte-input name="specification_processor" label="Processor"
            value=" {{ $equipment->specifications->processor }}" />

        <x-adminlte-input name="specification_ram" label="Ram" value=" {{ $equipment->specifications->ram }}" />

        <x-adminlte-input name="specification_storage" label="Storage Size"
            value=" {{ $equipment->specifications->storage }}" />

        <x-adminlte-input name="specification_mac_address" label="MAC Address"
            value=" {{ $equipment->specifications->mac_address }}" />

        @php
            $categoryOptions = ['Desktop', 'Phone', 'Laptop', 'Tablet'];
        @endphp
        <x-adminlte-select name="category" label="Category">
            @foreach ($categoryOptions as $item)
                @if ($item == $equipment->category)
                    <option selected>{{ $item }}</option>
                @else
                    <option>{{ $item }}</option>
                @endif
            @endforeach

        </x-adminlte-select>

        <x-adminlte-button type="Submit" label="Submit" />
    </form>
@stop
