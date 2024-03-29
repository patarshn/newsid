<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apbd extends Admin_Controller {

    private $_table = 'apbd';
    private $_folder = 'apbd';
    private $_mainTitle = 'Buku Anggaran Pendapatan dan Belanja Desa ';
    private $_docxName = 'buku_anggaran_dan_pendapatan_desa.docx';

    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->model('Adm_keuangan_m');
        $this->load->library('breadcrumbcomponent');
        
    }

    function rulesStore() {
        return [
            ['field' => 'tahun_anggaran','label' => 'tahun_anggaran', 'rules' => 'required'],
            ['field' => 'type','label' => 'type', 'rules' => 'required'],
            ['field' => 'kode_rekening1[]','label' => 'kode_rekening1', 'rules' => 'required'],
            ['field' => 'uraian_apbd[]','label' => 'uraian', 'rules' => 'required'],
            ['field' => 'anggaran[]','label' => 'anggaran', 'rules' => 'required|numeric'],
        ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'tahun_anggaran','label' => 'tahun_anggaran', 'rules' => 'required'],
            ['field' => 'type','label' => 'type', 'rules' => 'required'],
            ['field' => 'kode_rekening1','label' => 'kode_rekening1', 'rules' => 'required'],
            ['field' => 'uraian_apbd','label' => 'uraian', 'rules' => 'required'],
            ['field' => 'anggaran','label' => 'anggaran', 'rules' => 'required'],
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
        $data = array();
        
        $totaldata = count($_POST['kode_rekening1']);
        for($i=0;$i<$totaldata;$i++){
            $subdata = array(
                'tahun_anggaran' => $_POST['tahun_anggaran'],
                'type' => $_POST['type'],
                'kode_rekening1' => $_POST['kode_rekening1'][$i],
                'kode_rekening2' => $_POST['kode_rekening2'][$i],
                'kode_rekening3' => $_POST['kode_rekening3'][$i],
                'kode_rekening4' => $_POST['kode_rekening4'][$i],
                'uraian_apbd' => $_POST['uraian_apbd'][$i],
                'anggaran' => $_POST['anggaran'][$i],
                'keterangan' => $_POST['keterangan'][$i],
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' =>  $this->session->userdata('username'),
            );
            $data[] = $subdata;
        }
        
        #echo $totaldata;

        #echo print_r($data);

        if($this->db->insert_batch($this->_table, $data)){
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
    

    // public function storeOld(){
    //     $validation = $this->form_validation;
    //     $validation->set_rules($this->rulesStore());
    //     if($validation->run()){

    //         if(!empty($_FILES["berkas"]["name"])){
    //             $berkas = $this->upload_file();
    //             if(!$berkas){
    //                 echo $this->upload->display_errors();
    //                 $callback = array(
    //                     'status' => 'error',
    //                     'message' => 'Mohon Maaf, file gagal diupload',
    //                 );
    //                 echo json_encode($callback);
    //                 exit;
    //             }
    //         }
    //         else{
    //             $berkas = "";
    //         }

    //             $_POST = $this->input->post();
    //             $data = array(
    //                 'tahun_anggaran' => $_POST['tahun_anggaran'],
    //                 'type' => $_POST['type'],
    //                 'kode_rekening1' => $_POST['kode_rekening1'],
    //                 'kode_rekening2' => $_POST['kode_rekening2'],
    //                 'kode_rekening3' => $_POST['kode_rekening3'],
    //                 'kode_rekening4' => $_POST['kode_rekening4'],
    //                 'uraian' => $_POST['uraian'],
    //                 'anggaran' => $_POST['anggaran'],
    //                 'keterangan' => $_POST['keterangan'],
    //                 'ver_kepala_desa' => "Pending",
    //                 'created_at' => date('Y-m-d H:i:s'),
    //                 'created_by' =>  $this->session->userdata('username'),
                    
    //             );
    //             if($this->Main_m->store($data,$this->_table)){
    //                 $this->session->set_flashdata('success_message', 'Pengisian form berhasil, terimakasih');
    //                 $callback = array(
    //                     'status' => 'success',
    //                     'message' => 'Data berhasil diinput',
    //                     'redirect' => base_url().'admin/'.$this->_folder,
    //                 );
    //             }
    //             else{
    //                 //$this->session->set_flashdata('error_message', 'Mohon maaf, pengisian form gagal');
    //                 $callback = array(
    //                     'status' => 'error',
    //                     'message' => 'Mohon Maaf, Pengisian form gagal',
    //                 );
    //             }
    //         }
        
    //         else{
    //             //$this->session->set_flashdata('error_message', validation_errors());
    //             $callback = array(
    //                 'status' => 'error',
    //                 'message' => validation_errors(),
    //             );
    //         }
    //         echo json_encode($callback);
        
    // }

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
                'type' => $_POST['type'],
                'kode_rekening1' => $_POST['kode_rekening1'],
                'kode_rekening2' => $_POST['kode_rekening2'],
                'kode_rekening3' => $_POST['kode_rekening3'],
                'kode_rekening4' => $_POST['kode_rekening4'],
                'uraian_apbd' => $_POST['uraian_apbd'],
                'anggaran' => $_POST['anggaran'],
                'keterangan' => $_POST['keterangan'], 
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                
            );

            if($this->Main_m->update($data,$this->_table,$where)){
                $this->session->set_flashdata('success_message', 'Edit form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diinput',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, edit form gagal');
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

            if($this->Main_m->destroy($this->_table,$where)){
                
                $this->session->set_flashdata('success_message', 'Hapus form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil dihapus',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, Hapus form gagal');
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

    // public function setuju(){
    //     $validation = $this->form_validation;
    //     $validation->set_rules($this->rulesDestroy());
    //     if ($validation->run()) {
    //         $_POST = $this->input->post();
    //         $where = $_POST['rowdelete'];
    //         $data = array(              
    //             'ver_kepala_desa' => "Disetujui",                             
    //             'updated_by' => $this->session->userdata('username'),
    //             'updated_at' => date('Y-m-d H:i:s'),
    //             'ver_kepala_desa_at' => date('Y-m-d H:i:s'),
    //         );

    //         if($this->Main_m->setuju($data,$this->_table,$where)){
    //             $this->session->set_flashdata('success_message', 'Setujui data berhasil, terimakasih');
    //             $callback = array(
    //                 'status' => 'success',
    //                 'message' => 'Data berhasil diupdate',
    //                 'redirect' => base_url().'admin/'.$this->_folder,
    //             );
    //         }
    //         else{
    //             $this->session->set_flashdata('error_message', 'Mohon maaf, Penyetujuan data gagal');
    //             $callback = array(
    //                 'status' => 'error',
    //                 'message' => 'Mohon Maaf, Penyetujuan data gagal',
    //             );
    //         }
    //     }
    //     else{
    //         $this->session->set_flashdata('error_message', validation_errors());
    //         $callback = array(
    //             'status' => 'error',
    //             'message' => validation_errors(),
    //         );          
    //     }
    //     echo json_encode($callback);
    // }

    // public function tolak(){
    //     $validation = $this->form_validation;
    //     $validation->set_rules($this->rulesDestroy());
    //     if($validation->run()){
    //         $_POST = $this->input->post();
    //         $where = $_POST['rowdelete'];
    //         $data = array(              
    //             'ver_kepala_desa' => "Ditolak",                             
    //             'updated_by' => $this->session->userdata('username'),
    //             'updated_at' => date('Y-m-d H:i:s'),
    //             'ver_kepala_desa_at' => date('Y-m-d H:i:s'),
    //         );

    //         if($this->Main_m->setuju($data,$this->_table,$where)){
    //             $this->session->set_flashdata('success_message', 'Tolak data berhasil, terimakasih');
    //             $callback = array(
    //                 'status' => 'success',
    //                 'message' => 'Data berhasil diupdate',
    //                 'redirect' => base_url().'admin/'.$this->_folder,
    //             );
    //         }
    //         else{
    //             $this->session->set_flashdata('error_message', 'Mohon maaf, Tolak data gagal');
    //             $callback = array(
    //                 'status' => 'error',
    //                 'message' => 'Mohon Maaf, Tolak data gagal',
    //             );
    //         }
    //     }
    //     else{
    //         $this->session->set_flashdata('error_message', validation_errors());
    //         $callback = array(
    //             'status' => 'error',
    //             'message' => validation_errors(),
    //         );          
    //     }
    //     echo json_encode($callback);
    // }

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
    
    function cetak(){
        $tahun_anggaran = $this->input->get('tahun_anggaran');
        $where = ['tahun_anggaran'=>$tahun_anggaran];
        $data=$this->Adm_keuangan_m->getkode_rekening($where)->result();
        #   echo var_dump($data);
        $today = date('Y-m-d');
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templateProcessor = $phpWord->loadTemplate('./assets/buku_adm_keuangan/'.$this->_docxName);
        $values = array();
        $jumlah_anggaran =0;


        foreach($data as $d){

            $jumlah_anggaran = $jumlah_anggaran + $d->anggaran;

            $subvalues = array(
                'kode_rekening1' => $d->kode_rekening1,
                'kode_rekening2' => $d->kode_rekening2,
                'kode_rekening3' => $d->kode_rekening3,
                'kode_rekening4' => $d->kode_rekening4,
                'uraian_apbd' => $d->uraian_apbd,
                'anggaran' => number_format($d->anggaran,0,',','.'),
                'keterangan' => $d->keterangan
            );
            $values[] = $subvalues;
        }

        $templateProcessor->cloneRowAndSetValues('kode_rekening1', $values);
        $templateProcessor->setValue('jumlah_anggaran', number_format($jumlah_anggaran,0,',','.'));
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