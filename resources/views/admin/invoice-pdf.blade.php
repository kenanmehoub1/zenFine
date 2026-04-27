<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', 'Arial', sans-serif;
            font-size: 14px;
            direction: rtl;
            text-align: right;
            padding: 20px;
        }
        
        .invoice-box {
            border: 2px solid #ddd;
            padding: 30px;
            border-radius: 10px;
        }
        
        .text-center {
            text-align: center;
        }
        
        h2, h4 {
            text-align: center;
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
            background-color: #f0f0f0;
        }
        
        .total-row {
            background: #f0f0f0;
            font-weight: bold;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="text-center">
            <h2>ZENFINE PROPERTY CARE</h2>
            <h4>INVOICE</h4>
        </div>

        <p><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</p>
        <p><strong>Invoice Date:</strong> {{ $invoice->invoice_date }}</p>
        <p><strong>Company/Customer Name:</strong> {{ $invoice->company_name }}</p>
        <p><strong>Mobile Number:</strong> {{ $invoice->mobile_no }}</p>

        <h5>Service Details</h5>
        
        <table>
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
                    <td>{{ $invoice->service_type ?: '—' }}</td>
                    <td>{{ $invoice->service_details ?: '—' }}</td>
                    <td>{{ $invoice->service_quantity ?: '1' }}</td>
                    <td>{{ number_format($invoice->service_price, 2) }} SAR</td>
                </tr>
            </tbody>
        </table>

        <table>
            <tr>
                <th style="width: 30%">Total Amount</th>
                <td style="width: 70%"><strong>{{ number_format($invoice->total_fees, 2) }} SAR</strong></td>
            </tr>
        </table>
        
        <div class="footer">
            <p>Thank you for trusting us | Zenfine Property Care</p>
        </div>
    </div>
</body>
</html>