<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnualReportSub extends Model
{
    protected $table = 'annual_report_sub';

    protected $primaryKey = 'id';

    protected $fillable = [
        'year',
        'title',
        'file',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}