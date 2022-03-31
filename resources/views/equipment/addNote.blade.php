@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Add Note For {{ $equipment->name }}</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('equipment.updateNotes', ['equipment' => $equipment->id]) }}">
        @method('PUT')
        @csrf
        <x-adminlte-input name="message" label="Message" value="" />

        <x-adminlte-button type="Submit" label="Submit" />
    </form>
@stop
