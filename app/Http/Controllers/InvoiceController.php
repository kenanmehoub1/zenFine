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

        // الحصول على آخر رقم فاتورة مضاف
    $lastInvoice = Invoice::orderBy('id', 'desc')->first();
    
      if ($lastInvoice && $lastInvoice->invoice_number) {
        // تحويل رقم الفاتورة إلى عدد صحيح ثم إضافة 1
        $lastNumber = (int)$lastInvoice->invoice_number;  // تحويل النص إلى رقم
        $invoiceNumber = $lastNumber + 1;
    } else {
        // أول فاتورة تبدأ برقم 1
        $invoiceNumber = 1;
    }
        // التاريخ أوتوماتيكي
        $invoiceDate = Carbon::now()->toDateTimeString();
        
        $invoice = Invoice::create([
             'invoice_number' => (string)$invoiceNumber,  // تحويل إلى نص للتخزين
            'invoice_date' => $invoiceDate,
            'company_name' => $request->company_name,
            'mobile_no' => $request->mobile_no,
            'service_type' => $request->service_type,
            'service_details' => $request->service_details,
            'service_quantity' => $request->service_quantity,
            'service_price' => $request->service_price,
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
    
  

// تحويل الفاتورة إلى PDF مع دعم العربية البسيط
public function downloadPDF($id, Request $request)
{
    $this->checkAuth($request);
    $invoice = Invoice::findOrFail($id);
    
    // تحميل الـ view وتحويله إلى HTML
    $pdf = Pdf::loadView('admin.invoice-pdf', compact('invoice'));
    
    // إعدادات مهمة للعربية
    $pdf->setOptions([
        'isHtml5ParserEnabled' => true,
        'isRemoteEnabled' => true,
        'isPhpEnabled' => true,
        'defaultFont' => 'DejaVu Sans'
    ]);
    
    // إضافة اتجاه RTL للصفحة
    $pdf->setPaper('A4', 'portrait');
    
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
    
  // حذف فاتورة
public function destroy($id, Request $request)
{
    $this->checkAuth($request);
    
    $invoice = Invoice::findOrFail($id);
    $invoice->delete();
    
    // العودة إلى صفحة الفواتير القديمة مع رسالة نجاح
    return redirect()->route('invoices.search', ['token' => $request->query('token')])
                     ->with('success', 'Invoice deleted successfully!');
}
}