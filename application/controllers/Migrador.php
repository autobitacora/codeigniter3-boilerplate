<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migrador extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        //cargamos libreria que hace todo
        $this->load->library('migration');
               
        if ( ! $this->migration->latest()){
            show_error($this->migration->error_string());
        }else{
            show_error('Migracion a la ultima version realizada con exito', 200);
        }
    }
}