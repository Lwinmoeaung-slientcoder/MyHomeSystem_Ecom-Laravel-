<?php

namespace App\Exports;
use App\ProductLists;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ProductListsExport implements FromCollection,WithHeadings, ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $productlists=ProductLists::all();
        
        $data_array=[];
        $i=0;
        foreach($productlists as $productlist){
            $data_array[]=[
                ++$i ,
                 $productlist->name , 
                 $productlist->goldquality, 
                 $productlist->shopname,
                 $productlist->kyat . ' ကျပ် '. $productlist->pel . ' ပဲ '. $productlist->yway .' ရွေး',
                 $productlist->ayaw,
                 $productlist->k_price . ' ကျပ် ' ,
                 $productlist->k_kyat . ' ကျပ် '. $productlist->k_pel . ' ပဲ '. $productlist->k_yway .' ရွေး',
                 $productlist->bought_date

            ];
        }
        $datacollection=collect($data_array);
        return $datacollection;
    }
    public function headings(): array
    {
        return [
            'နံပါတ်',
            'ပစ္စည်းနာမည်', 
            'ရွှေရည်', 
          'ဆိုင််နာမည်', 
           'ရွှေချိန်',
           'အလျော့တွက်',
           'ကျောက်ဖိုး' ,
          'ကျောက်ချိန်',
          'ဝယ်တဲ့ရက်စွဲ',
        ];
    }

        public function registerEvents(): array {
            return [

                // Handle by a closure.
                    AfterSheet::class => function(AfterSheet $event) {
                    $cellRange = 'A1:I1'; // All headers

                    // $last_row = EditPc::where('created_at', 'like', $this->download_date . '%')->count() + 7;
                    // $last_data_row=EditPc::where('created_at', 'like', $this->download_date . '%')->count()+1;

                      $last_row = ProductLists::all()->count() + 7;
                      $last_data_row=ProductLists::all()->count()+1;

                    $name=$last_row+2;
                    $date=$last_row+4;
                    $sign=$last_row+6;
                    $DynamicCellRange='A1:I'.$last_data_row;
                     // assign cell values
                     $event->sheet->setCellValue('E'.$last_row,'Approved By');
 
                     $event->sheet->setCellValue('D'.$name,'Name :');
                     $event->sheet->setCellValue('D'.$date,'Check Date :');
                     $event->sheet->setCellValue('D'.$sign,'Sign :');
 
                     // assign cell styles
                     $event->sheet->getStyle(sprintf('E%d',$last_row));
                     $event->sheet->getStyle(sprintf('I%d',$last_row));
 
                     //Adjust Cell Design
                     $sheet = $event->sheet;
                     $sheetDelegate = $sheet->getDelegate();
                     $sheet->getStyle($cellRange)->getFont()->setSize(14);
                     $sheet->getStyle('E'.$last_row)->getFont()->setSize(14);
                     $sheet->getStyle('E'.$last_row)->getFont()->setBold(true);
                     $sheet->getStyle('I'.$last_row)->getFont()->setSize(14);
                     $sheet->getStyle('I'.$last_row)->getFont()->setBold(true);
                    $sheet->setShowGridlines(false);
                    $sheet->getStyle($DynamicCellRange)->getFont()->setName('Calibri');
                    for($i=0;$i<= $last_data_row;$i++){
                        $sheet->getRowDimension($i)->setRowHeight(25);
                    }
                    $sheet->getStyle($DynamicCellRange)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                    $sheet->getStyle($cellRange)->getFill()
                          ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                          ->getStartColor()->setARGB('CECFCF');
                    $styleArray = [
                        'borders' => [
                            'allBorders' => [
                               
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['rgb' => '000000'],
                             ],
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER ,
                            ],
                    ];
                    
                    $sheet->getStyle($DynamicCellRange)->applyFromArray($styleArray);
                    
                },
            ];
    }
}
