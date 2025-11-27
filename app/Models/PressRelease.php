<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PressRelease extends Model
{
    protected $table = 'press_release';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'date',
        'file',
    ];

    protected $casts = [
        'date'       => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}