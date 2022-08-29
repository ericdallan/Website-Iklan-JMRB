<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Forums extends Model
{
    use HasFactory,Searchable;
    protected $table = 'forums';
    protected $primaryKey = 'id_forum';

    protected $fillable = [
        'id_user',
        'title',
        'picture',
        'body',
        'category',
        'time',
    ];
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category,
        ];
    }
}
