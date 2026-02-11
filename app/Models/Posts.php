<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'thumbnail',
        'title',
        'status',
        'id_user',
        'content',
        'references',
    ];
}
