<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class Buku_mutasi_penduduk extends Admin_Controller {

    private $_table = 'mutasi_penduduk';
    private $_folder = 'buku_mutasi_penduduk';
    private $_mainTitle = 'Data Mutasi Penduduk Desa';
    private $_exelName = 'buku_mutasi_penduduk.xls';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->model('Penduduk_m');
        $this->load->library('breadcrumbcomponent'); 
    }    

    function rulesDestroy(){
        return [
            ['field' => 'rowdelete[]',
            'label' => 'rowdelete',
            'rules' => 'required']
        ];
    }

    function rulesStore() { 
        return [
            ['field' => 'bulan_tahun','label' => 'Bulan dan Tahun Mutasi', 'rules' => 'required'],
            ['field' => 'nama','label' => 'Nama Lengkap', 'rules' => 'required|max_length[50]'],
            ['field' => 'jk','label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'tempat_lahir','label' => 'Tempat Lahir', 'rules' => 'required|max_length[50]'],
            ['field' => 'tgl_lahir','label' => 'Tanggal Lahir', 'rules' => 'required'],
            ['field' => 'wn','label' => 'Kewarganegaraan', 'rules' => 'required'],
            ['field' => 'datang','label' => 'Datang Dari','rules' =>'max_length[100]'],
            ['field' => 'tgl_datang','label' => 'Tanggal Kedatangan'],
            ['field' => 'pindah','label' => 'Pindah Ke','rules' =>'max_length[100]'],
            ['field' => 'tgl_pindah','label' => 'Tanggal Pindah'],
            ['field' => 'meninggal','label' => 'Tempat Meninggal','rules' =>'max_length[100]'],
            ['field' => 'tgl_meninggal','label' => 'Tanggal Meninggal'],
            ['field' => 'ket','label' => 'Keterangan'],
           ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'id','label' => 'id', 'rules' => 'required'],
            ['field' => 'bulan_tahun','label' => 'Bulan dan Tahun Mutasi', 'rules' => 'required'],
            ['field' => 'nama','label' => 'Nama Lengkap', 'rules' => 'required|max_length[50]'],
            ['field' => 'jk','label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'tempat_lahir','label' => 'Tempat Lahir', 'rules' => 'required|max_length[50]'],
            ['field' => 'tgl_lahir','label' => 'Tanggal Lahir', 'rules' => 'required'],
            ['field' => 'wn','label' => 'Kewarganegaraan', 'rules' => 'required'],
            ['field' => 'datang','label' => 'Datang Dari','rules' => 'max_length[100'],
            ['field' => 'tgl_datang','label' => 'Tanggal Kedatangan'],
            ['field' => 'pindah','label' => 'Pindah Ke','rules' => 'max_length[100]'],
            ['field' => 'tgl_pindah','label' => 'Tanggal Pindah'],
            ['field' => 'meninggal','label' => 'Tempat Meninggal','rules' => 'max_length[100]'],
            ['field' => 'tgl_meninggal','label' => 'Tanggal Meninggal'],
            ['field' => 'ket','label' => 'Keterangan'],
           ];
    }


    function index(){
            
            $this->breadcrumbcomponent->add('Home', base_url());
            $this->breadcrumbcomponent->add('Admin', base_url('admin'));  
            $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/'));

            $breadcrumb = $this->breadcrumbcomponent->output();
            $data = array(
                'breadcrumb' => $breadcrumb,
                'data' => $this->Main_m->get($this->_table,null)->result(),
                'title' => $this->_mainTitle,
                'uri' => $this->uri->segment_array(),
                'folder' => $this->_folder,
            );

            $this->load->view('admin/partials/header');
            $this->load->view('admin/partials/content_sidebar');
            $this->load->view('admin/partials/content_navbar');
            $this->load->view('admin/'.$this->_folder.'/index',$data);
            $this->load->view('admin/partials/content_footer');
            $this->load->view('admin/partials/footer');
    }

    function detail($id){
        
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin')); 
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/')); 
        $this->breadcrumbcomponent->add('Detail', base_url('admin/'.$this->_folder.'/detail/'));
        $this->breadcrumbcomponent->add($id, base_url('admin/'.$this->_folder.'/detail/'.$id));

        $breadcrumb = $this->breadcrumbcomponent->output();
        $where = ['id'=>$id];
        $data = array(
            'breadcrumb' => $breadcrumb,
            'data' => $this->Main_m->get($this->_table,$where)->result(),
            'title' => "Detail ".$this->_mainTitle,
            'uri' => $this->uri->segment_array(),
            'folder' => $this->_folder,
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/detail',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

    function add(){
        
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin')); 
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/')); 
        $this->breadcrumbcomponent->add('Add', base_url('admin/'.$this->_folder.'/add'));

        $breadcrumb = $this->breadcrumbcomponent->output();
        $data = array(
            'breadcrumb' => $breadcrumb,
            'title' => "Tambah Data ".$this->_mainTitle,
            'uri' => $this->uri->segment_array(),
            'folder' => $this->_folder,
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/add',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

    public function store(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesStore());
        if($validation->run()){
            $_POST = $this->input->post();
            $data = array(
                'bulan_tahun' => $_POST['bulan_tahun'],
                'nama' => $_POST['nama'],
                'jk' => $_POST['jk'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tgl_lahir' => $_POST['tgl_lahir'],
                'wn' => $_POST['wn'],
                'datang' => $_POST['datang'],
                'tgl_datang' => $_POST['tgl_datang'],
                'pindah' => $_POST['pindah'],
                'tgl_pindah' => $_POST['tgl_pindah'],
                'meninggal' => $_POST['meninggal'],
                'tgl_meninggal' => $_POST['tgl_meninggal'],
                'ket' => $_POST['ket'],
                'created_at' => date('Y-m-d'),
                
            );

            if($this->Main_m->store($data,$this->_table)){
                $this->session->set_flashdata('success_message', 'Pengisian form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diinput',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                //$this->session->set_flashdata('error_message', 'Mohon maaf, pengisian form gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Pengisian form gagal',
                );
            }
        }
        else{
            //$this->session->set_flashdata('error_message', validation_errors());
            $callback = array(
                'status' => 'error',
                'message' => validation_errors(),
            );
        }
        echo json_encode($callback);
    }

    function edit($id){
            
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin')); 
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/')); 
        $this->breadcrumbcomponent->add('Edit', base_url('admin/'.$this->_folder.'/edit/'));
        $this->breadcrumbcomponent->add($id, base_url('admin/'.$this->_folder.'/edit/'.$id));

        $breadcrumb = $this->breadcrumbcomponent->output();
        $where = ['id'=>$id];
        $data = array(
            'breadcrumb' => $breadcrumb,
            'data' => $this->Main_m->get($this->_table,$where)->result(),
            'title' => "Edit ".$this->_mainTitle,
            'uri' => $this->uri->segment_array(),
            'folder' => $this->_folder,
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/edit',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

    public function update(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesUpdate());
        if($validation->run()){
            $_POST = $this->input->post();
            $id = $_POST['id'];
            $where = ['id'=>$id];
            $data = array(
                'bulan_tahun' => $_POST['bulan_tahun'],
                'nama' => $_POST['nama'],
                'jk' => $_POST['jk'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tgl_lahir' => $_POST['tgl_lahir'],
                'wn' => $_POST['wn'],
                'datang' => $_POST['datang'],
                'tgl_datang' => $_POST['tgl_datang'],
                'pindah' => $_POST['pindah'],
                'tgl_pindah' => $_POST['tgl_pindah'],
                'meninggal' => $_POST['meninggal'],
                'tgl_meninggal' => $_POST['tgl_meninggal'],
                'ket' => $_POST['ket'],
                'updated_at' => date('Y-m-d'),
            );

            if($this->Main_m->update($data,$this->_table,$where)){
                $this->session->set_flashdata('success_message', 'Edit form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diupdate',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, pengisian form gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Update data gagal disimpan',
                );
            }
        }
        else{
            $this->session->set_flashdata('error_message', validation_errors());
            $callback = array(
                'status' => 'error',
                'message' => validation_errors(),
            );          
        }
        echo json_encode($callback);
    }

    public function destroy(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesDestroy());
        if($validation->run()){
            $_POST = $this->input->post();
            $rowdetele = $_POST['rowdelete'];
            $lastrow = count($rowdetele);
            $count = 1;
            $where = "";
            foreach($rowdetele as $r){
                if($count == $lastrow){
                    $where.= "id = ".$r;
                }
                else{
                    $where.= "id = ".$r." OR ";
                }
                $count++;
            }
            if($this->Main_m->destroy($this->_table,$where)){
                
                $this->session->set_flashdata('success_message', 'Hapus data berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil dihapus',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, Hapus data gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Pengisian form gagal',
                );
            }
        }
        else{
            $this->session->set_flashdata('error_message', validation_errors());
            $callback = array(
                'status' => 'error',
                'message' => validation_errors(),
                'redirect' => base_url().'admin/'.$this->_folder,
            );          
        }
        echo json_encode($callback);
    }

    function cetak(){
        $bulan_tahun = $this->input->post('bulan_tahun');
        echo $bulan_tahun;
        $data=$this->Penduduk_m->getMutasiTahunBulan($bulan_tahun)->result();
        echo var_dump($data);
    }

    public function cetakExc(){
        $bulan_tahun = $this->input->get('bulan_tahun');
        $where = ['bulan_tahun'=>$bulan_tahun];
        $reader = IOFactory::createReader('Xls');
        $spreadsheet = $reader->load('./assets/buku_adm_penduduk/'.$this->_exelName);
        $data=$this->Main_m->getAsc($this->_table,$where)->result();
        $values = array();
        $i = 0;
        $no = 1;
        foreach($data as $d){

            if($d->jk == 'Laki-Laki'){
                $jkelamin = "L";
            }
            else{
                $jkelamin = "P";
            }
            $subvalues = array(
                $no++,
                $d->nama,         
                $d->tempat_lahir,
                date("d-m-Y", strtotime($d->tgl_lahir)),
                $jkelamin,
                $d->wn,
                $d->datang,
                date("d-m-Y", strtotime($d->tgl_datang)),
                $d->pindah,
                date("d-m-Y", strtotime($d->tgl_pindah)),
                $d->meninggal,
                date("d-m-Y", strtotime($d->tgl_meninggal)),
                $d->ket
            );
           
            $values[] = $subvalues;
            $i++;
        }

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray(
            $values,
            NULL,
            'A13'
        );

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,  
                ],
            ],
        ];

        $i = $i + 6;

        $sheet->getStyle('A13:J'.$i)->applyFromArray($styleArray);
        $sheet->getStyle('A13:J'.$i)->getAlignment()->setWrapText(true);
        $sheet->getStyle('A13:J'.$i)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A13:J'.$i)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        // foreach(range('A7','J') as $columnID) {
        //     $sheet->getColumnDimension($columnID)->setAutoSize(true);
        // }
        for($r = 13;$r <= $i;$r++){
            $sheet->getRowDimension((string)$r)->setRowHeight(-1);
        }
        $writer = new Xls($spreadsheet);

        $filename = $this->_exelName;

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

