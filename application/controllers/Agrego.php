<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agrego extends CI_Controller{
    function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}
    /*
     *Este controlador sirve para agregar un usuario nuevo en la base de ion_auth
     *
     */
    function index(){
        //con esto revisamos si el usuario esta logueado
        if (!$this->ion_auth->logged_in())
		{
			//si no lo esta, va a la pagina donde puede ingresar sus datos
            redirect('auth/login');
		}else{
            $username = 'raul';
            $password = 'raul';
            $email = 'autobitacora@gmail.com';
            $additional_data = array(
								'first_name' => 'Raul',
								'last_name' => 'NoTiene',
								);
            $group = array('1'); // Sets user to admin. 
            // si falla retorna 0 si no la i del usuario
            echo $this->ion_auth->register($username, $password, $email, $additional_data, $group);
        }
    }
}
