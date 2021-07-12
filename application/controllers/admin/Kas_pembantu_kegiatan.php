<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_pembantu_kegiatan extends Admin_Controller {

    private $_table = 'kas_pembantu_kegiatan';
    private $_folder = 'kas_pembantu_kegiatan';
    private $_mainTitle = 'Buku Kas Pembantu Kegiatan ';
    private $_docxName = 'buku_kas_pembantu_kegiatan.docx';


    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent');
        
    }

    function rulesStore() {
        return [
            ['field' => 'tahun_anggaran','label' => 'Tahun Anggaran', 'rules' => 'required'],
            ['field' => 'bidang','label' => 'Bidang', 'rules' => 'required'],
            ['field' => 'kode_rekening','label' => 'Kegiatan', 'rules' => 'required'],
            ['field' => 'tanggal','label' => 'Tanggal', 'rules' => 'required'],
            ['field' => 'uraian','label' => 'Uraian', 'rules' => 'required'],
            ['field' => 'no_bukti','label' => 'No Bukti', 'rules' => 'required'],
        ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'tahun_anggaran','label' => 'tahun_anggaran', 'rules' => 'required'],
            ['field' => 'bidang','label' => 'bidang', 'rules' => 'required'],
            ['field' => 'kegiatan','label' => 'kegiatan', 'rules' => 'required'],
            ['field' => 'tanggal','label' => 'tanggal', 'rules' => 'required'],
            ['field' => 'uraian','label' => 'uraian', 'rules' => 'required'],
            ['field' => 'no_bukti','label' => 'no_bukti', 'rules' => 'required'],
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
            'data' => $this->Main_m->get("apbd",null)->result(),
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
                'tahun_anggaran' => $_POST['tahun_anggaran'],
                'bidang' => $_POST['bidang'],
                'kegiatan' => $_POST['kode_rekening'],
                'tanggal' => $_POST['tanggal'],
                'uraian' => $_POST['uraian'],
                'penerimaan_bendahara' => $_POST['penerimaan_bendahara'],
                'penerimaan_sdm' => $_POST['penerimaan_sdm'],
                'no_bukti' => $_POST['no_bukti'],
                'pengeluaran_bbj' => $_POST['pengeluaran_bbj'],                    
                'pengeluaran_bm' => $_POST['pengeluaran_bm'],
                'jumlah' => $_POST['jumlah'],
                'saldo' => $_POST['saldo'],
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
            $this->session->set_flashdata('error_message', validation_errors());
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
                'id' => $_POST['id'],
                'tahun_anggaran' => $_POST['tahun_anggaran'],
                'bidang' => $_POST['bidang'],
                'kegiatan' => $_POST['kegiatan'],
                'tanggal' => $_POST['tanggal'],
                'uraian' => $_POST['uraian'],
                'penerimaan_bendahara' => $_POST['penerimaan_bendahara'],
                'penerimaan_sdm' => $_POST['penerimaan_sdm'],
                'no_bukti' => $_POST['no_bukti'],
                'pengeluaran_bbj' => $_POST['pengeluaran_bbj'],
                'pengeluaran_bm' => $_POST['pengeluaran_bm'],
                'jumlah' => $_POST['jumlah'],
                'saldo' => $_POST['saldo'],
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                
            );

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
                
                $this->session->set_flashdata('success_message', 'Hapus form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil dihapus',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, hapus form gagal');
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
            echo $this->upload->display_errors();
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

    function cetak(){
        $tahun_anggaran = $this->input->get('tahun_anggaran');
        $where = ['tahun_anggaran'=>$tahun_anggaran];
        $data=$this->Main_m->getAsc($this->_table,$where)->result();
        #   echo var_dump($data);
        $today = date('Y-m-d');
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templateProcessor = $phpWord->loadTemplate('./assets/buku_adm_keuangan/'.$this->_docxName);
        $values = array();
        $no=1;

        foreach($data as $d){
            $subvalues = array(
                'id' => $no++,
                'tanggal' => date("d-m-Y", strtotime($d->tanggal)),
                'uraian' => $d->uraian,
                'penerimaan_bendahara' => number_format($d->penerimaan_bendahara,0,',','.'),
                'penerimaan_sdm' => number_format($d->penerimaan_sdm,0,',','.'),
                'no_bukti' => $d->no_bukti,
                'pengeluaran_bbj' => number_format($d->pengeluaran_bbj,0,',','.'),
                'pengeluaran_bm' => number_format($d->pengeluaran_bm,0,',','.'),
                'jumlah' => number_format($d->jumlah,0,',','.'),
                'saldo' => number_format($d->saldo,0,',','.')
            );
            $values[] = $subvalues;
        }

        $templateProcessor->cloneRowAndSetValues('id', $values);
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