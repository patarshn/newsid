<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_kegiatan_pembangunan extends Admin_Controller {
     
    private $_table = 'kegiatan_pembangunan';
    private $_folder = 'buku_kegiatan_pembangunan';
    private $_mainTitle = 'Data Kegiatan Pembangunan';
    private $_docxName = 'buku_kegiatan_pembangunan.docx';

    function __construct() 
	{
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->model('Pembangunan_m');
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
            ['field' => 'tahun','label' => 'Tahun Rencana Pembangunan', 'rules' => 'required|min_length[4]|max_length[4]'],
            ['field' => 'id_rencana','label' => 'Nama Proyek/Kegiatan',  'rules' => 'required'],
            ['field' => 'volume','label' => 'Volume', 'rules' => 'required|max_length[30]'],
            ['field' => 'waktu','label' => 'Waktu Kegiatan', 'rules' => 'required|max_length[50]'],
            ['field' => 'sifat_kegiatan','label' => 'Sifat Kegiatan', 'rules' => 'required'],
            ['field' => 'pelaksana','label' => 'Pelaksana Kegiatan', 'rules' => 'required|min_length[5]|max_length[30]'],
            ['field' => 'biaya_pemerintah','label' => 'Biaya Pemerintah', 'rules' => 'required'],
            ['field' => 'biaya_prov','label' => 'Biaya Provinsi', 'rules' => 'required'],
            ['field' => 'biaya_kab','label' => 'Biaya Kabupaten', 'rules' => 'required'],
            ['field' => 'biaya_swadaya','label' => 'Biaya Swadaya', 'rules' => 'required'],
            ['field' => 'jumlah_biaya','label' => 'Jumlah Biaya'],
            ['field' => 'ket','label' => 'Keterangan'],
           ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'id','label' => 'id', 'rules' => 'required'],
            ['field' => 'tahun','label' => 'Tahun Rencana Pembangunan', 'rules' => 'required|min_length[4]|max_length[4]'],
            ['field' => 'id_rencana','label' => 'Nama Proyek/Kegiatan', 'rules' => 'required'],
            ['field' => 'volume','label' => 'Volume', 'rules' => 'required|max_length[30]'],
            ['field' => 'waktu','label' => 'Waktu Kegiatan', 'rules' => 'required|max_length[50]'],
            ['field' => 'sifat_kegiatan','label' => 'Sifat Kegiatan', 'rules' => 'required'],
            ['field' => 'pelaksana','label' => 'Pelaksana Kegiatan', 'rules' => 'required|min_length[5]|max_length[30]'],
            ['field' => 'biaya_pemerintah','label' => 'Biaya Pemerintah', 'rules' => 'required'],
            ['field' => 'biaya_prov','label' => 'Biaya Provinsi', 'rules' => 'required'],
            ['field' => 'biaya_kab','label' => 'Biaya Kabupaten', 'rules' => 'required'],
            ['field' => 'biaya_swadaya','label' => 'Biaya Swadaya', 'rules' => 'required'],
            ['field' => 'jumlah_biaya','label' => 'Jumlah Biaya', 'rules' => 'required'],
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
                'data' => $this->Pembangunan_m->getJoin()->result(),
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
            'data_option' => $this->Main_m->get('rencana_pembangunan',null)->result(),
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
        $id_rencana = $_POST['id_rencana'];
        $rencana_pembangunan = $this->Main_m->get('rencana_pembangunan',['id' => $id_rencana])->row();
        #echo var_dump($rencana_pembangunan);
            $_POST = $this->input->post();
            $data = array(
                'id_rencana' => $_POST['id_rencana'],
                'nama_kegiatan' => $rencana_pembangunan->nama_proyek,
                'tahun' => $_POST['tahun'],
                'volume' => $_POST['volume'],
                'biaya_pemerintah' => $_POST['biaya_pemerintah'],
                'biaya_prov' => $_POST['biaya_prov'],
                'biaya_kab' => $_POST['biaya_kab'],
                'biaya_swadaya' => $_POST['biaya_swadaya'],
                'jumlah_biaya' => $_POST['jumlah_biaya'],
                'waktu' => $_POST['waktu'],
                'sifat_kegiatan' => $_POST['sifat_kegiatan'],
                'pelaksana' => $_POST['pelaksana'],
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
            'data_option' => $this->Main_m->get('rencana_pembangunan',null)->result(),
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
                'id_rencana' => $_POST['id_rencana'],
                'tahun' => $_POST['tahun'],
                'volume' => $_POST['volume'],
                'biaya_pemerintah' => $_POST['biaya_pemerintah'],
                'biaya_prov' => $_POST['biaya_prov'],
                'biaya_kab' => $_POST['biaya_kab'],
                'biaya_swadaya' => $_POST['biaya_swadaya'],
                'jumlah_biaya' => $_POST['jumlah_biaya'],
                'waktu' => $_POST['waktu'],
                'sifat_kegiatan' => $_POST['sifat_kegiatan'],
                'pelaksana' => $_POST['pelaksana'],
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
                'nama_kegiatan' => $d->nama_kegiatan,
                'volume' => $d->volume,
                'biaya_pemerintah' => number_format($d->biaya_pemerintah,0,',','.'),
                'biaya_prov' => number_format($d->biaya_prov,0,',','.'),
                'biaya_kab' => number_format($d->biaya_kab,0,',','.'),
                'biaya_swadaya' => number_format($d->biaya_swadaya,0,',','.'),
                'jumlah_biaya' => number_format($d->jumlah_biaya,0,',','.'),
                'waktu' => $d->waktu,
                'pelaksana' => $d->pelaksana,
                'ket' => $d->ket
            );
            if($d->sifat_kegiatan == 'Baru'){
                $subvalues['baru'] = $d->sifat_kegiatan;
                $subvalues['lanjutan'] = '';
            }
            else{
                $subvalues['lanjutan'] = $d->sifat_kegiatan;
                $subvalues['baru'] = '';
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

}
?>