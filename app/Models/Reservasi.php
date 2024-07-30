<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';

    protected $fillable = [
        'id_reservasi',
        'customer_id',
        'tanggal_mulai',
        'tanggal_akhir',
        'id_hotel',
    ];
    
    protected $primaryKey = 'id_reservasi';
}
