<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnualReport extends Model
{
    protected $table = 'annual_report';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
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