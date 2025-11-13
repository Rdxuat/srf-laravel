<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KycForm extends Model
{
    protected $table = 'kyc_forms';

    protected $primaryKey = 'id';

    public $timestamps = true; // manages created_at and updated_at automatically

    protected $fillable = [
        'title',
        'file',
        'status',
    ];
}
