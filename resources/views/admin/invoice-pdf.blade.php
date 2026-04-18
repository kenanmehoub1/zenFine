<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>فاتورة {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 20px;
        }
        .invoice-box {
            border: 2px solid #ddd;
            padding: 20px;
            border-radius: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 150px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <img src="{{ public_path('image/zenfine-logo.jpg') }}" class="logo">
            <h2>ZENFINE PROPERTY CARE</h2>
            <h3>INVOICE / فاتورة</h3>
        </div>

        <div style="margin: 20px 0;">
            <p><strong>Invoice No.:</strong> {{ $invoice->invoice_number }}</p>
            <p><strong>Invoice Date:</strong> {{ $invoice->invoice_date }}</p>
            <p><strong>Company Name:</strong> {{ $invoice->company_name }}</p>
            <p><strong>Mobile No.:</strong> {{ $invoice->mobile_no }}</p>
            <p><strong>User Code:</strong> {{ $invoice->user_code }} ({{ $invoice->user_name }})</p>
        </div>

        <table>
            <thead>
                <tr><th>Fees</th><th>Transaction Type</th><th>No Of Person</th><th>No Of Transa</th><th>Typing Fees</th></tr>
            </thead>
            <tbody>
                <tr><td>{{ $invoice->fees }}</td><td>{{ $invoice->transaction_type }}</td><td>{{ $invoice->no_of_person }}</td><td>{{ $invoice->no_of_transa }}</td><td>{{ $invoice->typing_fees }}</td></tr>
            </tbody>
        </table>

        <p><strong>Transaction(s) No.:</strong> {{ $invoice->transaction_no }}</p>

        <table>
            <tr><th>Transaction Fees</th><td>{{ $invoice->transaction_fees }}</td></tr>
            <tr><th>Typing Fees</th><td>{{ $invoice->typing_fees }}</td></tr>
            <tr><th>Other Fees</th><td>{{ $invoice->other_fees }}</td></tr>
            <tr><th>Vat Fees</th><td>{{ $invoice->vat_fees }}</td></tr>
            <tr style="background:#f0f0f0"><th>Total Fees</th><td>{{ $invoice->total_fees }}</td></tr>
        </table>
    </div>
</body>
</html>