<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_desa extends Admin_Controller {

    private $_table = 'bank_desa';
    private $_folder = 'bank_desa';
    private $_mainTitle = 'Buku Bank Desa ';
    private $_docxName = 'buku_bank_desa.docx';


    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent');
        
    }

    function rulesStore() {
        return [
            ['field' => 'tgl_trans','label' => 'Tanggal Transaksi', 'rules' => 'required'],
            ['field' => 'uraian_trans','label' => 'Uraian Transaksi', 'rules' => 'required'],
            ['field' => 'bukti_trans','label' => 'Bukti Transaksi', 'rules' => 'required'],
            ['field' => 'pmskn_setoran','label' => 'Pemasukan Setoran', 'rules' => 'required'],
            ['field' => 'pmskn_bungabank','label' => 'Pemasukan Bunga Bank', 'rules' => 'required'],
            ['field' => 'pngl_penarikan','label' => 'Pengeluaran Penarikan', 'rules' => 'required'],
            ['field' => 'pngl_pajak','label' => 'Pengeluaran Pajak', 'rules' => 'required'],
            ['field' => 'pngl_biaya_adm','label' => 'Pengeluaran Biaya Admin', 'rules' => 'required'],
            ['field' => 'tahun_anggaran','label' => 'Tahun Anggaran', 'rules' => 'required'],
            ['field' => 'bulan','label' => 'Bulan', 'rules' => 'required'],
            ['field' => 'bank_cabang','label' => 'Bank Cabang', 'rules' => 'required'],
            ['field' => 'rekening','label' => 'Rekening', 'rules' => 'required'],
        ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'tgl_trans','label' => 'Tanggal Transaksi', 'rules' => 'required'],
            ['field' => 'uraian_trans','label' => 'Uraian Transaksi', 'rules' => 'required'],
            ['field' => 'bukti_trans','label' => 'Bukti Transaksi', 'rules' => 'required'],
            ['field' => 'pmskn_setoran','label' => 'Pemasukan Setoran', 'rules' => 'required'],
            ['field' => 'pmskn_bungabank','label' => 'Pemasukan Bunga Bank', 'rules' => 'required'],
            ['field' => 'pngl_penarikan','label' => 'Pengeluaran Penarikan', 'rules' => 'required'],
            ['field' => 'pngl_pajak','label' => 'Pengeluaran Pajak', 'rules' => 'required'],
            ['field' => 'pngl_biaya_adm','label' => 'Pengeluaran Biaya Admin', 'rules' => 'required'],
            ['field' => 'tahun_anggaran','label' => 'Tahun Anggaran', 'rules' => 'required'],
            ['field' => 'bulan','label' => 'Bulan', 'rules' => 'required'],
            ['field' => 'bank_cabang','label' => 'Bank Cabang', 'rules' => 'required'],
            ['field' => 'rekening','label' => 'Rekening', 'rules' => 'required'],
            
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

                $_POST = $this->input->post();
                $data = array(
                    'tgl_trans' => $_POST['tgl_trans'],
                    'uraian_trans' => $_POST['uraian_trans'],
                    'bukti_trans' => $_POST['bukti_trans'],
                    'pmskn_setoran' => $_POST['pmskn_setoran'],
                    'pmskn_bungabank' => $_POST['pmskn_bungabank'],
                    'pngl_penarikan' => $_POST['pngl_penarikan'],
                    'pngl_pajak' => $_POST['pngl_pajak'],
                    'pngl_biaya_adm' => $_POST['pngl_biaya_adm'],
                    'tahun_anggaran' => $_POST['tahun_anggaran'],
                    'bulan' => $_POST['bulan'],
                    'bank_cabang' => $_POST['bank_cabang'],
                    'rekening' => $_POST['rekening'],
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

            $data = array(
                'id' => $_POST['id'],
                'tgl_trans' => $_POST['tgl_trans'],
                'uraian_trans' => $_POST['uraian_trans'],
                'bukti_trans' => $_POST['bukti_trans'],
                'pmskn_setoran' => $_POST['pmskn_setoran'],
                'pmskn_bungabank' => $_POST['pmskn_bungabank'],                    
                'pngl_penarikan' => $_POST['pngl_penarikan'],
                'pngl_pajak' => $_POST['pngl_pajak'],
                'pngl_biaya_adm' => $_POST['pngl_biaya_adm'],
                'tahun_anggaran' => $_POST['tahun_anggaran'],                    
                'bulan' => $_POST['bulan'],
                'bank_cabang' => $_POST['bank_cabang'],
                'rekening' => $_POST['rekening'], 
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
        $jumlah_pemasukan =0;
        $jumlah_pengeluaran =0;
        $jumlah_komulatif =0;
        $saldo =0;
        $no=1;

        foreach($data as $d){
            if($d->pmskn_setoran !=0){
                $saldo = $saldo + $d ->pmskn_setoran;
            }
            if($d->pmskn_bungabank !=0){
                $saldo = $saldo + $d ->pmskn_bungabank;
            }
            if($d->pngl_penarikan !=0){
                $saldo = $saldo - $d ->pngl_penarikan;
            }
            if($d->pngl_pajak !=0){
                $saldo = $saldo - $d ->pngl_pajak;
            }
            if($d->pngl_biaya_adm !=0){
                $saldo = $saldo - $d ->pngl_biaya_adm;
            }

            $jumlah_pemasukan = $jumlah_pemasukan + $d->pmskn_setoran + $d->pmskn_bungabank;
            $jumlah_pengeluaran = $jumlah_pengeluaran + $d->pngl_penarikan + $d->pngl_pajak + $d->pngl_biaya_adm ;
            $jumlah_komulatif = $jumlah_komulatif + $jumlah_pengeluaran;
            $subvalues = array(
                'id' => $no++,
                'tgl_trans' => date("d-m-Y", strtotime($d->tgl_trans)),
                'uraian_trans' => $d->uraian_trans,
                'bukti_trans' => $d->bukti_trans,
                'pmskn_setoran' => number_format($d->pmskn_setoran,0,',','.'),
                'pmskn_bungabank' => number_format($d->pmskn_bungabank,0,',','.'),
                'pngl_penarikan' => number_format($d->pngl_penarikan,0,',','.'),
                'pngl_pajak' => number_format($d->pngl_pajak,0,',','.'),
                'pngl_biaya_adm' => number_format($d->pngl_biaya_adm,0,',','.'),
                'saldo' => number_format($saldo,0,',','.')
            );
            $values[] = $subvalues;
        }

        $templateProcessor->cloneRowAndSetValues('id', $values);
        $templateProcessor->setValue('jumlah_pemasukan', number_format($jumlah_pemasukan,0,',','.'));
        $templateProcessor->setValue('jumlah_pengeluaran', number_format($jumlah_pengeluaran,0,',','.'));
        $templateProcessor->setValue('jumlah_komulatif', number_format($jumlah_komulatif,0,',','.'));
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