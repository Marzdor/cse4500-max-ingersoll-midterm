@extends('adminlte::page')

@section('title', 'View Equipment')

@section('content_header')
    <h1><b>Equipment:</b> {{ $equipment->name }}</h1>
@stop

@section('content')
    <div class="main-container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manufacturer</h3>
            </div>
            <div class="card-body">
                <p><b>NAME:</b> {{ $manufacturer->name }}</p>
                <div>
                    <b>SALES INFO</b>
                    @foreach ($manufacturer->sales_info as $key => $value)
                        <p><b>{{ strtoupper($key) }}:</b> {{ $value }}</p>
                    @endforeach
                </div>
                <div style="margin-top:1%">
                    <b>TECH SUPPORT</b>
                    @foreach ($manufacturer->tech_support as $key => $value)
                        <p><b>{{ strtoupper($key) }}:</b> {{ $value }}</p>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-block btn-primary"
                    href="{{ route('manufacturers.edit', ['manufacturer' => $manufacturer->id]) }}">Edit</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Specifications</h3>
            </div>
            <div class="card-body">
                <p><b>CATEGORY:</b> {{ $equipment->category }}</p>
                @foreach ($equipment->specifications as $spec => $value)
                    <p><b>{{ strtoupper($spec) }}:</b> {{ $value }}</p>
                @endforeach
            </div>
            <div class="card-footer">
                <a class="btn btn-block btn-primary"
                    href="{{ route('equipment.edit', ['equipment' => $equipment->id]) }}">Edit</a>
            </div>
        </div>

        <div class="  card">
            <div class="card-header">
                <h3 class="card-title">Sales Info</h3>
            </div>
            <div class="card-body">
                <p><b>INVOICE:</b> {{ $purchase->invoice }} </p>
                <p><b>PURCHASE DATE:</b> {{ $purchase->purchased_on }}</p>
                <p>
                    <b>CUSTOMER:</b> {{ $purchase->user_info->first_name }}
                    {{ $purchase->user_info->last_name }}
                </p>
                <p><b>CUSTOMER EMAIL:</b> {{ $purchase->user_info->email }}</p>
                <p><b>CUSTOMER PHONE NUMBER:</b> {{ $purchase->user_info->phone_number }}
                </p>
            </div>
            <div class="card-footer">
                <a class="btn btn-block btn-primary"
                    href="{{ route('purchases.edit', ['purchase' => $purchase->id]) }}">Edit</a>
            </div>
        </div>
        <div class="card table">
            <div class="card-header">
                <h3 class="card-title">Notes</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <a class="btn btn-primary btn-sm"
                        href="{{ route('equipment.addNote', ['equipment' => $equipment->id]) }}">Add Note</a>

                </div>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Message</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipment->notes as $note)
                            <tr>
                                <td>{{ $note['message'] }}</td>
                                <td>
                                    <form method="POST" id="{{ $note['id'] }}"
                                        action="{{ route('equipment.deleteNote', ['equipment' => $equipment->id, 'note' => $note['id']]) }}">
                                        @method('PUT')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit" form="{{ $note['id'] }}"
                                            value="Submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@stop


@section('css')
    <style>
        .main-container {
            margin: 0 2vw;
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            margin: 1vh 1.5%;
            min-width: 400px;
            width: 30%;
        }

        div.table {
            width: 100%;
        }

        .btn {
            max-width: 200px;
            margin: auto;
        }

        p {
            margin: 0;
        }

    </style>
@stop
