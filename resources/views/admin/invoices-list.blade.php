<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>رقم الفاتورة</th>
                <th>الشركة</th>
                <th>التاريخ</th>
                <th>المجموع</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($invoices as $invoice)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $invoice->invoice_number }}</td>
                <td>{{ $invoice->company_name }}</td>
                <td>{{ $invoice->invoice_date }}</td>
                <td>{{ $invoice->total_fees }} ريال</td>
                <td>
                    <a href="{{ route('invoices.show', ['id' => $invoice->id, 'token' => request('token')]) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i> عرض
                    </a>
                    <a href="{{ route('invoices.pdf', ['id' => $invoice->id, 'token' => request('token')]) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-file-pdf"></i> PDF
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">لا توجد فواتير</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $invoices->appends(request()->query())->links() }}
</div>