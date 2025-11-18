<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardOfDirectors extends Model
{
    protected $table = 'board_of_directors';

    protected $primaryKey = 'id';

    public $timestamps = true; 

    protected $fillable = [
        'name',
        'designation',
        'image',
        'modal_image',
        'intro',
        'description',
        'committe',
        'committe_type',
    ];

     protected $casts = [
        'committe'      => 'array',
        'committe_type' => 'array',
    ];
}