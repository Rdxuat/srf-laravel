<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;

    protected $table = 'dividend_and_shares_unclaimed_dividend'; // your table name

    protected $fillable = [
        'investor_first_name',
        'investor_middle_name',
        'investor_last_name',
        'husband_first_name',
        'husband_middle_name',
        'husband_last_name',
        'address',
        'country',
        'state',
        'district',
        'pin_code',
        'folio_number',
        'dp_id_client_id',
        'investment_type',
        'ammount_transferred',
        'proposed_date',
        'pan',
        'date_of_birth',
        'aadhar_number',
        'nominee_name',
        'joint_holder_name',
        'remarks',
        'investment_amount',
        'shares_transfer',
        'financial_year'
    ];

    public $timestamps = true; // You removed created_at and updated_at
}
