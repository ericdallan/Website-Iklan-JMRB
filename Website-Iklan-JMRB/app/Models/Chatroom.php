<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    use HasFactory;
    protected $table = 'chatrooms';
    protected $primaryKey = 'id_chatroom';

    protected $fillable = [
        'id_user',
        'id_admin',
    ];
}
