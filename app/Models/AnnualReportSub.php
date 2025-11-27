<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnualReportSub extends Model
{
    protected $table = 'annual_report_sub';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'year',
        'title',
        'file',
        'status',
        'is_protected',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}