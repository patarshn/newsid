<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class Buku_ktp_kk extends Admin_Controller {

    private $_table = 'ktp_kk';
    private $_folder = 'buku_ktp_kk';
    private $_mainTitle = 'Buku Kartu Tanda Penduduk dan Kartu Keluarga';
    private $_exelName = 'buku_ktp_kk.xls';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->model('Kependudukan_m');
        $this->load->library('breadcrumbcomponent'); 
    }    

    function rulesStore() {
        return [
            ['field' => 'nik','label' => 'Nomor Induk Penduduk (NIK)', 'rules' => 'required'],
            ['field' => 'nkk','label' => 'Nomor Kartu Keluarga (KK)', 'rules' => 'required'],
            ['field' => 'tahun_ektp','label' => 'Tahun Dikeluarkannya E_KTP', 'rules' => 'required'],
            ['field' => 'nama','label' => 'Nama Lengkap', 'rules' => 'required'],
            ['field' => 'jenis_kelamin','label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'tempat_lahir','label' => 'Tempat Lahir', 'rules' => 'required'],
            ['field' => 'tanggal_lahir','label' => 'Tanggal Lahir', 'rules' => 'required'],
            ['field' => 'goldar','label' => 'Golongan Darah', 'rules' => 'required'],
            ['field' => 'agama','label' => 'Agama', 'rules' => 'required'],
            ['field' => 'pendidikan','label' => 'Pendidikan', 'rules' => 'required'],
            ['field' => 'pekerjaan','label' => 'Pekerjaan', 'rules' => 'required'],
            ['field' => 'alamat','label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'rt','label' => 'RT', 'rules' => 'required'],
            ['field' => 'rw','label' => 'RW', 'rules' => 'required'],
            ['field' => 'dusun','label' => 'Nama Dusun', 'rules' => 'required'],
            ['field' => 'baca_huruf','label' => 'Dapat Membaca Huruf', 'rules' => 'required'],
            ['field' => 'status_perkawinan','label' => 'Status Perkawinan', 'rules' => 'required'],
            ['field' => 'tmpt_ektp_dikeluarkan','label' => 'Tempat di Keluarkannya E-KTP', 'rules' => 'required'],
            ['field' => 'tgl_ektp_dikeluarkan','label' => 'Tanggal di Keluarkannya E-KTP', 'rules' => 'required'],
            ['field' => 'hub_keluarga','label' => 'Hubungan Keluarga', 'rules' => 'required'],
            ['field' => 'wn','label' => 'Kewarganegaraan', 'rules' => 'required'],
            ['field' => 'ayah','label' => 'Nama Ayah', 'rules' => 'required'],
            ['field' => 'ibu','label' => 'Nama Ibu', 'rules' => 'required'],
            ['field' => 'tgl_tinggal_desa','label' => 'Tanggal Mulai Tinggal di Desa', 'rules' => 'required'],
            ['field' => 'ket','label' => 'Keterangan'],
           ];
    } 
    
    function rulesUpdate(){
        return [
            ['field' => 'id','label' => 'id', 'rules' => 'required'],
            ['field' => 'nik','label' => 'Nomor Induk Penduduk (NIK)', 'rules' => 'required'],
            ['field' => 'nkk','label' => 'Nomor Kartu Keluarga (KK)', 'rules' => 'required'],
            ['field' => 'tahun_ektp','label' => 'Tahun Dikeluarkannya E_KTP', 'rules' => 'required'],
            ['field' => 'nama','label' => 'Nama Lengkap', 'rules' => 'required'],
            ['field' => 'jenis_kelamin','label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'tempat_lahir','label' => 'Tempat Lahir', 'rules' => 'required'],
            ['field' => 'tanggal_lahir','label' => 'Tanggal Lahir', 'rules' => 'required'],
            ['field' => 'goldar','label' => 'Golongan Darah', 'rules' => 'required'],
            ['field' => 'agama','label' => 'Agama', 'rules' => 'required'],
            ['field' => 'pendidikan','label' => 'Pendidikan', 'rules' => 'required'],
            ['field' => 'pekerjaan','label' => 'Pekerjaan', 'rules' => 'required'],
            ['field' => 'alamat','label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'rt','label' => 'RT', 'rules' => 'required'],
            ['field' => 'rw','label' => 'RW', 'rules' => 'required'],
            ['field' => 'dusun','label' => 'Nama Dusun', 'rules' => 'required'],
            ['field' => 'baca_huruf','label' => 'Dapat Membaca Huruf', 'rules' => 'required'],
            ['field' => 'status_perkawinan','label' => 'Status Perkawinan', 'rules' => 'required'],
            ['field' => 'tmpt_ektp_dikeluarkan','label' => 'Tempat di Keluarkannya E-KTP', 'rules' => 'required'],
            ['field' => 'tgl_ektp_dikeluarkan','label' => 'Tanggal di Keluarkannya E-KTP', 'rules' => 'required'],
            ['field' => 'hub_keluarga','label' => 'Hubungan Keluarga', 'rules' => 'required'],
            ['field' => 'wn','label' => 'Kewarganegaraan', 'rules' => 'required'],
            ['field' => 'ayah','label' => 'Nama Ayah', 'rules' => 'required'],
            ['field' => 'ibu','label' => 'Nama Ibu', 'rules' => 'required'],
            ['field' => 'tgl_tinggal_desa','Tanggal Mulai Tinggal di Desa' => 'Tempat Lahir', 'rules' => 'required'],
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

    function get_data_user()
    {
        $list = $this->Kependudukan_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = '<input type="checkbox" name="rowdelete[]" value="'.$field->id.'" class="rowdelete">';
            $row[] = $no; 
            $row[] = '<div class="dropdown no-arrow">  
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Actions:</div>
                    <a class="dropdown-item" href="'.base_url('admin/'.$this->_folder.'/edit/'.$field->nik).'">Edit</a>
                    <a class="dropdown-item" href="'.base_url('admin/'.$this->_folder.'/detail/'.$field->nik).'">Detail</a>
                </div>
            </div>';
            $row[] = $field->nkk;
            $row[] = $field->nik;
            $row[] = $field->nama;
            $row[] = $field->jenis_kelamin;
            $row[] = $field->tempat_lahir;
            $row[] = date("d-m-Y", strtotime($field->tanggal_lahir));
            $row[] = $field->alamat;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Kependudukan_m->count_all(),
            "recordsFiltered" => $this->Kependudukan_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function index(){
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin'));  
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/'));
        
        $breadcrumb = $this->breadcrumbcomponent->output();
        $getData = $this->Main_m->get($this->_table,null);
        $data = array(
            'breadcrumb' => $breadcrumb,
            'data' => $getData->result(),
            'title' => $this->_mainTitle,
            'uri' => $this->uri->segment_array(),
            'folder' => $this->_folder,
            'total' => count($getData->result()),
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/index',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

    function detail($nik){
        
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin')); 
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/')); 
        $this->breadcrumbcomponent->add('Detail', base_url('admin/'.$this->_folder.'/detail/'));
        $this->breadcrumbcomponent->add($nik, base_url('admin/'.$this->_folder.'/detail/'.$nik));

        $breadcrumb = $this->breadcrumbcomponent->output();
        $where = ['nik'=>$nik];
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
                'nik' => $_POST['nik'],
                'nkk' => $_POST['nkk'],
                'tahun_ektp' => $_POST['tahun_ektp'],
                'nama' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'status_perkawinan' => $_POST['status_perkawinan'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tanggal_lahir' => $_POST['tanggal_lahir'],
                'goldar' => $_POST['goldar'],
                'agama' => $_POST['agama'],
                'pendidikan' => $_POST['pendidikan'],
                'pekerjaan' => $_POST['pekerjaan'],
                'tmpt_ektp_dikeluarkan' => $_POST['tmpt_ektp_dikeluarkan'],
                'tgl_ektp_dikeluarkan' => $_POST['tgl_ektp_dikeluarkan'],
                'wn' => $_POST['wn'],
                'alamat' => $_POST['alamat'],
                'rt' => $_POST['rt'],
                'rw' => $_POST['rw'],
                'dusun' => $_POST['dusun'],
                'baca_huruf' => $_POST['baca_huruf'],
                'hub_keluarga' => $_POST['hub_keluarga'],
                'ayah' => $_POST['ayah'],
                'ibu' => $_POST['ibu'],
                'tgl_tinggal_desa' => $_POST['tgl_tinggal_desa'],
                'ket' => $_POST['ket'],
                'created_at' => date('Y-m-d H:i:s'),
                
            );

            $nik = $_POST['nik'];
            $sql  = $this->db->query("SELECT nik FROM ktp_kk where nik='$nik'");
            $cek_nik = $sql->num_rows();
            if($cek_nik > 0){
                $this->session->set_flashdata('error_message', 'NIK Sudah terdaftar sebelumnya');
                    $callback = array(
                        'status' => 'error',
                        'message' => 'NIK sudah terdaftar sebelumnya',
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

    function edit($nik){
            
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin')); 
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/')); 
        $this->breadcrumbcomponent->add('Edit', base_url('admin/'.$this->_folder.'/edit/'));
        $this->breadcrumbcomponent->add($nik, base_url('admin/'.$this->_folder.'/edit/'.$nik));

        $breadcrumb = $this->breadcrumbcomponent->output();
        $where = ['nik'=>$nik];
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
                'nik' => $_POST['nik'],
                'nkk' => $_POST['nik'],
                'tahun_ektp' => $_POST['tahun_ektp'],
                'nama' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'status_perkawinan' => $_POST['status_perkawinan'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tanggal_lahir' => $_POST['tanggal_lahir'],
                'goldar' => $_POST['goldar'],
                'agama' => $_POST['agama'],
                'pendidikan' => $_POST['pendidikan'],
                'pekerjaan' => $_POST['pekerjaan'],
                'tmpt_ektp_dikeluarkan' => $_POST['tmpt_ektp_dikeluarkan'],
                'tgl_ektp_dikeluarkan' => $_POST['tgl_ektp_dikeluarkan'],
                'wn' => $_POST['wn'],
                'alamat' => $_POST['alamat'],
                'rt' => $_POST['rt'],
                'rw' => $_POST['rw'],
                'dusun' => $_POST['dusun'],
                'baca_huruf' => $_POST['baca_huruf'],
                'hub_keluarga' => $_POST['hub_keluarga'],
                'ayah' => $_POST['ayah'],
                'ibu' => $_POST['ibu'],
                'tgl_tinggal_desa' => $_POST['tgl_tinggal_desa'],
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

    public function cetakExc(){
        $tahun_ektp = $this->input->get('tahun_ektp');
        $where = ['tahun_ektp'=>$tahun_ektp];
        $reader = IOFactory::createReader('Xls');
        $spreadsheet = $reader->load('./assets/buku_adm_penduduk/'.$this->_exelName);
        $data=$this->Main_m->getAsc($this->_table,$where)->result();
        $values = array();
        $i = 0;
        $no = 1;
        foreach($data as $d){

            if($d->jenis_kelamin == 'LAKI-LAKI'){
                $jkelamin = "L";
            }
            else{
                $jkelamin = "P";
            }
            $subvalues = array(
                $no++,    
                $d->nkk,            
                $d->nama,
                $d->nik,
                $jkelamin,                 
                $d->tempat_lahir.' / '.date("d-m-Y", strtotime($d->tanggal_lahir)),
                $d->goldar,               
                $d->agama,
                $d->pendidikan,
                $d->pekerjaan,
                $d->alamat,
                $d->status_perkawinan,
                $d->tmpt_ektp_dikeluarkan.','.date("d-m-Y", strtotime($d->tgl_ektp_dikeluarkan)),                               
                $d->hub_keluarga,   
                $d->wn, 
                $d->ayah, 
                $d->ibu, 
                date("d-m-Y", strtotime($d->tgl_tinggal_desa)),
                $d->ket
            );
           
            $values[] = $subvalues;
            $i++;
        }

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray(
            $values,
            NULL,
            'A12'
        );

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,  
                ],
            ],
        ];

        $i = $i + 6;

        $sheet->getStyle('A12:J'.$i)->applyFromArray($styleArray);
        $sheet->getStyle('A12:J'.$i)->getAlignment()->setWrapText(true);
        $sheet->getStyle('A12:J'.$i)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A12:J'.$i)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        // foreach(range('A7','J') as $columnID) {
        //     $sheet->getColumnDimension($columnID)->setAutoSize(true);
        // }
        for($r = 12;$r <= $i;$r++){
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