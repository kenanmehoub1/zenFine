<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: "aealarabiya", "dejavusans", Arial, sans-serif;
            margin: 0;
            padding: 15px;
            background: #fff;
            font-size: 11px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            padding: 5px;
            vertical-align: middle;
        }
        .header-table td {
            border: none;
            padding: 5px;
            vertical-align: middle;
        }
        .logo-img {
            height: 100px;
            
        }
        .company-name {
            font-size: 18px;
            color: #477b23;
            font-weight: bold;
        }
        .company-name1 {
            font-size: 8px;
            color: #2d5016;
        
        }
        .title-ar {
            font-size: 12px;
            margin: 0;
           
        }
        .title-en {
            font-size: 8px;
            
            margin: 0;
        }
        .info-table td {
            border: none;
            padding: 3px 5px;
            font-size: 10px;
        }
        .info-label {
            font-weight: bold;
        }
        .main-table th {
            background-color: #c0c0c0;
            border: 1px solid #999;
            padding: 6px 12px;
            font-size: 10px;
            text-align: center;
            font-weight: bold;
        }
        .main-table td {
            border: 1px solid #999;
            padding: 8px 3px;
            font-size: 10px;
            text-align: center;
        }
        .total-row {
            background-color: #c0c0c0;
            font-weight: bold;
        }
        .summary-table {
            width: 55%;
            margin-top: 20px;
        }
        .summary-table td {
            border: 1px solid #999;
            padding: 6px 8px;
            font-size: 10px;
        }
        .summary-header {
            background-color: #c0c0c0;
            font-weight: bold;
            text-align: center;
            font-size: 10px;
            padding: 6px;
            border: 1px solid #999;
        }
        .footer-table {
            margin-top: 25px;
            text-align: center;
        }
        .footer-table td {
            font-size: 9px;
            padding: 3px;
            border: none;
        }
        .footer-message {
            font-style: italic;
            margin-bottom: 8px;
            line-height: 1.4;
        }
        .footer-contact {
            color: #555;
            margin-bottom: 6px;
        }
        .footer-note {
            color: #666;
            
        }
    </style>
</head>
<body>
    <table class="header-table">
        <tr>
            <td style="width: 15%; ">
                <div style="font-size:0.001px;   margin:0 0 0px 0;">&nbsp;</div>
                @if(file_exists(public_path('image/logo22.jpg')))
                    <img src="{{ public_path('image/logo22.jpg') }}" class="logo-img">
                @endif
            </td>
            <td style="width: 30%; ">
                <div style="font-size:12px; margin:0 0 2px 0;">&nbsp;</div>
               
                <span class="company-name">ZENFINE</span>
                <br/>
                 <span class="company-name1">for PROPERTY CARE</span>
            </td>
            <td style="width: 40%; text-align: left;  ">
               <div class="title-en">INVOICE</div>
               <div class="title-ar">فاتورة</div>
                
            </td>
        </tr>
    </table>

    <hr style="border: 0.5px solid #ccc; margin: 8px 0;">

    <table class="info-table">
        <tr>
            <td style="width: 50%;">
                <div style="margin-bottom: 4px;"><span class="info-label">The Customer Name </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{ $invoice->company_name ?? '' }} &nbsp;&nbsp;&nbsp;</div>
                <div style="margin-bottom: 4px;"><span class="info-label">The Customer Mobile </span> &nbsp;&nbsp;&nbsp; : {{ $invoice->mobile_no ?? '' }}</div>
                <div style="margin-bottom: 4px;"><span class="info-label">The Customer TRN </span> : {{ $invoice->customer_trn ?? '' }}</div>
            </td>
            <td style="width: 50%;">
                <div style="margin-bottom: 4px;"><span class="info-label">Invoice No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                <div style="margin-bottom: 4px;"><span class="info-label">Invoice Date </span> &nbsp;&nbsp; : {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y') }}</div>
                <div style="margin-bottom: 4px;"><span class="info-label">Invoice Time</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('h:i A') }}</div>
            </td>
        </tr>
    </table>
     <table class="info-table">
        <tr>
            <td style="width: 50%;">
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">The </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{ $invoice->company_name ?? '' }} &nbsp;&nbsp;&nbsp;</div>
                 </td>
            <td style="width: 50%;">
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                  </td>
        </tr>
    </table>

    <table class="main-table">
        <thead>
            <tr>
                <th style="width:28%"> Type of transactions</th>
                <th style="width:14%">  Government fees</th>
                <th style="width:14%"> Service fees</th>
                <th style="width:22%"> Number of transactions</th>
                <th style="width:22%">The amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $invoice->transaction_type ?? '' }}</td>
                <td>{{ $invoice->government_fees ? number_format($invoice->government_fees, 2) : '' }}</td>
                <td>{{ $invoice->service_fees ? number_format($invoice->service_fees, 2) : '' }}</td>
                <td>{{ $invoice->number_of_transactions ?? '' }}</td>
                <td>{{ $invoice->amount ? number_format($invoice->amount, 2) : '' }}</td>
            </tr>
            <tr class="total-row">
                <td colspan="2">TOTAL </td>
                <td></td>
                <td>{{ $invoice->number_of_transactions ?? '' }}</td>
                <td>{{ $invoice->total_fees ? number_format($invoice->total_fees, 2) : '' }}</td>
            </tr>
        </tbody>
    </table>

      <table class="info-table">
        <tr>
            <td style="width: 50%;">
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">The </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{ $invoice->company_name ?? '' }} &nbsp;&nbsp;&nbsp;</div>
                 </td>
            <td style="width: 50%;">
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                  </td>
        </tr>
    </table>
      <table class="info-table">
        <tr>
            <td style="width: 50%;">
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">The </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{ $invoice->company_name ?? '' }} &nbsp;&nbsp;&nbsp;</div>
                 </td>
            <td style="width: 50%;">
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                  </td>
        </tr>
    </table>



    <table class="summary-table">
        <tr><td colspan="2" class="summary-header">PAYMENT SUMMARY </td></tr>
        <tr><td style="width:60%">To Cashier Payment </td><td style="width:40%">{{ $invoice->cashier_payment ? number_format($invoice->cashier_payment, 2) : '' }}</td></tr>
        <tr><td>Payment Type </td><td>{{ $invoice->payment_type ?? '' }}</td></tr>
        <tr><td>User</td><td>{{ $invoice->user_name ?? '' }}</td></tr>
    </table>
   <table class="info-table">
        <tr>
            <td style="width: 50%;">
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">The </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{ $invoice->company_name ?? '' }} &nbsp;&nbsp;&nbsp;</div>
                 </td>
            <td style="width: 50%;">
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                 <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
                <div style="margin-bottom: 4px; color:white;"><span class="info-label">No </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->invoice_number }}</div>
               
            </td>
        </tr>
    </table>
    
  

    <table class="footer-table">
        <tr>
            <td class="footer-message">
                "نقدر ثقتك بنا، يسعدنا دائماً خدمتك"<br>
                "We appreciate your trust in us, we are always pleased to serve you"
            </td>
        </tr>
        <tr>
            <td class="footer-contact">
                +971 54 596 9516 | info@zenfine1.com | Office 1-141-53, Mankhool, Bur Dubai
            </td>
        </tr>
        <tr>
            <td class="footer-note">
                This is a system generated invoice and does not require signatures.<br>
                هذه فاتورة نظام صادرة ولا تحتاج إلى توقيعات.
            </td>
        </tr>
    </table>
</body>
</html>