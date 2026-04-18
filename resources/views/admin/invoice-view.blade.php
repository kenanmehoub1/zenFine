@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <div class="row">
            <div class="col-md-6">
                <h4><i class="fas fa-eye"></i> عرض الفاتورة</h4>
            </div>
            <div class="col-md-6 text-start">
                <a href="{{ route('invoices.pdf', ['id' => $invoice->id, 'token' => request('token')]) }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> تحميل PDF
                </a>
                <button onclick="window.print()" class="btn btn-success">
                    <i class="fas fa-print"></i> طباعة
                </button>
            </div>
        </div>
    </div>
    <div class="card-body" id="invoiceContent">
        <div style="border: 2px solid #ddd; padding: 30px; border-radius: 10px;">
            <div class="text-center mb-4">
                <img src="{{ asset('image/zenfine-logo.jpg') }}" alt="Zenfine" style="max-width: 200px;">
                <h2 class="mt-3">ZENFINE PROPERTY CARE</h2>
                <h4>INVOICE / فاتورة</h4>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <p><strong>Invoice No.:</strong> {{ $invoice->invoice_number }}</p>
                    <p><strong>Invoice Date:</strong> {{ $invoice->invoice_date }}</p>
                    <p><strong>Company Name:</strong> {{ $invoice->company_name }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Mobile No.:</strong> {{ $invoice->mobile_no }}</p>
                    <p><strong>User Code:</strong> {{ $invoice->user_code }} ({{ $invoice->user_name }})</p>
                </div>
            </div>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Fees</th>
                        <th>Transaction Type</th>
                        <th>No Of Person</th>
                        <th>No Of Transa</th>
                        <th>Typing Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $invoice->fees }}</td>
                        <td>{{ $invoice->transaction_type }}</td>
                        <td>{{ $invoice->no_of_person }}</td>
                        <td>{{ $invoice->no_of_transa }}</td>
                        <td>{{ $invoice->typing_fees }}</td>
                    </tr>
                </tbody>
            </table>

            <p><strong>Transaction(s) No.:</strong> {{ $invoice->transaction_no }}</p>

            <table class="table table-bordered">
                <tr>
                    <th>Transaction Fees</th>
                    <td>{{ $invoice->transaction_fees }}</td>
                </tr>
                <tr>
                    <th>Typing Fees</th>
                    <td>{{ $invoice->typing_fees }}</td>
                </tr>
                <tr>
                    <th>Other Fees</th>
                    <td>{{ $invoice->other_fees }}</td>
                </tr>
                <tr>
                    <th>Vat Fees</th>
                    <td>{{ $invoice->vat_fees }}</td>
                </tr>
                <tr style="background: #f0f0f0; font-weight: bold;">
                    <th>Total Fees</th>
                    <td>{{ $invoice->total_fees }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection