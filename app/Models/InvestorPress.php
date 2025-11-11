<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorPress extends Model
{
    // Table name
    protected $table = 'investor_press';
    public $timestamps = true;
    protected $fillable = [
        'year',
        'quarter',
        'title',
        'file',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}