<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'id_payment',
        'customer_id',
        'metode_bayar',
        'id_invoice'
    ];
    
    protected $primaryKey = 'id_payment';
}
