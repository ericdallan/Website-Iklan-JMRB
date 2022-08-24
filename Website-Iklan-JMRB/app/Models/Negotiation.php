<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Negotiation extends Model
{
    use HasFactory, Searchable;
    protected $table = 'negotiations';
    protected $primaryKey = 'id_negotiation';

    protected $fillable = [
        'id_user',
        'id_iklan',
        'type',
        'advert_type',
        'meter',
        'month',
        'sides',
        'rate_negotiation',
        'status_negotiation',
    ];
    public function toSearchableArray()
    {
        return [
            'type' => $this->type,
            'advert_type' => $this->advert_type,
            'month' => $this->month,
        ];
    }
}
