<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnualReport extends Model
{
    protected $table = 'annual_report';

    protected $primaryKey = 'id';

    protected $fillable = [
        'year',
        'txt',
        'img',
        'web_link',
        'pdf',
        'user_id',
        'status',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'status' => 'boolean',
    ];
}