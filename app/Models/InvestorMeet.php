<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorMeet extends Model
{
    protected $table = 'investor_meet';

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
    ];

}
