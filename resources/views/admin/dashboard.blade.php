@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h4><i class="fas fa-file-invoice"></i> New Invoice Entry</h4>
    </div>
    <div class="card-body">
        <form id="invoiceForm">
            @csrf

            <h5 class="mt-2 mb-3">Customer Information</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>The Customer Name / اسم العميل</label>
                    <input type="text" name="company_name" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>The Customer Mobile / رقم العميل</label>
                    <input type="text" name="mobile_no" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>The Customer TRN/رقم التسجيل الضريبي للعميل</label>
                    <input type="text" name="customer_trn" class="form-control">
                </div>
            </div>

            <h5 class="mt-4 mb-3">Transaction Details</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Type of transactions / نوع المعاملة</label>
                    <input type="text" name="transaction_type" class="form-control amount">
                </div>
                <div class="col-md-4 mb-3">
                    <label>The amount / المبلغ</label>
                    <input type="number" name="amount" class="form-control amount" value="" step="0.01">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Number of transactions / عدد المعاملات</label>
                    <input type="number" name="number_of_transactions" class="form-control number_of_transactions" value="">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Service fees / رسوم الخدمة</label>
                    <input type="number" name="service_fees" class="form-control service_fees" value="" step="0.01">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Government fees / رسوم حكومية</label>
                    <input type="number" name="government_fees" class="form-control government_fees" value="" step="0.01">
                </div>
            </div>

            <h5 class="mt-4 mb-3">Payment Summary</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>To Cashier Payment / دفعة إلى أمين الصندوق</label>
                    <input type="number" name="cashier_payment" class="form-control cashier_payment" value="" step="0.01">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Payment Type / نوع الدفع</label>
                    <input type="text" name="payment_type" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>User / المستخدم</label>
                    <input type="text" name="user_name" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Total Amount / الإجمالي</label>
                    <input type="number" name="total_fees" class="form-control total_fees" value="" step="0.01">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save"></i> Save & View Invoice
            </button>
        </form>
    </div>
</div>

<div id="invoiceDisplay" style="display:none; margin-top: 30px;"></div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Calculate total automatically
    function calculateTotal() {
        let amount = parseFloat($('.amount').val()) || 0;
        let serviceFees = parseFloat($('.service_fees').val()) || 0;
        let govFees = parseFloat($('.government_fees').val()) || 0;
        let total = amount + serviceFees + govFees;
        $('.total_fees').val(total);
    }

    $('.amount, .service_fees, .government_fees').on('keyup change', calculateTotal);

    $('#invoiceForm').on('submit', function(e) {
        e.preventDefault();
        let token = new URLSearchParams(window.location.search).get('token');

        $.ajax({
            url: '{{ route("invoices.store") }}?token=' + token,
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if(response.success) {
                    window.open('{{ url("/admin/invoices") }}/' + response.invoice_id + '?token=' + token, '_blank');
                }
            },
            error: function(xhr) {
                alert('Error occurred: ' + xhr.responseText);
            }
        });
    });
});
</script>
@endpush