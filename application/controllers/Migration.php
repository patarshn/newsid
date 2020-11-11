<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Migration extends CI_Controller {
    public function __construct() {
        parent::__construct();
         $this->load->library('migration');
    }
    

    public function index2() {

        $data = $this->migration->find_migrations();
        #$this->migration->version('20201103234900');
        #print_r($data);
        #echo var_dump($this->migration->);
        #foreach($data as $key => $value){
            #$this->migration->version($key);
            #$migration_name = str_replace($this->_mi)
        #}

    }


    public function index() {

        if (!$this->migration->latest()) {
            show_error($this->migration->error_string());
        } else {
            echo 'Migration worked!';
        }
    }

    public function tolast() {
        if ($this->migration->error_string()) {
            show_error($this->migration->error_string());
        } else {
            echo 'Migration worked to last!';
        }
    }
}