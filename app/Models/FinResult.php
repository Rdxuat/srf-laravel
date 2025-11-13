<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinResult extends Model
{
    protected $table = 'fin_results';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'year',
        'quarter',
        'file_type',
        'title',
        'link_type',
        'file',
        'status',
    ];
}