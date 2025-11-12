<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgmTranscript extends Model
{
    protected $table = 'agm_transcript';

    protected $primaryKey = 'id';

    protected $fillable = [
        'year',
        'file',
        'link',
        'status',
    ];

}
