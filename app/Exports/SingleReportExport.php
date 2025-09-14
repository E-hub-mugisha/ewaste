<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SingleReportExport implements FromArray, WithHeadings
{
    protected $data;
    protected $type;

    public function __construct(array $data, string $type)
    {
        $this->data = $data;
        $this->type = $type;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        if ($this->type === 'devices') {
            return ['ID', 'Name', 'User', 'Created At']; // adjust columns to your Device fields
        } elseif ($this->type === 'pickups') {
            return ['ID', 'Device', 'Collector', 'Pickup Date']; // adjust columns
        } elseif ($this->type === 'transfers') {
            return ['ID', 'Device', 'Collector', 'Partner', 'Transfer Date']; // adjust columns
        }

        return [];
    }
}
