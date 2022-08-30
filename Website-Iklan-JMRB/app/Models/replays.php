<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replays extends Model
{
    use HasFactory;
    protected $table = 'replays';
    protected $primaryKey = 'id_replay';

    protected $fillable = [
        'id_forum',
        'id_user',
        'id_admin',
        'owner_reply',
        'reply_body',
        'reply_pict',
        'time_reply',
    ];
}
