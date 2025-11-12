<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EarningsCall extends Model
{
    protected $table = 'earnings_call';

    protected $primaryKey = 'id';

    protected $fillable = [
        'year',
        'quarter',
        'title',
        'file',
        'status',
    ];

}
