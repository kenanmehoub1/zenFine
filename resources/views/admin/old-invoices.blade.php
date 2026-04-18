@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h4><i class="fas fa-history"></i> الفواتير القديمة</h4>
    </div>
    <div class="card-body">
        <form id="searchForm" class="row mb-4">
            <div class="col-md-4">
                <input type="text" name="invoice_number" class="form-control" placeholder="بحث برقم الفاتورة">
            </div>
            <div class="col-md-4">
                <input type="text" name="company_name" class="form-control" placeholder="بحث باسم الشركة">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search"></i> بحث
                </button>
            </div>
        </form>
        
        <div id="invoicesList">
            @include('admin.invoices-list', ['invoices' => $invoices])
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#searchForm').on('submit', function(e) {
    e.preventDefault();
    let token = new URLSearchParams(window.location.search).get('token');
    
    $.ajax({
        url: '{{ route("invoices.search") }}?token=' + token,
        method: 'GET',
        data: $(this).serialize(),
        success: function(response) {
            $('#invoicesList').html(response);
        }
    });
});
</script>
@endpush