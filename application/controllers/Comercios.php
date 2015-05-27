<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Comercios extends CI_Controller {

  function __construct()
  {

    parent::__construct();

    /* Cargamos la base de datos */
    $this->load->database();

    /* Cargamos la libreria*/
    $this->load->library('grocery_crud');

    /* Añadimos el helper al controlador */
    $this->load->helper('url');
  }

  function index()
  {
    /*
     * Mandamos todo lo que llegue a la funcion
     * administracion().
     **/
    redirect('comercios/administracion');
  }

  /*
   *
   **/
  function administracion()
  {
    try{

    /* Creamos el objeto */
    $crud = new grocery_CRUD();

    /* Seleccionamos el tema */
    $crud->set_theme('bootstrap');

    /* Seleccionmos el nombre de la tabla de nuestra base de datos*/
    $crud->set_table('comercios');

    /* Le asignamos un nombre */
    $crud->set_subject('Comercios');

    /* Asignamos el idioma español */
    $crud->set_language('spanish');

    /* Aqui le decimos a grocery que estos campos son obligatorios */
    $crud->required_fields(
      'comercio',
      'descripcion'
    );

    /* Aqui le indicamos que campos deseamos mostrar */
    $crud->columns(
      'comercio',
      'descripcion'
    );
    /*Le cambiamos en nombre al la columna id */
    $crud->display_as('comercio','Lugar donde compramos');
    //$crud->unset_jquery();
       /* Aqui definimos que campos seran visibles en el formulario de ingresos de categoria nueva */
    $crud->add_fields('descripcion'); 
    
        /* llamamos al call_back antes del insert (pone la fecha) */
    $crud->callback_before_insert(array($this,'guardar_fecha'));
    
    /* Generamos la tabla */
    $output = $crud->render();

    /* La cargamos en la vista situada en
    /applications/views/productos/administracion.php */

    $this->load->view('header');
    $this->load->view('comercios/administracion', $output);
	$this->load->view('footer');

    }catch(Exception $e){
      /* Si algo sale mal cachamos el error y lo mostramos */
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
  }
  /*
   * Recibe el array de datos a guardar en la tabla y le cambia la fecha
   */
  private function guardar_fecha($post_array){
    $post_array['creado_en'] = now();
  }
}