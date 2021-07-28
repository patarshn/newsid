<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;


class Buku_inventaris_kekayaan_desa extends Admin_Controller {

    private $_table = 'buku_inventaris_kekayaan_desa';
    private $_folder = 'buku_inventaris_kekayaan_desa';
    private $_mainTitle = 'Buku Inventaris Dan Kekayaan Desa';
    private $_exelName = 'buku_inventaris_kekayaan_desa.xls';

    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent');
        
    }

    function rulesStore() {
        return [
            ['field' => 'jenis_brng_bangunan','label' => 'Jenis Barang atau Bangunan', 'rules' => 'required|max_length[100]'],
            ['field' => 'abb_dibeli_sendiri','label' => 'Dibeli Sendiri', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'bantuan_pemeritah','label' => 'Bantuan Pemerintah', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'bantuan_prov','label' => 'Bantuan Provinsi', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'bantuan_kab_kota','label' => 'Bantuan Kab/Kota', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'abb_sumbangan','label' => 'Sumbangan', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'baik_awalthn','label' => 'Baik Keadaan Barang atau Bangunan Awal Tahun', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'rusak_awalthn','label' => 'Rusak Keadaan Barang atau Bangunan Awal Tahun', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'rusak_hps','label' => 'Rusak', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'dijual_hps','label' => 'Dijual', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'disumbangkan_hps','label' => 'Disumbangkan', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'tgl_hapus','label' => 'Tanggal Penghapusan', 'rules' => 'required'],
            ['field' => 'baik_akhirthn','label' => 'Baik Keadaan Barang atau Bangunan Akhir Tahun', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'rusak_akhirthn','label' => 'Rusak Keadaan Barang atau Bangunan Akhir Tahun', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'ket','label' => 'Keterangan', 'rules' => 'max_length[255]'],
        ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'jenis_brng_bangunan','label' => 'Jenis Barang atau Bangunan', 'rules' => 'required|max_length[100]'],
            ['field' => 'abb_dibeli_sendiri','label' => 'Dibeli Sendiri', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'bantuan_pemeritah','label' => 'Bantuan Pemerintah', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'bantuan_prov','label' => 'Bantuan Provinsi', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'bantuan_kab_kota','label' => 'Bantuan Kab/Kota', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'abb_sumbangan','label' => 'Sumbangan', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'baik_awalthn','label' => 'Baik Keadaan Barang atau Bangunan Awal Tahun', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'rusak_awalthn','label' => 'Rusak Keadaan Barang atau Bangunan Awal Tahun', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'rusak_hps','label' => 'Rusak', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'dijual_hps','label' => 'Dijual', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'disumbangkan_hps','label' => 'Disumbangkan', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'tgl_hapus','label' => 'Tanggal Penghapusan', 'rules' => 'required'],
            ['field' => 'baik_akhirthn','label' => 'Baik Keadaan Barang atau Bangunan Akhir Tahun', 'rules' => 'required|numeric|min_length[1]'],
            ['field' => 'rusak_akhirthn','label' => 'Rusak Keadaan Barang atau Bangunan Akhir Tahun', 'rules' => 'required|numeric|min_length[1]'],
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
                    'jenis_brng_bangunan' => $_POST['jenis_brng_bangunan'],
                    'abb_dibeli_sendiri' => $_POST['abb_dibeli_sendiri'],
                    'bantuan_pemeritah' => $_POST['bantuan_pemeritah'],
                    'bantuan_prov' => $_POST['bantuan_prov'],
                    'bantuan_kab_kota' => $_POST['bantuan_kab_kota'],
                    'abb_sumbangan' => $_POST['abb_sumbangan'],
                    'baik_awalthn' => $_POST['baik_awalthn'],
                    'rusak_awalthn' => $_POST['rusak_awalthn'],
                    'rusak_hps' => $_POST['rusak_hps'],
                    'dijual_hps' => $_POST['dijual_hps'],
                    'disumbangkan_hps' => $_POST['disumbangkan_hps'],
                    'tgl_hapus' => $_POST['tgl_hapus'],
                    'baik_akhirthn' => $_POST['baik_akhirthn'],
                    'rusak_akhirthn' => $_POST['rusak_akhirthn'],
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
                    //echo $this->upload->display_errors();
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
                'jenis_brng_bangunan' => $_POST['jenis_brng_bangunan'],
                'abb_dibeli_sendiri' => $_POST['abb_dibeli_sendiri'],
                'bantuan_pemeritah' => $_POST['bantuan_pemeritah'],
                'bantuan_prov' => $_POST['bantuan_prov'],
                'bantuan_kab_kota' => $_POST['bantuan_kab_kota'],
                'abb_sumbangan' => $_POST['abb_sumbangan'],
                'baik_awalthn' => $_POST['baik_awalthn'],
                'rusak_awalthn' => $_POST['rusak_awalthn'],
                'rusak_hps' => $_POST['rusak_hps'],
                'dijual_hps' => $_POST['dijual_hps'],
                'disumbangkan_hps' => $_POST['disumbangkan_hps'],
                'tgl_hapus' => $_POST['tgl_hapus'],
                'baik_akhirthn' => $_POST['baik_akhirthn'],
                'rusak_akhirthn' => $_POST['rusak_akhirthn'],
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
                $d->jenis_brng_bangunan,
                $d->abb_dibeli_sendiri,
                $d->bantuan_pemeritah,
                $d->bantuan_prov,
                $d->bantuan_kab_kota,
                $d->abb_sumbangan,
                $d->baik_awalthn,
                $d->rusak_awalthn,
                $d->rusak_hps,
                $d->dijual_hps,
                $d->disumbangkan_hps,
                $d->tgl_hapus,
                $d-> baik_akhirthn,
                $d->rusak_akhirthn,
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

        $sheet->getStyle('A9:P'.$i)->applyFromArray($styleArray);
        $sheet->getStyle('A9:P'.$i)->getAlignment()->setWrapText(true);
        $sheet->getStyle('A9:P'.$i)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A9:P'.$i)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
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