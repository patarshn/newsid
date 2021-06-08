<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_peraturan_desa extends Admin_Controller {

    private $_table = 'buku_peraturan_desa';
    private $_folder = 'buku_peraturan_desa';
    private $_mainTitle = 'Buku Peraturan Desa';

    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent');
        $this->load->library('pdf');
        
    }

    function rulesStore() {
        return [
            ['field' => 'jenis_peraturan_desa','label' => 'jenis_peraturan_desa', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_ditetapkan','label' => 'no_dan_tgl_ditetapkan', 'rules' => 'required'],
            ['field' => 'tentang','label' => 'tentang', 'rules' => 'required'],
            ['field' => 'uraian_singkat','label' => 'uraian_singkat', 'rules' => 'required'],
            ['field' => 'tgl_kesepakatan_peraturan_desa','label' => 'tgl_kesepakatan_peraturan_desa', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_dilaporkan','label' => 'no_dan_tgl_dilaporkan', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_diundangkan_dalam_lembaran_desa','label' => 'no_dan_tgl_diundangkan_dalam_lembaran_desa', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_diundangkan_dalam_berita_desa','label' => 'no_dan_tgl_diundangkan_dalam_berita_desa', 'rules' => 'required'],
            ['field' => 'ket','label' => 'ket', 'rules' => 'required'],
        ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'jenis_peraturan_desa','label' => 'jenis_peraturan_desa', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_ditetapkan','label' => 'no_dan_tgl_ditetapkan', 'rules' => 'required'],
            ['field' => 'tentang','label' => 'tentang', 'rules' => 'required'],
            ['field' => 'uraian_singkat','label' => 'uraian_singkat', 'rules' => 'required'],
            ['field' => 'tgl_kesepakatan_peraturan_desa','label' => 'tgl_kesepakatan_peraturan_desa', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_dilaporkan','label' => 'no_dan_tgl_dilaporkan', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_diundangkan_dalam_lembaran_desa','label' => 'no_dan_tgl_diundangkan_dalam_lembaran_desa', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_diundangkan_dalam_berita_desa','label' => 'no_dan_tgl_diundangkan_dalam_berita_desa', 'rules' => 'required'],
            ['field' => 'ket','label' => 'ket', 'rules' => 'required'],
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
                    //echo $this->upload->display_errors();
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
                'jenis_peraturan_desa' => $_POST['jenis_peraturan_desa'],
                'no_dan_tgl_ditetapkan' => $_POST['no_dan_tgl_ditetapkan'],
                'tentang' => $_POST['tentang'],
                'uraian_singkat' => $_POST['uraian_singkat'],
                'tgl_kesepakatan_peraturan_desa' => $_POST['tgl_kesepakatan_peraturan_desa'],
                'no_dan_tgl_dilaporkan' => $_POST['no_dan_tgl_dilaporkan'],
                'no_dan_tgl_diundangkan_dalam_lembaran_desa' => $_POST['no_dan_tgl_diundangkan_dalam_lembaran_desa'],
                'no_dan_tgl_diundangkan_dalam_berita_desa' => $_POST['no_dan_tgl_diundangkan_dalam_berita_desa'],
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
                $berkas_lama = $this->destroy_file($where);
            }

            //jika tidak ada file baru
            else {
                $berkas = $_POST["old_file"];
            }

            $data = array(
                'jenis_peraturan_desa' => $_POST['jenis_peraturan_desa'],
                'no_dan_tgl_ditetapkan' => $_POST['no_dan_tgl_ditetapkan'],
                'tentang' => $_POST['tentang'],
                'uraian_singkat' => $_POST['uraian_singkat'],
                'tgl_kesepakatan_peraturan_desa' => $_POST['tgl_kesepakatan_peraturan_desa'],
                'no_dan_tgl_dilaporkan' => $_POST['no_dan_tgl_dilaporkan'],
                'no_dan_tgl_diundangkan_dalam_lembaran_desa' => $_POST['no_dan_tgl_diundangkan_dalam_lembaran_desa'],
                'no_dan_tgl_diundangkan_dalam_berita_desa' => $_POST['no_dan_tgl_diundangkan_dalam_berita_desa'],
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
            //echo $this->upload->display_errors();
        }    
    }

    private function destroy_file($id) {
        $berkas_id =  $this->Main_m->get($this->_table,$id)->result();
        foreach ($berkas_id as $b_id) {
            
            if(empty($b_id->berkas)){
                return true;
            }

            if (!unlink(FCPATH."uploads/".$this->_folder."/".$b_id->berkas)) {
                return false;
            }
            
        }
        return true;
    }

    public function cetak2($id){
        $where = ['id'=>$id];
        $data = $this->Main_m->get($this->_table,$where)->row();
        $today = date('Y-m-d');
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = $phpWord->loadTemplate('./assets/form/'.$this->_docxName);
        $template->setValue('nama_1', $data->nama_1);
        $template->setValue('tempat_lahir_1', $data->tempat_lahir_1);
        $template->setValue('tanggal_lahir_1', longdate_indo($data->tanggal_lahir_1));
        $template->setValue('nik_1', $data->nik_1);
        $template->setValue('agama_1', $data->agama_1);
        $template->setValue('pekerjaan_1', $data->pekerjaan_1);
        $template->setValue('rt_1', $data->rt_1);
        $template->setValue('rt_1', $data->rt_1);
        $template->setValue('pekon_1', $data->pekon_1);
        $template->setValue('kecamatan_1', $data->kecamatan_1);
        $template->setValue('kabupaten_1', $data->kabupaten_1);
        $template->setValue('nama_2', $data->nama_2);
        $template->setValue('tempat_lahir_2', $data->tempat_lahir_2);
        $template->setValue('tanggal_lahir_2', longdate_indo($data->tanggal_lahir_2));
        $template->setValue('nik_2', $data->nik_2);
        $template->setValue('agama_2', $data->agama_2);
        $template->setValue('pekerjaan_2', $data->pekerjaan_2);
        $template->setValue('rt_2', $data->rt_2);
        $template->setValue('rt_2', $data->rt_2);
        $template->setValue('pekon_2', $data->pekon_2);
        $template->setValue('kecamatan_2', $data->kecamatan_2);
        $template->setValue('kabupaten_2', $data->kabupaten_2);
        $temp_filename = $this->_docxName;
        $template->saveAs($temp_filename);
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

    public function cetak1(){
        $this->load->view('admin/buku_peraturan_desa/laporan_pdf');
    
    }

    public function cetak(){
        $this->load->library('pdf');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'Buku_Administrasi_Umum';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
		$html = $this->load->view('admin/buku_peraturan_desa/laporan_pdf',$this->data, true);	   
        // run dompdf
        $this->pdf->generate($html, $file_pdf,$paper,$orientation);
    }
}
?>