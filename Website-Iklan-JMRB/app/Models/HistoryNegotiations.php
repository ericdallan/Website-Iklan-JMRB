<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryNegotiations extends Model
{
    use HasFactory;
    protected $table = 'history_negotiations';
    protected $primaryKey = 'id_history';

    protected $fillable = [
        'id_negotiation',
        'id_user',
        'HistoryRate_negotiation',
        'HistoryStatus_negotiation',
        'time',
    ];
}
