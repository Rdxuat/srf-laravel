<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareholdingPattern extends Model
{
    protected $table = 'shareholding_pattern';

    protected $primaryKey = 'id';

    public $timestamps = true; 

    protected $fillable = [
        'user_id',
        'year',
        'title',
        'file',
        'status',
    ];
}
