<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negotiation extends Model
{
    use HasFactory;
    protected $table = 'negotiations';
    protected $primaryKey = 'id_negotiation';

    protected $fillable = [
        'id_user',
        'id_iklan',
        'type',
        'advert_type',
        'meter',
        'year',
        'rate_negotiation',
        'status_negotiation',
    ];
}
