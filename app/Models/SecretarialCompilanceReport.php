<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecretarialCompilanceReport extends Model
{
    protected $table = 'secretarial_compliance_report';

    protected $primaryKey = 'id';

    public $timestamps = true; // manages created_at and updated_at automatically

    protected $fillable = [
        'user_id',
        'year',
        'title',
        'file',
        'status',
        'is_protected',
    ];
}