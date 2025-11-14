<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockExchangeFilings extends Model
{
    protected $table = 'stock_exchange_filings';

    protected $primaryKey = 'id';

    public $timestamps = true; 

    protected $fillable = [
        'user_id',
        'year',
        'title',
        'file',
        'status',
    ];
}
