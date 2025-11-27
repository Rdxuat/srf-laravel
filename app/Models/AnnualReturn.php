<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnualReturn extends Model
{
    protected $table = 'annual_return';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'year',
        'title',
        'file',
        'added_at',
        'status',
        'is_protected',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}