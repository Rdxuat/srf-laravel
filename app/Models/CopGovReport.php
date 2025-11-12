<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CopGovReport extends Model
{
    protected $table = 'cop_gov_report';

    protected $primaryKey = 'id';

    public $timestamps = true; // Uses `created_at` and `updated_at`

    protected $fillable = [
        'year',
        'quarter',
        'title',
        'file',
        'status',
    ];
}
