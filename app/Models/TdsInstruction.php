<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TdsInstruction extends Model
{
    protected $table = 'tds_instructions';

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