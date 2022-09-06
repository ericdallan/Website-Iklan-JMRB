<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayarans extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_negotiation',
        'id_user',
        'id_iklan',
        'rate_negotiation',
        'bukti_pembayaran',
        'status_pembayaran',
        'time',
    ];
}
