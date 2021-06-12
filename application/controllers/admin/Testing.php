<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends Admin_Controller{

    private $_table = 'form_domisili';
    private $_folder = 'form_domisili';
    private $_folderUpload = 'form_domisili';
    private $_docxTest = 'Sample_07_TemplateCloneRow.docx';
    private $_docxName = 'form_testing.docx';
    private $_mainTitle = 'Form Domisili';

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



}