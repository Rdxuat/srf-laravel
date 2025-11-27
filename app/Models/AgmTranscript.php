<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgmTranscript extends Model
{
    protected $table = 'agm_transcript';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'year',
        'file',
        'link',
        'status',
        'is_protected',
    ];

}