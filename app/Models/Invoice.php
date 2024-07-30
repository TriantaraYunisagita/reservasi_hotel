<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    protected $fillable = [
        'id_invoice',
        'deskripsi',
        'status',
        'besar_dp',
        'id_reservasi',
    ];
    
    protected $primaryKey = 'id_invoice';
}
