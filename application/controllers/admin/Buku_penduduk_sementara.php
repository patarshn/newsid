<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class Buku_penduduk_sementara extends Admin_Controller {

    private $_table = 'penduduk_sementara';
    private $_folder = 'buku_penduduk_sementara';
    private $_mainTitle = 'Buku Penduduk Sementara';
    private $_docxName = 'buku_penduduk_sementara.docx';
    private $_exelName = 'buku_penduduk_sementara.xls';
 
    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent'); 
    }     
    
    function rulesStore() {
        return [
            ['field' => 'tahun','label' => 'Tahun Kedatangan', 'rules' => 'required|min_length[4]|max_length[4]'],
            ['field' => 'no_identitas','label' => 'Nomor Identitas/Tanda Pengenal', 'rules' => 'required|max_length[16]'],
            ['field' => 'nama','label' => 'Nama Lengkap', 'rules' => 'required|max_length[50]'],
            ['field' => 'jk','label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'tempat_lahir','label' => 'Tempat Lahir', 'rules' => 'required|max_length[50]'],
            ['field' => 'tgl_lahir','label' => 'Tanggal Lahir', 'rules' => 'required'],
            ['field' => 'umur','label' => 'Umur', 'rules' => 'required|max_length[3]'],
            ['field' => 'kebangsaan','label' => 'Kebangsaan'],
            ['field' => 'keturunan','label' => 'Keturunan','rules' => 'max_length[50]'],
            ['field' => 'pekerjaan','label' => 'Pekerjaan', 'rules' => 'required|max_length[50]'],
            ['field' => 'datang_dari','label' => 'Datang Dari', 'rules' => 'required|max_length[100]'],
            ['field' => 'maksud_tujuan','label' => 'Maksud dan Tujuan', 'rules' => 'required|max_length[150]'],
            ['field' => 'nama_yg_didatangi','label' => 'Nama Penduduk yang Didatangi', 'rules' => 'required|max_length[50]'],
            ['field' => 'alamat_yg_didatangi','label' => 'Alamat Penduduk yang Didatangi', 'rules' => 'required|max_length[100]'],
            ['field' => 'tgl_datang','label' => 'Tanggal Kedatangan', 'rules' => 'required'],
            ['field' => 'tgl_pergi','label' => 'Tanggal Kepergian'],
            ['field' => 'ket','label' => 'Keterangan'],
           ];
    } 
    
    function rulesUpdate(){
        return [
            ['field' => 'id','label' => 'id', 'rules' => 'required'],
            ['field' => 'tahun','label' => 'Tahun Kedatangan', 'rules' => 'required|min_length[4]|max_length[4]'],
            ['field' => 'no_identitas','label' => 'Nomor Identitas/Tanda Pengenal', 'rules' => 'required|max_length[16]'],
            ['field' => 'nama','label' => 'Nama Lengkap', 'rules' => 'required|max_length[50]'],
            ['field' => 'jk','label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'tempat_lahir','label' => 'Tempat Lahir', 'rules' => 'required|max_length[50]'],
            ['field' => 'tgl_lahir','label' => 'Tanggal Lahir', 'rules' => 'required'],
            ['field' => 'umur','label' => 'Umur','rules' => 'required|max_length[3]'],
            ['field' => 'kebangsaan','label' => 'Kebangsaan'],
            ['field' => 'keturunan','label' => 'Keturunan','rules' => 'max_length[50]'],
            ['field' => 'pekerjaan','label' => 'Pekerjaan', 'rules' => 'required|max_length[50]'],
            ['field' => 'datang_dari','label' => 'Datang Dari', 'rules' => 'required|max_length[100]'],
            ['field' => 'maksud_tujuan','label' => 'Maksud dan Tujuan', 'rules' => 'required|max_length[150]'],
            ['field' => 'nama_yg_didatangi','label' => 'Nama Penduduk yang Didatangi', 'rules' => 'required|max_length[50]'],
            ['field' => 'alamat_yg_didatangi','label' => 'Alamat Penduduk yang Didatangi', 'rules' => 'required|max_length[100]'],
            ['field' => 'tgl_datang','label' => 'Tanggal Kedatangan', 'rules' => 'required'],
            ['field' => 'tgl_pergi','label' => 'Tanggal Kepergian'],
            ['field' => 'ket','label' => 'Keterangan'],
           ];
    }

    function rulesDestroy(){
        return [
            ['field' => 'rowdelete[]',
            'label' => 'rowdelete',
            'rules' => 'required']
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
                'tahun' => $_POST['tahun'],
                'no_identitas' => $_POST['no_identitas'],
                'nama' => $_POST['nama'],
                'jk' => $_POST['jk'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tgl_lahir' => $_POST['tgl_lahir'],
                'umur' => $_POST['umur'],
                'pekerjaan' => $_POST['pekerjaan'],
                'kebangsaan' => $_POST['kebangsaan'],
                'keturunan' => $_POST['keturunan'],
                'datang_dari' => $_POST['datang_dari'],
                'maksud_tujuan' => $_POST['maksud_tujuan'],
                'nama_yg_didatangi' => $_POST['nama_yg_didatangi'],
                'alamat_yg_didatangi' => $_POST['alamat_yg_didatangi'],
                'tgl_datang' => $_POST['tgl_datang'],
                'tgl_pergi' => $_POST['tgl_pergi'],
                'ket' => $_POST['ket'],
                'created_at' => date('Y-m-d H:i:s'),
                
            );

            $no_identitas = $_POST['no_identitas'];
            $sql  = $this->db->query("SELECT no_identitas FROM penduduk_sementara where no_identitas='$no_identitas'");
            $cek_identitas = $sql->num_rows();
            if($cek_identitas > 0){
                $this->session->set_flashdata('error_message', 'Nomor Indentitas/Tanda Pengenal sudah terdaftar sebelumnya');
                    $callback = array(
                        'status' => 'error',
                        'message' => 'Nomor Indentitas/Tanda Pengenal sudah terdaftar sebelumnya',
                    );
               echo json_encode($callback);
               exit();
            }

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
                'tahun' => $_POST['tahun'],
                'no_identitas' => $_POST['no_identitas'],
                'nama' => $_POST['nama'],
                'jk' => $_POST['jk'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tgl_lahir' => $_POST['tgl_lahir'],
                'umur' => $_POST['umur'],
                'pekerjaan' => $_POST['pekerjaan'],
                'kebangsaan' => $_POST['kebangsaan'],
                'keturunan' => $_POST['keturunan'],
                'datang_dari' => $_POST['datang_dari'],
                'maksud_tujuan' => $_POST['maksud_tujuan'],
                'nama_yg_didatangi' => $_POST['nama_yg_didatangi'],
                'alamat_yg_didatangi' => $_POST['alamat_yg_didatangi'],
                'tgl_datang' => $_POST['tgl_datang'],
                'tgl_pergi' => $_POST['tgl_pergi'],
                'ket' => $_POST['ket'],
                'updated_at' => date('Y-m-d H:i:s'),
                
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
                $this->session->set_flashdata('error_message', 'Mohon maaf, hapus data gagal');
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
        $tahun = $this->input->get('tahun');
        $where = ['tahun'=>$tahun];
        $data=$this->Main_m->getAsc($this->_table,$where)->result();
        #   echo var_dump($data);
        $today = date('Y-m-d');
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templateProcessor = $phpWord->loadTemplate('./assets/buku_pembangunan/'.$this->_docxName);
        $values = array();
        $no = 1;
        foreach($data as $d){
            $subvalues = array(
                'no' => $no++,
                'nama' => $d->nama,
                'no_identitas' => $d->no_identitas,
                'tempat_lahir' => $d->tempat_lahir,
                'tgl_lahir' => $d->tgl_lahir,
                'umur' => $d->umur,
                'pekerjaan' => $d->pekerjaan,
                'kebangsaan' => $d->kebangsaan,
                'keturunan' => $d->keturunan,
                'datang_dari' => $d->datang_dari,
                'maksud_tujuan' => $d->maksud_tujuan,
                'nama_yg_didatangi' => $d->nama_yg_didatangi,
                'alamat_yg_didatangi' => $d->alamat_yg_didatangi,
                'tgl_datang' => $d->tgl_datang,
                'tgl_pergi' => $d->tgl_pergi,
                'ket' => $d->ket
            );
            if($d->jk == 'Laki-Laki'){
                $subvalues['jkl'] ='L';
                $subvalues['jkp'] = '';
            }
            else{
                $subvalues['jkp'] = 'P';
                $subvalues['jkl'] = '';
            }

            $values[] = $subvalues;
        }

        $templateProcessor->cloneRowAndSetValues('no', $values);
        $templateProcessor->setValue('tahun', $tahun);
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

    public function cetakExc(){
        $tahun = $this->input->get('tahun');
        $where = ['tahun'=>$tahun];
        $reader = IOFactory::createReader('Xls');
        $spreadsheet = $reader->load('./assets/buku_adm_penduduk/'.$this->_exelName);
        $data=$this->Main_m->getAsc($this->_table,$where)->result();
        $values = array();
        $i = 0;
        $no = 1;
        foreach($data as $d){

            if($d->jk == 'Laki-Laki'){
                $lakilaki = "L";
                $perempuan = ""; 
            }
            else{
                $perempuan = "P";
                $lakilaki = "";
            }
            $subvalues = array(
                $no++,
                $d->nama,
                $lakilaki,
                $perempuan,
                $d->no_identitas,
                $d->tempat_lahir.",".date("d-m-Y", strtotime($d->tgl_lahir))."/".$d->umur,
                $d->pekerjaan,
                $d->kebangsaan,
                $d->keturunan,
                $d->datang_dari,
                $d->maksud_tujuan,
                $d->nama_yg_didatangi.",".$d->alamat_yg_didatangi,
                date("d-m-Y", strtotime($d->tgl_datang)),
                date("d-m-Y", strtotime($d->tgl_pergi)),
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