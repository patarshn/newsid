<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class Buku_tnh_kas_desa extends Admin_Controller {

    private $_table = 'buku_tnh_kas_desa';
    private $_folder = 'buku_tnh_kas_desa';
    private $_mainTitle = 'Buku Tanah Kas Desa';
    private $_exelName = 'buku_tnh_kas_desa.xls';

    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent');
        
    }

    function rulesStore() {
        return [
            ['field' => 'asal_tnh_kas','label' => 'Asal Tanah Kas Desa', 'rules' => 'required|max_length[100]'],
            ['field' => 'no_serti_letterc_persil','label' => 'Nomor Sertifikat Buku Letter C/Persil', 'rules' => 'required|max_length[100]'],
            ['field' => 'luas','label' => 'Luas', 'rules' => 'required'],
            ['field' => 'kelas','label' => 'Kelas', 'rules' => 'required|max_length[100]'],
            ['field' => 'peroleh_asli_milik_desa','label' => 'Asli Milik Desa', 'rules' => 'required|min_length[1]'],
            ['field' => 'bantuan_pem','label' => 'Bantuan Pemerintah', 'rules' => 'required|min_length[1]'],
            ['field' => 'bantuan_prov','label' => 'Bantuan Provinsi', 'rules' => 'required|min_length[1]'],
            ['field' => 'bantuan_kab_kota','label' => 'Bantuan Kab/Kota', 'rules' => 'required|min_length[1]'],
            ['field' => 'peroleh_lain','label' => 'Lain-Lain', 'rules' => 'required|min_length[1]'],
            ['field' => 'tgl_peroleh','label' => 'Tanggal Perolehan', 'rules' => 'required|min_length[1]'],
            ['field' => 'jenis_sawah','label' => 'Sawah', 'rules' => 'required|min_length[1]'],
            ['field' => 'jenis_tegal','label' => 'Tegal', 'rules' => 'required|min_length[1]'],
            ['field' => 'jenis_kebun','label' => 'Kebun', 'rules' => 'required|min_length[1]'],
            ['field' => 'jenis_tambak','label' => 'Tambak/Kolam ', 'rules' => 'required|min_length[1]'],
            ['field' => 'jenis_darat','label' => 'Tanah Kering/Darat', 'rules' => 'required|min_length[1]'],
            ['field' => 'patok_ada','label' => 'Patok Tanda Batas Ada', 'rules' => 'required|min_length[1]'],
            ['field' => 'patok_tdkada','label' => 'Patok Tanda Batas Tidak Ada', 'rules' => 'required|min_length[1]'],
            ['field' => 'papan_ada','label' => 'Papan Nama Ada', 'rules' => 'required|min_length[1]'],
            ['field' => 'papan_tdkada','label' => 'Papan Nama Tidak Ada ', 'rules' => 'required|min_length[1]'],
            ['field' => 'lokasi','label' => 'Lokasi', 'rules' => 'required|max_length[100]'],
            ['field' => 'peruntukkan','label' => 'Peruntukkan', 'rules' => 'required|max_length[100]'],
            ['field' => 'ket','label' => 'Keterangan', 'rules' => 'max_length[255]'],
        ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'asal_tnh_kas','label' => 'Asal Tanah Kas Desa', 'rules' => 'required|max_length[100]'],
            ['field' => 'no_serti_letterc_persil','label' => 'Nomor Sertifikat Buku Letter C/Persil', 'rules' => 'required|max_length[100]'],
            ['field' => 'luas','label' => 'Luas', 'rules' => 'required'],
            ['field' => 'kelas','label' => 'Kelas', 'rules' => 'required|max_length[100]'],
            ['field' => 'peroleh_asli_milik_desa','label' => 'Asli Milik Desa', 'rules' => 'required|min_length[1]'],
            ['field' => 'bantuan_pem','label' => 'Bantuan Pemerintah', 'rules' => 'required|min_length[1]'],
            ['field' => 'bantuan_prov','label' => 'Bantuan Provinsi', 'rules' => 'required|min_length[1]'],
            ['field' => 'bantuan_kab_kota','label' => 'Bantuan Kab/Kota', 'rules' => 'required|min_length[1]'],
            ['field' => 'peroleh_lain','label' => 'Lain-Lain', 'rules' => 'required|min_length[1]'],
            ['field' => 'tgl_peroleh','label' => 'Tanggal Perolehan', 'rules' => 'required|min_length[1]'],
            ['field' => 'jenis_sawah','label' => 'Sawah', 'rules' => 'required|min_length[1]'],
            ['field' => 'jenis_tegal','label' => 'Tegal', 'rules' => 'required|min_length[1]'],
            ['field' => 'jenis_kebun','label' => 'Kebun', 'rules' => 'required|min_length[1]'],
            ['field' => 'jenis_tambak','label' => 'Tambak/Kolam ', 'rules' => 'required|min_length[1]'],
            ['field' => 'jenis_darat','label' => 'Tanah Kering/Darat', 'rules' => 'required|min_length[1]'],
            ['field' => 'patok_ada','label' => 'Patok Tanda Batas Ada', 'rules' => 'required|min_length[1]'],
            ['field' => 'patok_tdkada','label' => 'Patok Tanda Batas Tidak Ada', 'rules' => 'required|min_length[1]'],
            ['field' => 'papan_ada','label' => 'Papan Nama Ada', 'rules' => 'required|min_length[1]'],
            ['field' => 'papan_tdkada','label' => 'Papan Nama Tidak Ada ', 'rules' => 'required|min_length[1]'],
            ['field' => 'lokasi','label' => 'Lokasi', 'rules' => 'required|max_length[100]'],
            ['field' => 'peruntukkan','label' => 'Peruntukkan', 'rules' => 'required|max_length[100]'],
            ['field' => 'ket','label' => 'Keterangan', 'rules' => 'max_length[255]'],
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
                    'asal_tnh_kas' => $_POST['asal_tnh_kas'],
                    'no_serti_letterc_persil' => $_POST['no_serti_letterc_persil'],
                    'luas' => $_POST['luas'],
                    'kelas' => $_POST['kelas'],
                    'peroleh_asli_milik_desa' => $_POST['peroleh_asli_milik_desa'],
                    'bantuan_pem' => $_POST['bantuan_pem'],
                    'bantuan_prov' => $_POST['bantuan_prov'],
                    'bantuan_kab_kota' => $_POST['bantuan_kab_kota'],
                    'peroleh_lain' => $_POST['peroleh_lain'],
                    'tgl_peroleh' => $_POST['tgl_peroleh'],
                    'jenis_sawah' => $_POST['jenis_sawah'],
                    'jenis_tegal' => $_POST['jenis_tegal'],
                    'jenis_kebun' => $_POST['jenis_kebun'],
                    'jenis_tambak' => $_POST['jenis_tambak'],
                    'jenis_darat' => $_POST['jenis_darat'],
                    'patok_ada' => $_POST['patok_ada'],
                    'patok_tdkada' => $_POST['patok_tdkada'],
                    'papan_ada' => $_POST['papan_ada'],
                    'papan_tdkada' => $_POST['papan_tdkada'],
                    'lokasi' => $_POST['lokasi'],
                    'peruntukkan' => $_POST['peruntukkan'],
                    'mutasi' => $_POST['mutasi'],
                    'ket' => $_POST['ket'],
                    'berkas' => $berkas,
                    'ver_kepala_desa' => "Pending",
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' =>  $this->session->userdata('username'),
                    
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
                'asal_tnh_kas' => $_POST['asal_tnh_kas'],
                'no_serti_letterc_persil' => $_POST['no_serti_letterc_persil'],
                'luas' => $_POST['luas'],
                'kelas' => $_POST['kelas'],
                'peroleh_asli_milik_desa' => $_POST['peroleh_asli_milik_desa'],
                'bantuan_pem' => $_POST['bantuan_pem'],
                'bantuan_prov' => $_POST['bantuan_prov'],
                'bantuan_kab_kota' => $_POST['bantuan_kab_kota'],
                'peroleh_lain' => $_POST['peroleh_lain'],
                'tgl_peroleh' => $_POST['tgl_peroleh'],
                'jenis_sawah' => $_POST['jenis_sawah'],
                'jenis_tegal' => $_POST['jenis_tegal'],
                'jenis_kebun' => $_POST['jenis_kebun'],
                'jenis_tambak' => $_POST['jenis_tambak'],
                'jenis_darat' => $_POST['jenis_darat'],
                'patok_ada' => $_POST['patok_ada'],
                'patok_tdkada' => $_POST['patok_tdkada'],
                'papan_ada' => $_POST['papan_ada'],
                'papan_tdkada' => $_POST['papan_tdkada'],
                'lokasi' => $_POST['lokasi'],
                'peruntukkan' => $_POST['peruntukkan'],
                'mutasi' => $_POST['mutasi'],
                'ket' => $_POST['ket'],
                'berkas' => $berkas,
                'ver_kepala_desa' => $_POST['ver_kepala_desa'], 
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                
            );

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
                $d->asal_tnh_kas,
                $d->no_serti_letterc_persil,
                $d->luas,
                $d->kelas,
                $d->peroleh_asli_milik_desa,
                $d->bantuan_pem,
                $d->bantuan_prov,
                $d->bantuan_kab_kota,
                $d->peroleh_lain,
                $d->tgl_peroleh,
                $d->jenis_sawah,
                $d->jenis_tegal,
                $d->jenis_kebun,
                $d->jenis_tambak,
                $d->jenis_darat,
                $d->patok_ada,
                $d->patok_tdkada,
                $d->papan_ada,
                $d-> papan_tdkada,
                $d->lokasi,
                $d->peruntukkan,
                $d->mutasi,
                $d->ket
            );
            $values[] = $subvalues;
            $i++;
        }

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray(
            $values,
            NULL,
            'A9'
        );

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,  
                ],
            ],
        ];

        $i = $i + 8;

        $sheet->getStyle('A9:X'.$i)->applyFromArray($styleArray);
        $sheet->getStyle('A9:X'.$i)->getAlignment()->setWrapText(true);
        $sheet->getStyle('A9:X'.$i)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A9:X'.$i)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        // foreach(range('A7','J') as $columnID) {
        //     $sheet->getColumnDimension($columnID)->setAutoSize(true);
        // }
        for($r = 9;$r <= $i;$r++){
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