@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Manufacturers')

@section('content_header')
    <h1>Manufacturers</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Sales Info</th>
                        <th>Tech Support</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($manufacturers as $manufacturer)
                        <tr>
                            <td>{{ $manufacturer->name }}</td>
                            <td>
                                <p style="margin: 0">Email: <b>{{ $manufacturer->sales_info['email'] }}</b></p>
                                <p style="margin: 0">Phone: <b>{{ $manufacturer->sales_info['phone_number'] }}</b></p>
                            </td>
                            <td>
                                <p style="margin: 0">Email: <b>{{ $manufacturer->tech_support['email'] }}</b></p>
                                <p style="margin: 0">Phone: <b>{{ $manufacturer->tech_support['phone_number'] }}</b></p>
                            </td>
                            <td><a class="btn btn-default btn-sm"
                                    href="{{ route('manufacturers.edit', ['manufacturer' => $manufacturer->id]) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
