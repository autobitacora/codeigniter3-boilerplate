<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migrando extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        echo "no se que pasa";
        $this->load->library('migration');
    }
    
    public function index(){
        //cargamos libreria que hace todo
        //echo "no se que pasa";
        $this->load->library('migration');
        /*
         *esto ejecuta la migracion hasta la version
         *que elijamos aqui
        */
        $bersion = 2;
        if($this->migration->version($bersion)){
            echo "Errorrr!";
        }else{
            echo "Migra a version ".$bersion." completada sin errores";
        }
    }
    public function migra(){
        //cargamos libreria que hace todo
        //echo "no se que pasa";
        $this->load->library('migration');
        /*
         *esto ejecuta la migracion hasta la version
         *que elijamos aqui
        */
        $bersion = 2;
        if($this->migration->version($bersion)){
            echo "Errorrr!";
        }else{
            echo "Migra a version ".$bersion." completada sin errores";
        }
    }
}