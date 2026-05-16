<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'invoice_number', 'invoice_date', 'company_name', 'mobile_no',
        'customer_trn', 'transaction_type', 'government_fees', 'service_fees',
        'number_of_transactions', 'amount', 'cashier_payment', 'payment_type', 'user_name',
        'service_type', 'service_details', 'service_quantity', 'service_price', 'total_fees'
    ];
}