<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnualReport extends Model
{
    protected $table = 'annual_report';

    protected $primaryKey = 'id';

    protected $fillable = [
        'year',
        'title',
        'image',
        'web_link',
        'file',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}