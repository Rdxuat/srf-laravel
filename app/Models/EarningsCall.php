<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EarningsCall extends Model
{
    protected $table = 'earning_calls';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'category',
        'year',
        'quarter',
        'title',
        'file',
        'status',
        'is_protected',
    ];

}