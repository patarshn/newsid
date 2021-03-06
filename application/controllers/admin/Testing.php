<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Testing extends Admin_Controller{

    private $_table = 'form_belummenikah';
    private $_folder = 'form_belummenikah';
    private $_folderUpload = 'form_belummenikah';
    private $_docxTest = 'Sample_07_TemplateCloneRow.docx';
    private $_xlsxName = 'testing.xls';
    private $_docxName = 'form_testing.docx';
    private $_mainTitle = 'Form Testing';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent'); 
    }    
    
    function rulesUpdate(){
        return [
            ['field' => 'id',
            'label' => 'id',
            'rules' => 'required'],
        ];  
    }

    function rulesDestroy(){
        return [
            ['field' => 'rowdelete[]',
            'label' => 'rowdelete',
            'rules' => 'required']
        ];
    }

    
    function cetak_table_db(){
        $data = $this->Main_m->getAsc($this->_table,null)->result();
        $today = date('Y-m-d');
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templateProcessor = $phpWord->loadTemplate('./assets/form/'.$this->_docxName);
        $values = array();

        foreach($data as $d){
            $subvalues = array(
                'no' => $d->id,
                'nik' => $d->nik,
                'nama' => $d->nama,
                'jenis_kelamin' => $d->jenis_kelamin
            );
            $values[] = $subvalues;
        }

        $templateProcessor->cloneRowAndSetValues('no', $values);
        $temp_filename = $this->_docxName;
        $templateProcessor->saveAs($temp_filename);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$temp_filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($temp_filename));
        flush();
        readfile($temp_filename);
        unlink($temp_filename);
        exit;    
    }


    //cetak dengan excel dengan database
    function cetak_table_db_excel(){
        $reader = IOFactory::createReader('Xls');
        $spreadsheet = $reader->load('./assets/form/testing.xls');
        $data = $this->Main_m->get($this->_table,null)->result();
        $values = array();
        $i = 0;
        foreach($data as $d){
            $subvalues = array(
                $d->id,$d->nik,$d->nama
            );
            $values[] = $subvalues;
            $i++;
        }

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray(
            $values,  // The data to set
            NULL,        // Array values with this value will not be set
            'A3'         // Top left coordinate of the worksheet range where
                        //    we want to set these values (default is A1)
        );

        //styleArray untuk ngasih border ke data yang dilooping
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $i = $i + 2;
        
        $sheet->getStyle('A3:E'.$i)->applyFromArray($styleArray);
        $writer = new Xls($spreadsheet);


        $filename = 'laporan-siswa.xls';

        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        $writer->save('php://output');

    }



    //cetak dengan excel dengan database tanpa template
    function cetak_table_db_excel_tanpa_template(){
        $data = $this->Main_m->get($this->_table,null)->result();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        //SET HEADER EXCEL
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nik');
        $sheet->setCellValue('C1', 'Nama');

        $values = array();
        $i = 0;
        foreach($data as $d){
            $subvalues = array(
                $d->id,$d->nik,$d->nama
            );
            $values[] = $subvalues;
            $i++;
        }

        $sheet->fromArray(
            $values,  // The data to set
            NULL,        // Array values with this value will not be set
            'A2'         // Top left coordinate of the worksheet range where
                        //    we want to set these values (default is A1)
        );

        //styleArray untuk ngasih border ke data yang dilooping
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $i = $i + 1;
        
        $sheet->getStyle('A1:C'.$i)->applyFromArray($styleArray);
        $writer = new Xls($spreadsheet);


        $filename = 'laporan-siswa-tanpa-template.xls';

        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        $writer->save('php://output');

    }






    //cetak dengan excel tanpa database (hanya testing, tidak dipakai)
    function cetak_table_manual_excel(){
        $reader = IOFactory::createReader('Xls');
        $spreadsheet = $reader->load('./assets/form/30template.xls');

        $data = [['title' => 'Excel for dummies',
            'price' => 17.99,
            'quantity' => 2,
        ],
            ['title' => 'PHP for dummies',
                'price' => 15.99,
                'quantity' => 1,
            ],
            ['title' => 'Inside OOP',
                'price' => 12.95,
                'quantity' => 1,
            ],
        ];

        $spreadsheet->getActiveSheet()->setCellValue('D1', Date::PHPToExcel(time()));
        $baseRow = 5;
        foreach ($data as $r => $dataRow) {
            $row = $baseRow + $r;
            $spreadsheet->getActiveSheet()->insertNewRowBefore($row, 1);

            $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $r + 1)
                ->setCellValue('B' . $row, $dataRow['title'])
                ->setCellValue('C' . $row, $dataRow['price'])
                ->setCellValue('D' . $row, $dataRow['quantity'])
                ->setCellValue('E' . $row, '=C' . $row . '*D' . $row);
        }
        $spreadsheet->getActiveSheet()->removeRow($baseRow - 1, 1);
        $writer = new Xls($spreadsheet);
        $filename = 'laporan-siswa.xls';

        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        $writer->save('php://output');

    }


}