<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notices';

    protected $primaryKey = 'id';

    public $timestamps = true; 

    protected $fillable = [
        'user_id',
        'title',
        'file',
        'status',
        'is_protected',
    ];
}