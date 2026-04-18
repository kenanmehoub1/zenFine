<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'invoice_number', 'invoice_date', 'company_name', 'mobile_no',
        'user_code', 'user_name', 'fees', 'transaction_type',
        'no_of_person', 'no_of_transa', 'typing_fees', 'transaction_no',
        'transaction_fees', 'other_fees', 'vat_fees', 'total_fees'
    ];
}