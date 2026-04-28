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
    
  
// تحويل الفاتورة إلى PDF باستخدام TCPDF (دعم كامل للعربية)
public function downloadPDF($id, Request $request)
{
    $this->checkAuth($request);
    $invoice = Invoice::findOrFail($id);
    
    // إنشاء PDF جديد
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    
    // إعدادات دعم العربية
    $pdf->SetFont('aealarabiya', '', 14);
    $pdf->SetCreator('Zenfine Property Care');
    $pdf->SetAuthor('Zenfine');
    $pdf->SetTitle('Invoice ' . $invoice->invoice_number);
    $pdf->SetMargins(15, 15, 15);
    $pdf->SetAutoPageBreak(true, 15);
    
    // إضافة صفحة مع دعم RTL
    $pdf->AddPage();
    $pdf->setRTL(false);
    
    // تحضير HTML للفاتورة
    $html = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <style>
            body {
                font-size: 14px;
                line-height: 1.3;
                font-family: "aealarabiya", "dejavusans", sans-serif;
            }
            .invoice-box {
               
                padding: 20px;
                
            }
            .text-center {
                text-align: center;
            }
            h2, h3 {
                text-align: center;
                margin: 10px 0;
            }

            .row {
                margin: 15px 0;
                overflow: hidden;
            }
           
            .clearfix {
                clear: both;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 15px ;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: center;
            }
            th {
                background-color: #f0f0f0;
                font-weight: bold;
            }
            .total-row {
                background: #f0f0f0;
                font-weight: bold;
                margin: 15px ;
            }
            .footer {
                margin-top: 30px;
                text-align: center;
                font-size: 11px;
                color: #666;
             
            }
        </style>
    </head>
   <body>
        <div class="invoice-box">
            <div class="text-center">
                <h2 style="color: #0fe916;">ZENFINE PROPERTY CARE</h2>
                <h3 style="color: #08820c;">INVOICE</h3>
            </div>
            
            <div class="row">
                <div class="col-half">
                    <p><strong>Invoice Number  :  </strong> ' . $invoice->invoice_number . '</p>
                    <p><strong>Invoice Date  :  </strong> ' . $invoice->invoice_date . '</p>
                    <p><strong>Company / Customer Name : </strong> ' . $invoice->company_name . '</p>
    
                    <p><strong>Mobile Number:</strong> ' . $invoice->mobile_no . '</p>
                </div>
            </div>
            <div class="clearfix"></div>
            
            <h3 style="color: #08820c;">Service Details</h3>
            
            <table>
                <thead>
                    <tr>
                        <th>Service Type</th>
                        <th>Service Details</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>' . $invoice->service_type . '</td>
                        <td>' . $invoice->service_details . '</td>
                        <td>' . $invoice->service_quantity . '</td>
                        <td>' . number_format($invoice->service_price, 2) . ' SAR</td>
                    </tr>
                </tbody>
            </table>
            
            <table>
                <tbody>
                    <tr class="total-row">
                        <th width="30%">Total Amount</th>
                        <td width="70%"><strong>' . number_format($invoice->total_fees, 2) . ' SAR</strong></td>
                    </tr>
                </tbody>
            </table>
            
            
        </div>
        <div class="footer">
                Thank you for trusting us<br>
                Zenfine Property Care - Professional Property Care Service
            </div>
    </body>
    </html>';
    
    // كتابة HTML إلى PDF
    $pdf->writeHTML($html, true, false, true, false, '');
    
    // إخراج PDF للتحميل
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