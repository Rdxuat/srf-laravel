<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisclosureThirty extends Model
{
    protected $table = 'disclosures_under_regu_30';

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