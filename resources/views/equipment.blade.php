@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Equipment')

@section('content_header')
    <h1>Equipment</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Manufacturer</th>
                        <th>Name</th>
                        <th>Customer</th>
                        <th>Category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipment as $item)
                        <tr>
                            <td>{{ $item['manufacturer_name'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['customer_name'] }}</td>
                            <td>{{ $item['category'] }}</td>
                            <td><a class="btn btn-default btn-sm"
                                    href="{{ route('equipment.show', ['equipment' => $item['id']]) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('equipment.create') }} " class="btn btn-primary">Create</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@stop
