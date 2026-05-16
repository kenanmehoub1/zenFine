<style>
.pagination .page-link {
    font-size: 12px;
    padding: 5px 10px;
}
.pagination .page-item {
    margin: 0 2px;
}
</style>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Invoice Number</th>
                <th>Customer Name</th>
                <th>Mobile</th>
                <th>Date</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($invoices as $invoice)
            <tr>
                <td>{{ $invoice->invoice_number }}</td>
                <td>{{ $invoice->company_name ?? '' }}</td>
                <td>{{ $invoice->mobile_no ?? '' }}</td>
                <td>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y') }}</td>
                <td>{{ $invoice->total_fees ? number_format($invoice->total_fees, 2) : '' }}</td>
                <td>
                    <a href="{{ route('invoices.show', ['id' => $invoice->id, 'token' => request('token')]) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <a href="{{ route('invoices.pdf', ['id' => $invoice->id, 'token' => request('token')]) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-file-pdf"></i> PDF
                    </a>

                    <form action="{{ route('invoices.destroy', ['id' => $invoice->id]) }}?token={{ request('token') }}"
                          method="POST"
                          style="display: inline-block;"
                          onsubmit="return confirm('Are you sure you want to delete this invoice?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-warning">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                 </td>
             </tr>
            @empty
             <tr>
                <td colspan="6" class="text-center">No invoices found</td>
             </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{ $invoices->appends(request()->query())->links('pagination::bootstrap-5', ['class' => 'pagination-sm']) }}
</div>
</div>