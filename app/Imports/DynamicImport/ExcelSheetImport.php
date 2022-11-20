<?php

namespace App\Imports\DynamicImport;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Imports\DynamicImport\DataImport;

class ExcelSheetImport implements WithMultipleSheets
{
    use Importable;
    private $sheet_count;
    private $sheet_name_list;

    public function  __construct(int $sheet_count)
    {
        $this->sheet_count = $sheet_count;
    }

    public function sheets(): array
    {
        $import_data = [];
        for ($i = 0; $i < $this->sheet_count; $i++) {

            $data = array(
                $i => new DataImport(),
            );
            $import_data = array_merge($import_data, $data);
        }
        return $import_data;
    }
}
