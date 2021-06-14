<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class Buku_rekap_penduduk extends Admin_Controller {

    private $_table = 'rekap_penduduk';
    private $_folder = 'buku_rekap_penduduk';
    private $_mainTitle = 'Data Rekapitulasi Jumlah Penduduk';
    private $_exelName = 'buku_rekap_penduduk.xls';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent'); 
    }   
    
    function rulesStore() {
        return [
            ['field' => 'dusun','label' => 'Nama Dusun/Lingkungan', 'rules' => 'required'],
            ['field' => 'bulan_tahun','label' => 'Periode Bulan/Tahun', 'rules' => 'required'],
            ['field' => 'awal_wna_l','label' => 'Jumlah Penduduk Awal Bulan (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'awal_wna_p','label' => 'Jumlah Penduduk Awal Bulan (WNA Perempuan)', 'rules' => 'required'],
            ['field' => 'awal_wni_l','label' => 'Jumlah Penduduk Awal Bulan (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'awal_wni_p','label' => 'Jumlah Penduduk Awal Bulan (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'awal_jml_kk','label' => 'Jumlah KK Awal Bulan', 'rules' => 'required'],
            ['field' => 'awal_jml_anggota_keluarga','label' => 'Jumlah Anggota Keluarga Awal Bulan', 'rules' => 'required'],
            ['field' => 'awal_jml_jiwa','label' => 'Jumlah Jiwa Awal Bulan', 'rules' => 'required'],
            ['field' => 'tambah_lahir_wna_l','label' => 'Jumlah Kelahiran Penduduk (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'tambah_lahir_wna_p','label' => 'Jumlah Kelahiran Penduduk (WNA Perempuan)', 'rules' => 'required'],
            ['field' => 'tambah_lahir_wni_l','label' => 'Jumlah Kelahiran Penduduk (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'tambah_lahir_wni_p','label' => 'Jumlah Kelahiran Penduduk (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'tambah_datang_wna_l','label' => 'Jumlah Kedatangan Penduduk (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'tambah_datang_wna_p','label' => 'Jumlah Kedatangan Penduduk (WNA Perempuan)', 'rules' => 'required'],
            ['field' => 'tambah_datang_wni_l','label' => 'Jumlah Kedatangan Penduduk (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'tambah_datang_wni_p','label' => 'Jumlah Kedatangan Penduduk (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'kurang_meninggal_wna_l','label' => 'Jumlah Penduduk Meninggal (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'kurang_meninggal_wna_p','label' => 'Jumlah Penduduk Meninggal (WNA Perempuan)', 'rules' => 'required'],
            ['field' => 'kurang_meninggal_wni_l','label' => 'Jumlah Penduduk Meninggal (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'kurang_meninggal_wni_p','label' => 'Jumlah Penduduk Meninggal (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'kurang_pindah_wna_l','label' => 'Jumlah Penduduk Pindah (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'kurang_pindah_wna_p','label' => 'Jumlah Penduduk Pindah (WNA Perempuani)', 'rules' => 'required'],
            ['field' => 'kurang_pindah_wni_l','label' => 'Jumlah Penduduk Pindah (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'kurang_pindah_wni_p','label' => 'Jumlah Penduduk Pindah (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'akhir_wna_l','label' => 'Jumlah Penduduk Akhir Bulan (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'akhir_wna_p','label' => 'Jumlah Penduduk Akhir Bulan (WNA Perempuan)', 'rules' => 'required'],
            ['field' => 'akhir_wni_l','label' => 'Jumlah Penduduk Akhir Bulan (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'akhir_wni_p','label' => 'Jumlah Penduduk Akhir Bulan (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'akhir_jml_kk','label' => 'Jumlah KK Akhir Bulan', 'rules' => 'required'],
            ['field' => 'akhir_jml_anggota_keluarga','label' => 'Jumlah Anggota Keluarga Akhir Bulan', 'rules' => 'required'],
            ['field' => 'akhir_jml_jiwa','label' => 'Jumlah Jiwa Akhir Bulan', 'rules' => 'required'],
            ['field' => 'ket','label' => 'Keterangan'],
           ];
    }  
    
    function rulesUpdate(){
        return [
            ['field' => 'id','label' => 'id', 'rules' => 'required'],
            ['field' => 'dusun','label' => 'Nama Dusun/Lingkungan', 'rules' => 'required'],
            ['field' => 'bulan_tahun','label' => 'Periode Bulan/Tahun', 'rules' => 'required'],
            ['field' => 'awal_wna_l','label' => 'Jumlah Penduduk Awal Bulan (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'awal_wna_p','label' => 'Jumlah Penduduk Awal Bulan (WNA Perempuan)', 'rules' => 'required'],
            ['field' => 'awal_wni_l','label' => 'Jumlah Penduduk Awal Bulan (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'awal_wni_p','label' => 'Jumlah Penduduk Awal Bulan (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'awal_jml_kk','label' => 'Jumlah KK Awal Bulan', 'rules' => 'required'],
            ['field' => 'awal_jml_anggota_keluarga','label' => 'Jumlah Anggota Keluarga Awal Bulan', 'rules' => 'required'],
            ['field' => 'awal_jml_jiwa','label' => 'Jumlah Jiwa Awal Bulan', 'rules' => 'required'],
            ['field' => 'tambah_lahir_wna_l','label' => 'Jumlah Kelahiran Penduduk (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'tambah_lahir_wna_p','label' => 'Jumlah Kelahiran Penduduk (WNA Perempuan)', 'rules' => 'required'],
            ['field' => 'tambah_lahir_wni_l','label' => 'Jumlah Kelahiran Penduduk (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'tambah_lahir_wni_p','label' => 'Jumlah Kelahiran Penduduk (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'tambah_datang_wna_l','label' => 'Jumlah Kedatangan Penduduk (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'tambah_datang_wna_p','label' => 'Jumlah Kedatangan Penduduk (WNA Perempuan)', 'rules' => 'required'],
            ['field' => 'tambah_datang_wni_l','label' => 'Jumlah Kedatangan Penduduk (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'tambah_datang_wni_p','label' => 'Jumlah Kedatangan Penduduk (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'kurang_meninggal_wna_l','label' => 'Jumlah Penduduk Meninggal (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'kurang_meninggal_wna_p','label' => 'Jumlah Penduduk Meninggal (WNA Perempuan)', 'rules' => 'required'],
            ['field' => 'kurang_meninggal_wni_l','label' => 'Jumlah Penduduk Meninggal (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'kurang_meninggal_wni_p','label' => 'Jumlah Penduduk Meninggal (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'kurang_pindah_wna_l','label' => 'Jumlah Penduduk Pindah (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'kurang_pindah_wna_p','label' => 'Jumlah Penduduk Pindah (WNA Perempuani)', 'rules' => 'required'],
            ['field' => 'kurang_pindah_wni_l','label' => 'Jumlah Penduduk Pindah (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'kurang_pindah_wni_p','label' => 'Jumlah Penduduk Pindah (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'akhir_wna_l','label' => 'Jumlah Penduduk Akhir Bulan (WNA Laki-Laki)', 'rules' => 'required'],
            ['field' => 'akhir_wna_p','label' => 'Jumlah Penduduk Akhir Bulan (WNA Perempuan)', 'rules' => 'required'],
            ['field' => 'akhir_wni_l','label' => 'Jumlah Penduduk Akhir Bulan (WNI Laki-Laki)', 'rules' => 'required'],
            ['field' => 'akhir_wni_p','label' => 'Jumlah Penduduk Akhir Bulan (WNI Perempuan)', 'rules' => 'required'],
            ['field' => 'akhir_jml_kk','label' => 'Jumlah KK Akhir Bulan', 'rules' => 'required'],
            ['field' => 'akhir_jml_anggota_keluarga','label' => 'Jumlah Anggota Keluarga Akhir Bulan', 'rules' => 'required'],
            ['field' => 'akhir_jml_jiwa','label' => 'Jumlah Jiwa Akhir Bulan', 'rules' => 'required'],
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
                'dusun' => $_POST['dusun'],
                'bulan_tahun' => $_POST['bulan_tahun'],
                'awal_wna_l' => $_POST['awal_wna_l'],
                'awal_wna_p' => $_POST['awal_wna_p'],
                'awal_wni_l' => $_POST['awal_wni_l'],
                'awal_wni_p' => $_POST['awal_wni_p'],
                'awal_jml_kk' => $_POST['awal_jml_kk'],
                'awal_jml_anggota_keluarga' => $_POST['awal_jml_anggota_keluarga'],
                'awal_jml_jiwa' => $_POST['awal_jml_jiwa'],
                'tambah_lahir_wna_l' => $_POST['tambah_lahir_wna_l'],
                'tambah_lahir_wna_p' => $_POST['tambah_lahir_wna_p'],
                'tambah_lahir_wni_l' => $_POST['tambah_lahir_wni_l'],
                'tambah_lahir_wni_p' => $_POST['tambah_lahir_wni_p'],
                'tambah_datang_wna_l' => $_POST['tambah_datang_wna_l'],
                'tambah_datang_wna_p' => $_POST['tambah_datang_wna_p'],
                'tambah_datang_wni_l' => $_POST['tambah_datang_wni_l'],
                'tambah_datang_wni_p' => $_POST['tambah_datang_wni_p'],
                'kurang_meninggal_wna_l' => $_POST['kurang_meninggal_wna_l'],
                'kurang_meninggal_wna_p' => $_POST['kurang_meninggal_wna_p'],
                'kurang_meninggal_wni_l' => $_POST['kurang_meninggal_wni_l'],
                'kurang_meninggal_wni_p' => $_POST['kurang_meninggal_wni_p'],
                'kurang_pindah_wna_l' => $_POST['kurang_pindah_wna_l'],
                'kurang_pindah_wna_p' => $_POST['kurang_pindah_wna_p'],
                'kurang_pindah_wni_l' => $_POST['kurang_pindah_wni_l'],
                'kurang_pindah_wni_p' => $_POST['kurang_pindah_wni_p'],
                'akhir_wna_l' => $_POST['akhir_wna_l'],
                'akhir_wna_p' => $_POST['akhir_wna_p'],
                'akhir_wni_l' => $_POST['akhir_wni_l'],
                'akhir_wni_p' => $_POST['akhir_wni_p'],
                'akhir_jml_kk' => $_POST['akhir_jml_kk'],
                'akhir_jml_anggota_keluarga' => $_POST['akhir_jml_anggota_keluarga'],
                'akhir_jml_jiwa' => $_POST['akhir_jml_jiwa'],
                'ket' => $_POST['ket'],
                'created_at' => date('Y-m-d H:i:s'),
                
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
                'dusun' => $_POST['dusun'],
                'bulan_tahun' => $_POST['bulan_tahun'],
                'awal_wna_l' => $_POST['awal_wna_l'],
                'awal_wna_p' => $_POST['awal_wna_p'],
                'awal_wni_l' => $_POST['awal_wni_l'],
                'awal_wni_p' => $_POST['awal_wni_p'],
                'awal_jml_kk' => $_POST['awal_jml_kk'],
                'awal_jml_anggota_keluarga' => $_POST['awal_jml_anggota_keluarga'],
                'awal_jml_jiwa' => $_POST['awal_jml_jiwa'],
                'tambah_lahir_wna_l' => $_POST['tambah_lahir_wna_l'],
                'tambah_lahir_wna_p' => $_POST['tambah_lahir_wna_p'],
                'tambah_lahir_wni_l' => $_POST['tambah_lahir_wni_l'],
                'tambah_lahir_wni_p' => $_POST['tambah_lahir_wni_p'],
                'tambah_datang_wna_l' => $_POST['tambah_datang_wna_l'],
                'tambah_datang_wna_p' => $_POST['tambah_datang_wna_p'],
                'tambah_datang_wni_l' => $_POST['tambah_datang_wni_l'],
                'tambah_datang_wni_p' => $_POST['tambah_datang_wni_p'],
                'kurang_meninggal_wna_l' => $_POST['kurang_meninggal_wna_l'],
                'kurang_meninggal_wna_p' => $_POST['kurang_meninggal_wna_p'],
                'kurang_meninggal_wni_l' => $_POST['kurang_meninggal_wni_l'],
                'kurang_meninggal_wni_p' => $_POST['kurang_meninggal_wni_p'],
                'kurang_pindah_wna_l' => $_POST['kurang_pindah_wna_l'],
                'kurang_pindah_wna_p' => $_POST['kurang_pindah_wna_p'],
                'kurang_pindah_wni_l' => $_POST['kurang_pindah_wni_l'],
                'kurang_pindah_wni_p' => $_POST['kurang_pindah_wni_p'],
                'akhir_wna_l' => $_POST['akhir_wna_l'],
                'akhir_wna_p' => $_POST['akhir_wna_p'],
                'akhir_wni_l' => $_POST['akhir_wni_l'],
                'akhir_wni_p' => $_POST['akhir_wni_p'],
                'akhir_jml_kk' => $_POST['akhir_jml_kk'],
                'akhir_jml_anggota_keluarga' => $_POST['akhir_jml_anggota_keluarga'],
                'akhir_jml_jiwa' => $_POST['akhir_jml_jiwa'],
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
    function cetak(){
        $bulan_tahun = $this->input->post('bulan_tahun');
        $where = ['bulan_tahun'=>$bulan_tahun];
        $data=$this->Main_m->get($this->_table,$where)->result();
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
            $subvalues = array(
                $no++,
                $d->dusun,         
                $d->awal_wna_l,
                $d->awal_wna_p,
                $d->awal_wni_l,
                $d->awal_wna_p,
                $d->awal_jml_kk,
                $d->awal_jml_anggota_keluarga,
                $d->awal_jml_jiwa,
                $d->tambah_lahir_wna_l,
                $d->tambah_lahir_wna_p,
                $d->tambah_lahir_wni_l,
                $d->tambah_lahir_wni_p,
                $d->tambah_datang_wna_l,
                $d->tambah_datang_wna_p,
                $d->tambah_datang_wni_l,
                $d->tambah_datang_wni_p,
                $d->kurang_meninggal_wna_l,
                $d->kurang_meninggal_wna_p,
                $d->kurang_meninggal_wni_l,
                $d->kurang_meninggal_wni_p,
                $d->kurang_pindah_wna_l,
                $d->kurang_pindah_wna_p,
                $d->kurang_pindah_wni_l,
                $d->kurang_pindah_wni_p,
                $d->akhir_wna_l,
                $d->akhir_wna_p,
                $d->akhir_wni_l,
                $d->akhir_wna_p,
                $d->akhir_jml_kk,
                $d->akhir_jml_anggota_keluarga,
                $d->akhir_jml_jiwa,
                $d->ket
            );
           
            $values[] = $subvalues;
            $i++;
        }

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray(
            $values,
            NULL,
            'A15'
        );

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,  
                ],
            ],
        ];

        $i = $i + 6;

        $sheet->getStyle('A15:J'.$i)->applyFromArray($styleArray);
        $sheet->getStyle('A15:J'.$i)->getAlignment()->setWrapText(true);
        $sheet->getStyle('A15:J'.$i)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A15:J'.$i)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        // foreach(range('A7','J') as $columnID) {
        //     $sheet->getColumnDimension($columnID)->setAutoSize(true);
        // }
        for($r = 15;$r <= $i;$r++){
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