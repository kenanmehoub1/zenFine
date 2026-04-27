<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'invoice_number', 'invoice_date', 'company_name', 'mobile_no',
        'service_type', 'service_details', 'service_quantity', 'service_price', 'total_fees'
    ];
}