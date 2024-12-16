@extends('Dashboard.layouts.master')

@section('css')
    <!-- Internal Styles -->
    <link href="{{ URL::asset('dashboard/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .invoice-header h1 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details span {
            display: block;
            font-size: 1rem;
            color: #555;
        }

        .table-invoice th, .table-invoice td {
            text-align: center;
        }

        .buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }


        .btn-custom {
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #000fd0;
            border: none;
            cursor: pointer;
        }

        .btn-print {

            background-color: #28a745 !important; /* Green */
        }

        .btn-back {
            background-color: #007bff !important; /* Blue */
        }

        /* Hide buttons when printing */
        @media print {
            .buttons, .btn-custom {
                display: none;
            }

            .table-invoice th, .table-invoice td {
                text-align: left;
            }

            .invoice-header h1 {
                font-size: 1.2rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="invoice-header">
                    <h1>Invoice</h1>
                    <p>Pharmacy Name</p>
                    <p>123 Main Street, City, State</p>
                    <p>Phone: (123) 456-7890</p>
                </div>

                <div class="invoice-details">
                    <span><strong>Invoice #:</strong> {{ $invoice->invoice_number }}</span>
                    <span><strong>Date:</strong> {{ \Carbon\Carbon::parse($invoice->created_at)->format('F d, Y') }}</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-invoice">
                        <thead class="table-light">
                        <tr>
                            <th>Medicine</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoice->medicines as $medicine)
                            <tr>
                                <td>{{ $medicine->name }}</td>
                                <td>{{ $medicine->pivot->quantity }}</td>
                                <td>${{ number_format($medicine->pivot->total, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2" class="text-end"><strong>Grand Total:</strong></td>
                            <td><strong>${{ number_format($invoice->total, 2) }}</strong></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="buttons">
                    <button class="btn btn-custom btn-print " onclick="window.print()">Print Invoice</button>
                    <a href="{{ route('medicineinvoices.index') }}" class="btn btn-custom btn-back">Back to Invoices</a>
                </div>

                <p class="text-center mt-4">Thank you for your purchase!<br>Keep this receipt for your records.</p>
            </div>
        </div>
    </div>
@endsection
