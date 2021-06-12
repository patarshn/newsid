<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

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

    function cetak_table_manual(){
        $data = $this->Main_m->get($this->_table,null)->result();
        $today = date('Y-m-d');
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templateProcessor  = $phpWord->loadTemplate('./assets/form/'.$this->_docxTest);
                
        // Simple table
        $templateProcessor->cloneRow('rowValue', 10);

        $templateProcessor->setValue('rowValue#1', 'Sun');
        $templateProcessor->setValue('rowValue#2', 'Mercury');
        $templateProcessor->setValue('rowValue#3', 'Venus');
        $templateProcessor->setValue('rowValue#4', 'Earth');
        $templateProcessor->setValue('rowValue#5', 'Mars');
        $templateProcessor->setValue('rowValue#6', 'Jupiter');
        $templateProcessor->setValue('rowValue#7', 'Saturn');
        $templateProcessor->setValue('rowValue#8', 'Uranus');
        $templateProcessor->setValue('rowValue#9', 'Neptun');
        $templateProcessor->setValue('rowValue#10', 'Pluto');

        $templateProcessor->setValue('rowNumber#1', '1');
        $templateProcessor->setValue('rowNumber#2', '2');
        $templateProcessor->setValue('rowNumber#3', '3');
        $templateProcessor->setValue('rowNumber#4', '4');
        $templateProcessor->setValue('rowNumber#5', '5');
        $templateProcessor->setValue('rowNumber#6', '6');
        $templateProcessor->setValue('rowNumber#7', '7');
        $templateProcessor->setValue('rowNumber#8', '8');
        $templateProcessor->setValue('rowNumber#9', '9');
        $templateProcessor->setValue('rowNumber#10', '10');

        // Table with a spanned cell
        $values = array(
            array(
                'userId'        => 1,
                'userFirstName' => 'James',
                'userName'      => 'Taylor',
                'userPhone'     => '+1 428 889 773',
            ),
            array(
                'userId'        => 2,
                'userFirstName' => 'Robert',
                'userName'      => 'Bell',
                'userPhone'     => '+1 428 889 774',
            ),
            array(
                'userId'        => 3,
                'userFirstName' => 'Michael',
                'userName'      => 'Ray',
                'userPhone'     => '+1 428 889 775',
            ),
        );

        $templateProcessor->cloneRowAndSetValues('userId', $values);

        //this is equivalent to cloning and settings values with cloneRowAndSetValues
        // $templateProcessor->cloneRow('userId', 3);

        // $templateProcessor->setValue('userId#1', '1');
        // $templateProcessor->setValue('userFirstName#1', 'James');
        // $templateProcessor->setValue('userName#1', 'Taylor');
        // $templateProcessor->setValue('userPhone#1', '+1 428 889 773');

        // $templateProcessor->setValue('userId#2', '2');
        // $templateProcessor->setValue('userFirstName#2', 'Robert');
        // $templateProcessor->setValue('userName#2', 'Bell');
        // $templateProcessor->setValue('userPhone#2', '+1 428 889 774');

        // $templateProcessor->setValue('userId#3', '3');
        // $templateProcessor->setValue('userFirstName#3', 'Michael');
        // $templateProcessor->setValue('userName#3', 'Ray');
        // $templateProcessor->setValue('userPhone#3', '+1 428 889 775');

        echo date('H:i:s'), ' Saving the result document...', EOL;
        $temp_filename = $this->_docxTest;
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

    
    function cetak_table_db(){
        $data = $this->Main_m->get($this->_table,null)->result();
        $today = date('Y-m-d');
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templateProcessor = $phpWord->loadTemplate('./assets/form/'.$this->_docxName);
        $values = array();

        foreach($data as $d){
            $subvalues = array(
                'no' => $d->id,
                'nik' => $d->nik,
                'nama' => $d->nama
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


    //cetak dengan excel tanpa database (hanya testing, tidak dipakai)
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