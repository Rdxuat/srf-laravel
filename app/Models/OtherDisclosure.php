<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherDisclosure extends Model
{
    protected $table = 'other_disclousers';

    protected $primaryKey = 'id';

    public $timestamps = true; 

    protected $fillable = [
        'user_id',
        'title',
        'file',
        'status',
    ];
}
