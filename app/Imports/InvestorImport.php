<?php

namespace App\Imports;

use App\Models\Investor;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class InvestorImport implements OnEachRow, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    public function onRow(Row $row)
    {
        $r = $row->toArray();

        Investor::create([
            'investor_first_name' => $r['investor_first_name'],
            'investor_middle_name' => $r['investor_middle_name'],
            'investor_last_name' => $r['investor_last_name'],
            'husband_first_name' => $r['husband_first_name'],
            'husband_middle_name' => $r['husband_middle_name'],
            'husband_last_name' => $r['husband_last_name'],
            'address' => $r['address'],
            'country' => $r['country'],
            'state' => $r['state'],
            'district' => $r['district'],
            'pin_code' => $r['pin_code'],
            'folio_number' => $r['folio_number'],
            'dp_id_client_id' => $r['dp_id_client_id'],
            'investment_type' => $r['investment_type'],
            'ammount_transferred' => $r['ammount_transferred'],
            'proposed_date' => $r['proposed_date'],
            'pan' => $r['pan'],
            'date_of_birth' => $r['date_of_birth'],
            'aadhar_number' => $r['aadhar_number'],
            'nominee_name' => $r['nominee_name'],
            'joint_holder_name' => $r['joint_holder_name'],
            'remarks' => $r['remarks'],
            'investment_amount' => $r['investment_amount'],
            'shares_transfer' => $r['shares_transfer'],
            'financial_year' => $r['financial_year'],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000; // handles 1 lakh rows efficiently
    }

    public function batchSize(): int
    {
        return 1000;
    }
}