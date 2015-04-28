<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
class Principal extends CI_Controller { 
   public function index(){
      $this->load->helper('url');
      $this->base = $this->config->item('base_url');
      echo '</br>Bienvenido a la página principal.</br>';
      echo $this->base;
      echo '</br>Bienvenido a la página principal.</br>';
      echo site_url();
      echo '</br>Bienvenido a la página principal.</br>';
      echo base_url();
      echo '</br>Bienvenido a la página principal.</br>';
      echo anchor('start/hello/fred', 'Say hello to Fred');
      echo '</br>Bienvenido a la página principal.</br>';
      echo safe_mailto('me@example.com', 'Click Here to Email Me');
   }
}