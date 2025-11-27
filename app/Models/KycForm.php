<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KycForm extends Model
{
    protected $table = 'kyc_forms';

    protected $primaryKey = 'id';

    public $timestamps = true; 

    protected $fillable = [
        'user_id',
        'title',
        'file',
        'link_type',
        'status',
        'is_protected',
    ];
}