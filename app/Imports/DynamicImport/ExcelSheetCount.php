<?php

namespace App\Imports\DynamicImport;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

HeadingRowFormatter::default('none');

class ExcelSheetCount implements WithHeadingRow, WithEvents
{
    private $sheet_names;

    public function __construct()
    {
        $this->sheet_names = [];
    }
    
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $this->sheet_names[] = $event->getSheet()->getTitle();
            }
        ];
    }

    public function getSheetNames()
    {
        return $this->sheet_names;
    }
}
