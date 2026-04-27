@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <div class="row">
            <div class="col-md-6">
                <h4><i class="fas fa-eye"></i> View Invoice</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('invoices.pdf', ['id' => $invoice->id, 'token' => request('token')]) }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Download PDF
                </a>
                <button onclick="window.print()" class="btn btn-success">
                    <i class="fas fa-print"></i> Print
                </button>
            </div>
        </div>
    </div>
    <div class="card-body" id="invoiceContent">
        <div style="border: 2px solid #ddd; padding: 30px; border-radius: 10px;">
            <div class="text-center mb-4">
                <img src="{{ asset('image/zenfine-logo.jpg') }}" alt="Zenfine" style="max-width: 200px;">
                <h2 class="mt-3">ZENFINE PROPERTY CARE</h2>
                <h4>INVOICE</h4>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <p><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</p>
                    <p><strong>Invoice Date:</strong> {{ $invoice->invoice_date }}</p>
                    <p><strong>Company or Customer Name:</strong> {{ $invoice->company_name }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Mobile Number:</strong> {{ $invoice->mobile_no }}</p>
                </div>
            </div>

            <h5 class="mt-4">Service Details</h5>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Service Type</th>
                        <th>Service Details</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $invoice->service_type }}</td>
                        <td>{{ $invoice->service_details }}</td>
                        <td>{{ $invoice->service_quantity }}</td>
                        <td>{{ $invoice->service_price }} SAR</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered mt-3">
                <tr style="background: #f0f0f0; font-weight: bold;">
                    <th>Total Amount</th>
                    <td>{{ $invoice->total_fees }} SAR</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection