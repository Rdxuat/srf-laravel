<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $table = 'policy';

    protected $primaryKey = 'id';

    public $timestamps = true; // manages created_at and updated_at automatically

    protected $fillable = [
        'title',
        'file',
        'status',
    ];
}
