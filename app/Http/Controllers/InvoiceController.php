<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    private $secretToken = 'Zenfine2026Secret!@';
    
    private function checkAuth(Request $request)
    {
        if ($request->query('token') !== $this->secretToken) {
            abort(404);
        }
    }
    
    // عرض لوحة التحكم
    public function dashboard(Request $request)
    {
        $this->checkAuth($request);
        return view('admin.dashboard');
    }
    
    // حفظ فاتورة جديدة
    public function store(Request $request)
    {
        $this->checkAuth($request);

        $invoiceDate = $request->invoice_date;
        if (is_string($invoiceDate) && $invoiceDate !== '') {
            try {
                $invoiceDate = Carbon::parse($invoiceDate)->toDateTimeString();
            } catch (\Exception $e) {
                try {
                    $invoiceDate = Carbon::createFromFormat('d/m/Y H:i:s', $request->invoice_date)->toDateTimeString();
                } catch (\Exception $e2) {
                    $invoiceDate = null;
                }
            }
        }
        
        $invoice = Invoice::create([
            'invoice_number' => $request->invoice_number,
            'invoice_date' => $invoiceDate,
            'company_name' => $request->company_name,
            'mobile_no' => $request->mobile_no,
            'user_code' => $request->user_code,
            'user_name' => $request->user_name,
            'fees' => $request->fees,
            'transaction_type' => $request->transaction_type,
            'no_of_person' => $request->no_of_person,
            'no_of_transa' => $request->no_of_transa,
            'typing_fees' => $request->typing_fees,
            'transaction_no' => $request->transaction_no,
            'transaction_fees' => $request->transaction_fees,
            'other_fees' => $request->other_fees,
            'vat_fees' => $request->vat_fees,
            'total_fees' => $request->total_fees,
        ]);
        
        return response()->json(['success' => true, 'invoice_id' => $invoice->id]);
    }
    
    // عرض الفاتورة
    public function show($id, Request $request)
    {
        $this->checkAuth($request);
        $invoice = Invoice::findOrFail($id);
        return view('admin.invoice-view', compact('invoice'));
    }
    
    // تحويل الفاتورة إلى PDF
    public function downloadPDF($id, Request $request)
    {
        $this->checkAuth($request);
        $invoice = Invoice::findOrFail($id);
        $pdf = Pdf::loadView('admin.invoice-pdf', compact('invoice'));
        return $pdf->download('invoice-'.$invoice->invoice_number.'.pdf');
    }
    
    // البحث عن الفواتير القديمة
    public function search(Request $request)
    {
        $this->checkAuth($request);
        
        $query = Invoice::query();
        
        if ($request->invoice_number) {
            $query->where('invoice_number', 'LIKE', '%'.$request->invoice_number.'%');
        }
        
        if ($request->company_name) {
            $query->where('company_name', 'LIKE', '%'.$request->company_name.'%');
        }
        
        $invoices = $query->orderBy('created_at', 'desc')->paginate(20);
        
        if ($request->ajax()) {
            return view('admin.invoices-list', compact('invoices'))->render();
        }
        
        return view('admin.old-invoices', compact('invoices'));
    }
}