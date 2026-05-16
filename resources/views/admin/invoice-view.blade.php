@extends('layouts.admin')

@section('content')
<style>
.invoice-container {
    border: 1px solid #ccc;
    background: #fff;
}
.invoice-green-bar {
    background: #2d5016;
    height: 8px;
}
.invoice-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    border-bottom: 1px solid #eee;
}
.invoice-logo {
    display: flex;
    align-items: center;
    gap: 10px;
}
.invoice-logo img {
    max-height: 60px;
}
.invoice-logo-text h3 {
    margin: 0;
    font-size: 18px;
    color: #2d5016;
}
.invoice-logo-text p {
    margin: 0;
    font-size: 11px;
    color: #888;
}
.invoice-title {
    text-align: center;
}
.invoice-title h2 {
    margin: 0;
    font-size: 22px;
    color: #333;
}
.invoice-title p {
    margin: 0;
    font-size: 14px;
    color: #666;
}
.invoice-info-section {
    display: flex;
    justify-content: space-between;
    padding: 20px 30px;
    border-bottom: 1px solid #eee;
}
.invoice-info-left, .invoice-info-right {
    width: 48%;
}
.invoice-info-row {
    display: flex;
    margin-bottom: 8px;
}
.invoice-info-label {
    font-weight: bold;
    min-width: 200px;
    font-size: 13px;
}
.invoice-info-value {
    font-size: 13px;
}
.invoice-table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
}
.invoice-table th {
    background: #c0c0c0;
    color: #000;
    font-weight: bold;
    text-align: center;
    padding: 8px 5px;
    border: 1px solid #999;
    font-size: 13px;
}
.invoice-table td {
    text-align: center;
    padding: 8px 5px;
    border: 1px solid #999;
    font-size: 13px;
}
.invoice-table .total-row {
    background: #c0c0c0;
    font-weight: bold;
}
.invoice-summary {
    margin: 20px 30px;
    border: 1px solid #999;
    width: 50%;
}
.invoice-summary-header {
    background: #c0c0c0;
    text-align: center;
    font-weight: bold;
    padding: 5px;
    border-bottom: 1px solid #999;
    font-size: 13px;
}
.invoice-summary-row {
    display: flex;
    border-bottom: 1px solid #999;
}
.invoice-summary-row:last-child {
    border-bottom: none;
}
.invoice-summary-label {
    width: 60%;
    padding: 5px 10px;
    border-right: 1px solid #999;
    font-size: 13px;
}
.invoice-summary-value {
    width: 40%;
    padding: 5px 10px;
    font-size: 13px;
}
.invoice-footer {
    text-align: center;
    padding: 30px;
    border-top: 1px solid #eee;
}
.invoice-footer-message {
    margin-bottom: 15px;
    font-style: italic;
}
.invoice-footer-contact {
    display: flex;
    justify-content: center;
    gap: 20px;
    font-size: 12px;
    color: #666;
    margin-bottom: 10px;
}
.invoice-footer-note {
    font-size: 11px;
    color: #999;
}
</style>

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
        <div class="invoice-container">
            <div class="invoice-green-bar"></div>

            <div class="invoice-header">
                <div class="invoice-logo">
                    <img src="{{ asset('image/zenfine-logo.jpg') }}" alt="Zenfine">
                    <div class="invoice-logo-text">
                        <h3>ZENFINE PROPERTY CARE</h3>
                        <p>Corporate Services Provider</p>
                    </div>
                </div>
                <div class="invoice-title">
                    <p style="margin:0; font-size:16px;">فاتورة</p>
                    <h2 style="margin:0; font-size:24px;">INVOICE</h2>
                </div>
            </div>

            <div class="invoice-info-section">
                <div class="invoice-info-left">
                    <div class="invoice-info-row">
                        <div class="invoice-info-label">The Customer Name / اسم العميل</div>
                        <div class="invoice-info-value">: {{ $invoice->company_name ?? '' }}</div>
                    </div>
                    <div class="invoice-info-row">
                        <div class="invoice-info-label">The Customer Mobile / رقم العميل</div>
                        <div class="invoice-info-value">: {{ $invoice->mobile_no ?? '' }}</div>
                    </div>
                    <div class="invoice-info-row">
                        <div class="invoice-info-label">The Customer TRN / رقم التسجيل الضريبي للعميل</div>
                        <div class="invoice-info-value">: {{ $invoice->customer_trn ?? '' }}</div>
                    </div>
                </div>
                <div class="invoice-info-right">
                    <div class="invoice-info-row">
                        <div class="invoice-info-label">Invoice No / رقم الفاتورة</div>
                        <div class="invoice-info-value">: {{ $invoice->invoice_number }}</div>
                    </div>
                    <div class="invoice-info-row">
                        <div class="invoice-info-label">Invoice Date / تاريخ الفاتورة</div>
                        <div class="invoice-info-value">: {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y') }}</div>
                    </div>
                    <div class="invoice-info-row">
                        <div class="invoice-info-label">Invoice Time / الوقت</div>
                        <div class="invoice-info-value">: {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('h:i A') }}</div>
                    </div>
                </div>
            </div>

            <table class="invoice-table">
                <thead>
                    <tr>
                        <th style="width:20%">The amount<br>المبلغ</th>
                        <th style="width:20%">Number of transactions<br>عدد المعاملات</th>
                        <th style="width:20%">Service fees<br>رسوم الخدمة</th>
                        <th style="width:20%">Government fees<br>رسوم حكومية</th>
                        <th style="width:20%">Type of transactions<br>نوع المعاملة</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $invoice->amount ? number_format($invoice->amount, 2) : '' }}</td>
                        <td>{{ $invoice->number_of_transactions ?? '' }}</td>
                        <td>{{ $invoice->service_fees ? number_format($invoice->service_fees, 2) : '' }}</td>
                        <td>{{ $invoice->government_fees ? number_format($invoice->government_fees, 2) : '' }}</td>
                        <td>{{ $invoice->transaction_type ?? '' }}</td>
                    </tr>
                    @if($invoice->service_type || $invoice->service_details || $invoice->service_quantity || $invoice->service_price)
                    <tr>
                        <td>{{ $invoice->service_price ? number_format($invoice->service_price, 2) : '' }}</td>
                        <td>{{ $invoice->service_quantity ?? '' }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ $invoice->service_type ?? '' }}{{ $invoice->service_details ? ' - ' . $invoice->service_details : '' }}</td>
                    </tr>
                    @endif
                    <tr class="total-row">
                        <td>{{ $invoice->total_fees ? number_format($invoice->total_fees, 2) : '' }}</td>
                        <td>{{ $invoice->number_of_transactions ?? '' }}</td>
                        <td colspan="2">TOTAL / الإجمالي</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <div class="invoice-summary">
                <div class="invoice-summary-header">PAYMENT SUMMARY / ملخص الدفعة</div>
                <div class="invoice-summary-row">
                    <div class="invoice-summary-label">To Cashier Payment / دفعة إلى أمين الصندوق</div>
                    <div class="invoice-summary-value">{{ $invoice->cashier_payment ? number_format($invoice->cashier_payment, 2) : '' }}</div>
                </div>
                <div class="invoice-summary-row">
                    <div class="invoice-summary-label">Payment Type / نوع الدفع</div>
                    <div class="invoice-summary-value">{{ $invoice->payment_type ?? '' }}</div>
                </div>
                <div class="invoice-summary-row">
                    <div class="invoice-summary-label">User / المستخدم</div>
                    <div class="invoice-summary-value">{{ $invoice->user_name ?? '' }}</div>
                </div>
            </div>

            <div class="invoice-footer">
                <div class="invoice-footer-message">
                    <p style="font-size:14px;">"نقدر ثقتك بنا، يسعدنا دائماً خدمتك"</p>
                    <p style="font-size:14px;">"We appreciate your trust in us, we are always pleased to serve you"</p>
                </div>
                <div class="invoice-footer-contact">
                    <span>📞 +971 56 100 4127</span>
                    <span>📧 info@zenfine1.com</span>
                    <span>📍 Office 1-141-53, Mankhool, Bur Dubai</span>
                </div>
                <div class="invoice-footer-note">
                    This is a system generated invoice and does not require signatures.<br>
                    هذه فاتورة نظام صادرة ولا تحتاج إلى توقيعات.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection