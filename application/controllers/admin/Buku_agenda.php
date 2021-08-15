<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class Buku_agenda extends Admin_Controller {

    private $_table = 'buku_agenda';
    private $_folder = 'buku_agenda';
    private $_mainTitle = 'Buku Agenda';
    private $_exelName = 'buku_agenda.xls';

    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent');
        
    }

    function rulesStore() {
        if($this->input->post('status_surat') == "PENERIMAAN"){
            return [
                ['field' => 'tanggal_surat','label' => 'Tanggal Penerimaan Surat', 'rules' => 'required'],
                ['field' => 'sm_no','label' => 'Nomor Surat Masuk', 'rules' => 'required|max_length[100]'],
                ['field' => 'sm_tgl','label' => 'Tanggal Surat Masuk', 'rules' => 'required'],
                ['field' => 'sm_pengirim','label' => 'Pengirim', 'rules' => 'required|max_length[100]'],
                ['field' => 'sm_isi','label' => 'Isi Singkat', 'rules' => 'required|max_length[100]'],
                ['field' => 'ket','label' => 'Keterangan', 'rules' => 'max_length[255]'],
            ];
        }
        else if($this->input->post('status_surat') == "PENGIRIMAN"){
            return [
                ['field' => 'tanggal_surat','label' => 'Tanggal Penerimaan Surat', 'rules' => 'required'],
                ['field' => 'sk_no','label' => 'Nomor Surat Masuk', 'rules' => 'required|max_length[100]'],
                ['field' => 'sk_tgl','label' => 'Tanggal Surat Masuk', 'rules' => 'required'],
                ['field' => 'sk_ditunjukkan','label' => 'Pengirim', 'rules' => 'required|max_length[100]'],
                ['field' => 'sk_isi','label' => 'Isi Singkat', 'rules' => 'required|max_length[100]'],
                ['field' => 'ket','label' => 'Keterangan', 'rules' => 'max_length[255]'],
            ];
        }

        return [
            ['field' => 'status_surat','label' => 'Jenis Penerimaan/Pengiriman Surat ', 'rules' => 'required'],
            ['field' => 'tanggal_surat','label' => 'Tanggal Penerimaan/Pengiriman Surat ', 'rules' => 'required'],
        ];
        
    }

    function rulesUpdate() {
        if($this->input->post('status_surat') == "PENERIMAAN"){
            return [
                ['field' => 'tanggal_surat','label' => 'Tanggal Penerimaan Surat', 'rules' => 'required'],
                ['field' => 'sm_no','label' => 'Nomor Surat Masuk', 'rules' => 'required|max_length[100]'],
                ['field' => 'sm_tgl','label' => 'Tanggal Surat Masuk', 'rules' => 'required'],
                ['field' => 'sm_pengirim','label' => 'Pengirim', 'rules' => 'required|max_length[100]'],
                ['field' => 'sm_isi','label' => 'Isi Singkat', 'rules' => 'required|max_length[100]'],
                ['field' => 'ket','label' => 'Keterangan', 'rules' => 'max_length[255]'],
            ];
        }
        else if($this->input->post('status_surat') == "PENGIRIMAN"){
            return [
                ['field' => 'tanggal_surat','label' => 'Tanggal Penerimaan Surat', 'rules' => 'required'],
                ['field' => 'sk_no','label' => 'Nomor Surat Masuk', 'rules' => 'required|max_length[100]'],
                ['field' => 'sk_tgl','label' => 'Tanggal Surat Masuk', 'rules' => 'required'],
                ['field' => 'sk_ditunjukkan','label' => 'Pengirim', 'rules' => 'required|max_length[100]'],
                ['field' => 'sk_isi','label' => 'Isi Singkat', 'rules' => 'required|max_length[100]'],
                ['field' => 'ket','label' => 'Keterangan', 'rules' => 'max_length[255]'],
            ];
        }

        return [
            ['field' => 'tanggal_surat','label' => 'Tanggal Penerimaan/Pengiriman Surat ', 'rules' => 'required'],
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
        $data = array (
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

            if(!empty($_FILES["berkas"]["name"])){
                $berkas = $this->upload_file();
                if(!$berkas){

                    $callback = array(
                        'status' => 'error',
                        'message' => $this->upload->display_errors(),
                    );
                    echo json_encode($callback);
                    exit;
                }
            }
            else{
                $berkas = "";
            }

                $_POST = $this->input->post();
                $data = array(
                    'status_surat' => $_POST['status_surat'],
                    'tanggal_surat' => $_POST['tanggal_surat'],
                    'sm_no' => $_POST['sm_no'],
                    'sm_tgl' => $_POST['sm_tgl'],
                    'sm_pengirim' => $_POST['sm_pengirim'],
                    'sm_isi' => $_POST['sm_isi'],
                    'sk_no' => $_POST['sk_no'],
                    'sk_tgl' => $_POST['sk_tgl'],
                    'sk_ditunjukkan' => $_POST['sk_ditunjukkan'],
                    'sk_isi' => $_POST['sk_isi'],
                    'ket' => $_POST['ket'],
                    'berkas' => $berkas,
                    'ver_kepala_desa' => "Pending",
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' =>  $this->session->userdata('username'),
                );

                if($_POST['status_surat'] == "PENERIMAAN"){   
                    $data['sk_no'] = NULL;
                    $data['sk_tgl'] = NULL;
                    $data['sk_ditunjukkan'] = NULL;
                    $data['sk_isi'] = NULL;
                }
                else if($_POST['status_surat'] == "PENGIRIMAN"){
                    $data['sm_no'] = NULL;
                    $data['sm_tgl'] = NULL;
                    $data['sm_pengirim'] = NULL;
                    $data['sm_isi'] = NULL;
                }
                else{
                    $data['sm_no'] = NULL;
                    $data['sm_tgl'] = NULL;
                    $data['sm_pengirim'] = NULL;
                    $data['sm_isi'] = NULL;
                    $data['sk_no'] = NULL;
                    $data['sk_tgl'] = NULL;
                    $data['sk_ditunjukkan'] = NULL;
                    $data['sk_isi'] = NULL;
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
            
            //jika ada file yang baru
            if(!empty($_FILES["berkas"]["name"])){
                $berkas = $this->upload_file();
                if(!$berkas){
                    $callback = array(
                        'status' => 'error',
                        'message' => $this->upload->display_errors(),
                    );
                    echo json_encode($callback);
                    exit;
                }
                $berkas_lama = $this->destroy_file($where);
            }

            //jika tidak ada file baru
            else {
                $berkas = $_POST["old_file"];
            }

            $data = array(
                'status_surat' => $_POST['status_surat'],
                'tanggal_surat' => $_POST['tanggal_surat'],
                'sm_no' => $_POST['sm_no'],
                'sm_tgl' => $_POST['sm_tgl'],
                'sm_pengirim' => $_POST['sm_pengirim'],
                'sm_isi' => $_POST['sm_isi'],
                'sk_no' => $_POST['sk_no'],
                'sk_tgl' => $_POST['sk_tgl'],
                'sk_ditunjukkan' => $_POST['sk_ditunjukkan'],
                'sk_isi' => $_POST['sk_isi'],
                'ket' => $_POST['ket'],
                'berkas' => $berkas,
                'ver_kepala_desa' => $_POST['ver_kepala_desa'], 
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                
            );

            if($_POST['status_surat'] == "PENERIMAAN"){   
                $data['sk_no'] = NULL;
                $data['sk_tgl'] = NULL;
                $data['sk_ditunjukkan'] = NULL;
                $data['sk_isi'] = NULL;
            }
            else if($_POST['status_surat'] == "PENGIRIMAN"){
                $data['sm_no'] = NULL;
                $data['sm_tgl'] = NULL;
                $data['sm_pengirim'] = NULL;
                $data['sm_isi'] = NULL;
            }
            else{
                $data['sm_no'] = NULL;
                $data['sm_tgl'] = NULL;
                $data['sm_pengirim'] = NULL;
                $data['sm_isi'] = NULL;
                $data['sk_no'] = NULL;
                $data['sk_tgl'] = NULL;
                $data['sk_ditunjukkan'] = NULL;
                $data['sk_isi'] = NULL;
            }

            if($_POST['ver_kepala_desa'] != $_POST['ver_kepala_desa_old']){
                $data['ver_kepala_desa_at'] = date('Y-m-d H:i:s');
            }

            if($this->Main_m->update($data,$this->_table,$where)){
                $this->session->set_flashdata('success_message', 'Pengisian form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diinput',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, pengisian form gagal');
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

            if (!$this->destroy_file($where)) {
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Pengisian file gagal dihapus',
                );
                echo json_encode($callback);
                exit;
            }

            if($this->Main_m->destroy($this->_table,$where)){
                
                $this->session->set_flashdata('success_message', 'Delete form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil dihapus',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, delete form gagal');
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

    public function setuju(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesDestroy());
        if ($validation->run()) {
            $_POST = $this->input->post();
            $where = $_POST['rowdelete'];
            $data = array(              
                'ver_kepala_desa' => "Disetujui",                             
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                'ver_kepala_desa_at' => date('Y-m-d H:i:s'),
            );

            if($this->Main_m->setuju($data,$this->_table,$where)){
                $this->session->set_flashdata('success_message', 'Setujui data berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diupdate',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, Penyetujuan data gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Penyetujuan data gagal',
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

    public function tolak(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesDestroy());
        if($validation->run()){
            $_POST = $this->input->post();
            $where = $_POST['rowdelete'];
            $data = array(              
                'ver_kepala_desa' => "Ditolak",                             
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                'ver_kepala_desa_at' => date('Y-m-d H:i:s'),
            );

            if($this->Main_m->setuju($data,$this->_table,$where)){
                $this->session->set_flashdata('success_message', 'Tolak data berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diupdate',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, Tolak data gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Tolak data gagal',
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

    public function upload_file(){
        $config['upload_path']      = "./uploads/".$this->_folder."/"; //lokasi
        $config['allowed_types']    = 'pdf'; //file dizinka
        $config['file_name']        = $this->_folder.uniqid();
        $config['overwrite']        = true;
        $config['max_size']         = 2000; // 2MB

        $this->load->library('upload',$config);

        if ($this->upload->do_upload('berkas')) {
            return $this->upload->data("file_name");
        }
        else{
            return false;
        }    
    }

    private function destroy_file($id) {
        $berkas_id =  $this->Main_m->get($this->_table,$id)->result();  
        foreach ($berkas_id as $b_id) {
            
            if(empty($b_id->berkas)){
                return true;
            }

            if (!file_exists(FCPATH."uploads/".$this->_folder."/".$b_id->berkas)){
                return true;
            }

            if (!unlink(FCPATH."uploads/".$this->_folder."/".$b_id->berkas)) {
                return false;
            }
            
        }
        return true;
    }

    public function cetak(){
        $reader = IOFactory::createReader('Xls');
        $spreadsheet = $reader->load('./assets/buku_adm_umum/'.$this->_exelName);
        $data = $this->Main_m->get($this->_table,null)->result();
        $values = array();
        $i = 0;
        $no = 1;
        foreach($data as $d){
            $subvalues = array(
                $no++,
                $d->tanggal_surat,
                $d->sm_no,
                $d->sm_tgl,
                $d->sm_pengirim,
                $d->sm_isi,
                $d->sk_no,
                $d->sk_tgl,
                $d->sk_ditunjukkan,
                $d-> sk_isi,
                $d->ket
            );
            $values[] = $subvalues;
            $i++;
        }

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray(
            $values,
            NULL,
            'A8'
        );

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,  
                ],
            ],
        ];

        $i = $i + 7;

        $sheet->getStyle('A8:J'.$i)->applyFromArray($styleArray);
        $sheet->getStyle('A8:J'.$i)->getAlignment()->setWrapText(true);
        $sheet->getStyle('A8:J'.$i)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A8:J'.$i)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        // foreach(range('A7','J') as $columnID) {
        //     $sheet->getColumnDimension($columnID)->setAutoSize(true);
        // }
        for($r = 8;$r <= $i;$r++){
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
?>