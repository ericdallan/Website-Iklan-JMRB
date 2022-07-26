<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $primaryKey = 'id_message';

    protected $fillable = [
        'id_message',
        'id_user',
        'id_admin',
        'from',
        'for',
        'message',
        'time',
    ];
    public function toSearchableArray()
    {
        return [
            'message' => $this->message,
        ];
    }
}
