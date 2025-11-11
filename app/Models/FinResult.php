<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinResult extends Model
{
    protected $table = 'fin_results';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'year',
        'quarter',
        'title',
        'file',
        'status',
    ];
}