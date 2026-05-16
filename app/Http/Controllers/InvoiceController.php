<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Carbon\Carbon;
use TCPDF;


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
             'invoice_number' => (string)$invoiceNumber,
            'invoice_date' => $invoiceDate,
            'company_name' => $request->company_name,
            'mobile_no' => $request->mobile_no,
            'customer_trn' => $request->customer_trn,
            'transaction_type' => $request->transaction_type,
            'government_fees' => $request->government_fees,
            'service_fees' => $request->service_fees,
            'number_of_transactions' => $request->number_of_transactions,
            'amount' => $request->amount,
            'cashier_payment' => $request->cashier_payment,
            'payment_type' => $request->payment_type,
            'user_name' => $request->user_name,
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
    
  
// تحويل الفاتورة إلى PDF باستخدام TCPDF (مع فصل الـ HTML في ملف منفصل)
public function downloadPDF($id, Request $request)
{
    $this->checkAuth($request);
    $invoice = Invoice::findOrFail($id);

    // إنشاء PDF جديد
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    
    // إعدادات الخط والترميز
    $pdf->SetFont('aealarabiya', '', 11);
    $pdf->SetCreator('Zenfine Property Care');
    $pdf->SetAuthor('Zenfine');
    $pdf->SetTitle('Invoice ' . $invoice->invoice_number);
    
    // إعداد الهوامش
    $pdf->SetMargins(8, 8, 8);
    $pdf->SetAutoPageBreak(true, 10);
    
    $pdf->AddPage();
    $pdf->setRTL(false);
    
    // جلب HTML من ملف الـ Blade
    $html = view('admin.invoice-pdf', compact('invoice'))->render();
    
    // تعديل مسار الشعار في HTML (لأن TCPDF لا يتعامل مع asset() بشكل صحيح)
    $logoPath = public_path('image/zenfine-logo.jpg');
    if (file_exists($logoPath)) {
        $logoBase64 = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($logoPath));
        $html = str_replace(public_path('image/zenfine-logo.jpg'), $logoBase64, $html);
    }
    
    // كتابة HTML إلى PDF
    $pdf->writeHTML($html, true, false, true, false, '');
    
    // إخراج PDF
    return $pdf->Output('invoice-' . $invoice->invoice_number . '.pdf', 'D');
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