@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Invoice</div>

                <div class="panel-body">
                    @if ($invoices->count())
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Value</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->date()->toDateTimeString() }}</td>
                                        <td>{{ $invoice->total() }}</td>
                                        <td><a href="{{ route('invoices.show', $invoice->id) }}">Download a copy</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
