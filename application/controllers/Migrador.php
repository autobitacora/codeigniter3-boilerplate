<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migrador extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        //cargamos libreria que hace todo
        $this->load->library('migration');
        
        
        
    }
}