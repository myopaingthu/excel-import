<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DynamicImport\ExcelSheetCount;
use App\Imports\DynamicImport\ExcelSheetImport;
use App\Models\Item;

class ExcelImportController extends Controller
{
    /**
     * Show import view
     * 
     * @return \Illuminate\Http\Response
     */
    public function showImportView()
    {
        return view('excel-import.excel-import');
    }

    /**
     * Upload excel file
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function uploadExcelFile(Request $request)
    {
        $request->validate([
            'excel_file' => ['required', 'file', 'mimes:xlsx']
        ]);

        $excel_file = $request->file('excel_file');

        $excel_sheet_count = new ExcelSheetCount();
        Excel::import($excel_sheet_count, $excel_file);
        $sheet_count = count($excel_sheet_count->getSheetNames());

        $excel_sheet_import = new ExcelSheetImport($sheet_count);
        Excel::import($excel_sheet_import, $excel_file);

        return redirect()->route('import.report');
    }

    /**
     * Show Report data
     * 
     * @return \Illuminate\Http\Response
     */
    public function showReport()
    {
        $report1 = Item::selectRaw('sum(demand_total_price) as total_amount, equipment_type')
            ->groupBy('equipment_type')
            ->get();

        $report2 = Item::selectRaw('count(*) as total_quantity, item_sub_category')
            ->groupBy('item_sub_category')
            ->get();

        $report3 = Item::selectRaw('department, count(*) as total_quantity, item_sub_category')
            ->groupBy('department', 'item_sub_category')
            ->get();

        return view('excel-import.excel-report')
            ->with([
                'report1' => $report1,
                'report2' => $report2,
                'report3' => $report3
            ]);
    }
}
