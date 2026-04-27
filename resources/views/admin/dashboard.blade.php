@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h4><i class="fas fa-file-invoice"></i> New Invoice Entry</h4>
    </div>
    <div class="card-body">
        <form id="invoiceForm">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Company or Customer Name <span class="text-danger">*</span></label>
                    <input type="text" name="company_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Mobile Number <span class="text-danger">*</span></label>
                    <input type="text" name="mobile_no" class="form-control" required>
                </div>
            </div>

            <h5 class="mt-4">Service Details</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Service Type <span class="text-danger">*</span></label>
                    <input type="text" name="service_type" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Service Details <span class="text-danger">*</span></label>
                    <textarea name="service_details" class="form-control" rows="2" required></textarea>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Service Quantity <span class="text-danger">*</span></label>
                    <input type="number" name="service_quantity" class="form-control service_quantity" value="1" min="1" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Service Price <span class="text-danger">*</span></label>
                    <input type="number" name="service_price" class="form-control service_price" value="0" step="0.01" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total <span class="text-danger">*</span></label>
                    <input type="number" name="total_fees" class="form-control total_fees" value="0" readonly style="background:#e9ecef">
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
        let quantity = parseFloat($('.service_quantity').val()) || 0;
        let price = parseFloat($('.service_price').val()) || 0;
        let total = quantity * price;
        $('.total_fees').val(total);
    }
    
    $('.service_quantity, .service_price').on('keyup change', calculateTotal);
    
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