<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CopGovReport extends Model
{
    protected $table = 'corporate_governance_report';

    protected $primaryKey = 'id';

    public $timestamps = true; // Uses `created_at` and `updated_at`

    protected $fillable = [
        'user_id',
        'year',
        'title',
        'file',
        'status',
    ];
}
