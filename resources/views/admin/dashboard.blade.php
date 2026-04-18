@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h4><i class="fas fa-file-invoice"></i> إدخال فاتورة جديدة</h4>
    </div>
    <div class="card-body">
        <form id="invoiceForm">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>رقم الفاتورة <span class="text-danger">*</span></label>
                    <input type="text" name="invoice_number" class="form-control" id="invoice_number" value="INV: ({{ rand(1000,9999) }}) {{ strtoupper(substr(uniqid(), -8)) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>تاريخ الفاتورة <span class="text-danger">*</span></label>
                    <input type="text" name="invoice_date" class="form-control" id="invoice_date" value="{{ now()->format('Y-m-d H:i:s') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>اسم الشركة <span class="text-danger">*</span></label>
                    <input type="text" name="company_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>رقم الجوال <span class="text-danger">*</span></label>
                    <input type="text" name="mobile_no" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>رمز المستخدم <span class="text-danger">*</span></label>
                    <input type="text" name="user_code" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>اسم المستخدم <span class="text-danger">*</span></label>
                    <input type="text" name="user_name" class="form-control" required>
                </div>
            </div>

            <h5 class="mt-4">تفاصيل الرسوم</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>الرسوم</label>
                    <input type="number" name="fees" class="form-control fees" value="1" step="0.01">
                </div>
                <div class="col-md-3 mb-3">
                    <label>نوع المعاملة</label>
                    <input type="text" name="transaction_type" class="form-control" value="Print documents <== RTA">
                </div>
                <div class="col-md-2 mb-3">
                    <label>عدد الأشخاص</label>
                    <input type="number" name="no_of_person" class="form-control" value="1">
                </div>
                <div class="col-md-2 mb-3">
                    <label>عدد المعاملات</label>
                    <input type="number" name="no_of_transa" class="form-control" value="1">
                </div>
                <div class="col-md-2 mb-3">
                    <label>رسوم الطباعة</label>
                    <input type="number" name="typing_fees" class="form-control typing_fees" value="0" step="0.01">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3 mb-3">
                    <label>رقم المعاملة</label>
                    <input type="text" name="transaction_no" class="form-control" value="1">
                </div>
                <div class="col-md-3 mb-3">
                    <label>رسوم المعاملة</label>
                    <input type="number" name="transaction_fees" class="form-control transaction_fees" value="1" step="0.01">
                </div>
                <div class="col-md-2 mb-3">
                    <label>رسوم أخرى</label>
                    <input type="number" name="other_fees" class="form-control other_fees" value="0" step="0.01">
                </div>
                <div class="col-md-2 mb-3">
                    <label>ضريبة القيمة المضافة</label>
                    <input type="number" name="vat_fees" class="form-control vat_fees" value="0" step="0.01">
                </div>
                <div class="col-md-2 mb-3">
                    <label>المجموع الكلي</label>
                    <input type="number" name="total_fees" class="form-control total_fees" value="1" readonly style="background:#e9ecef">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save"></i> حفظ وعرض الفاتورة
            </button>
        </form>
    </div>
</div>

<div id="invoiceDisplay" style="display:none; margin-top: 30px;"></div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // حساب المجموع تلقائياً
    function calculateTotal() {
        let transactionFees = parseFloat($('.transaction_fees').val()) || 0;
        let typingFees = parseFloat($('.typing_fees').val()) || 0;
        let otherFees = parseFloat($('.other_fees').val()) || 0;
        let vatFees = parseFloat($('.vat_fees').val()) || 0;
        let total = transactionFees + typingFees + otherFees + vatFees;
        $('.total_fees').val(total);
    }
    
    $('.transaction_fees, .typing_fees, .other_fees, .vat_fees').on('keyup change', calculateTotal);
    
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
                alert('حدث خطأ: ' + xhr.responseText);
            }
        });
    });
});
</script>
@endpush