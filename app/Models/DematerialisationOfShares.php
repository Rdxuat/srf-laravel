<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DematerialisationOfShares extends Model
{
    protected $table = 'dematerialisation_of_shares';

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