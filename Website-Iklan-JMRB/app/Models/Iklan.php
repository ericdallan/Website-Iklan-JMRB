<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Iklan extends Model
{
    use HasFactory, Searchable;
    protected $table = 'iklans';
    protected $primaryKey = 'id_iklan';

    protected $fillable = [
        'id_user',
        'name',
        'zone',
        'location',
        'maps_coord',
        'pic_advert',
        'survey_date',
        'status',
        'ba_survey',
        'expired_date',
    ];
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'zone' => $this->zone,
            'location' => $this->location,  
            'status' => $this->status,
        ];
    }
}
