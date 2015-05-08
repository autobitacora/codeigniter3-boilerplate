<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Categorias extends CI_Controller {

  function __construct()
  {

    parent::__construct();

    /* Cargamos la base de datos */
    $this->load->database();

    /* Cargamos la libreria*/
    $this->load->library('grocery_crud');
    
    /* Como vamos a trabajar con fechas */
    $this->load->helper('date');

    /* Añadimos el helper al controlador */
    $this->load->helper('url');
  }

    function index()
  {
    /*
     * Mandamos todo lo que llegue a la funcion
     * administracion().
     **/
    redirect('categorias/administracion');
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
    $crud->set_table('categorias');

    /* Le asignamos un nombre */
    $crud->set_subject('Categorias');

    /* Asignamos el idioma español */
    $crud->set_language('spanish');
    
    /* Aqui le decimos con que campos vamos a trabajar-util para el callback */
    $crud->fields(
      'id',
      'descripcion',
      'creado_en'
    );
    
    /* Aqui le decimos que el campo del timestamp no se avisible */
    $crud->change_field_type('creado_en','invisible');
    
    /* Aqui le decimos a grocery que estos campos son obligatorios */
    $crud->required_fields(
      'descripcion'
    );
    
    /* Aqui definimos que campos seran visibles en el formulario de ingresos d ecategoria nueva */
    $crud->add_fields('descripcion');
    
    /* Aqui le indicamos que campos deseamos mostrar al listar */
    $crud->columns(
      'id',
      'descripcion',
      'creado_en'
    );
        
    /*Le cambiamos en nombre al la columna id */
    $crud->display_as('id','Referencia');
    
    /* llamamos al call_back antes del insert (pone la fecha) */
    $crud->callback_before_insert(array($this,'guardar_fecha'));
    //$crud->unset_jquery();
    /* Generamos la tabla */
    $output = $crud->render();

    /* La cargamos en la vista situada en
    /applications/views/productos/administracion.php */

    $this->load->view('header');
    $this->load->view('categorias/administracion', $output);
	$this->load->view('footer');

    }catch(Exception $e){
      /* Si algo sale mal cachamos el error y lo mostramos */
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
  }
  /*
   * Recibe el array de datos a guardar en la tabla y le cambia la fecha
   */
  function guardar_fecha($post_array){
    $post_array['creado_en'] = now();
  }
}