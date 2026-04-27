@extends('layouts.admin')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card">
    <div class="card-header bg-white">
        <h4><i class="fas fa-history"></i> Old Invoices</h4>
    </div>
    <div class="card-body">
        <form id="searchForm" class="row mb-4">
            <div class="col-md-4">
                <input type="text" name="invoice_number" class="form-control" placeholder="Search by Invoice Number">
            </div>
            <div class="col-md-4">
                <input type="text" name="company_name" class="form-control" placeholder="Search by Company Name">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search"></i> Search
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