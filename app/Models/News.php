<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'desc',
        'date',
        'image',
        'slug',
        'detail',
        'quarter',
        'year',
    ];

    protected $casts = [
        'date'       => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}