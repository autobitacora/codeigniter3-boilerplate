<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Heredamos de la clase CI_Controller */
class Gastos extends CI_Controller {
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
     * grocery crud no funciona bien desde index()...
     **/
    redirect('gastos/administracion');
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
    $crud->set_table('gastos');
    /* Le asignamos un nombre */
    $crud->set_subject('Gastos');
    /* Asignamos el idioma español */
    $crud->set_language('spanish');
    /*
     * deshabilitamos las llamdas a jquery y a bootstrap
     * (ya lo hacemos en el template)
     */
    $crud->unset_bootstrap();
    //$crud->unset_jquery();
    /*
     * cambiamos la definicion d efecha a date
     */
    $crud->field_type('fecha','datetime');
    $crud->field_type('creado_en', 'datetime');
    /* Aqui le decimos que el campo del timestamp no sea visible */
    $crud->field_type('creado_en','invisible');
        /* Aqui le decimos con que campos vamos a trabajar-util para el callback */
    $crud->fields(
      'id',
      'fecha',
      'descripcion',
      'creado_en',
      'cantidad',
      'precio_producto',
      'categoria',
      'comercio'
    );
    /* Aqui le decimos a grocery que estos campos son obligatorios */
    $crud->required_fields(
      'descripcion',
      'cantidad',
      'fecha',
      'precio_producto'
    );
    /* Aqui definimos que campos seran visibles en el formulario de ingresos de categoria nueva */
    $crud->add_fields('descripcion', 'precio_producto', 'fecha', 'cantidad', 'categoria', 'comercio');
    /* Aqui le indicamos que campos deseamos mostrar al listar */
    $crud->columns(
      'descripcion',
      'fecha',
      'cantidad',
      'precio_producto',
      'categoria',
      'comercio'
    );
    //las reglas que deben respetar los campos
    $crud->set_rules('precio_producto', 'Precio', 'decimal');
    $crud->set_rules('cantidad', 'Cantidad', 'is_natural');        
    /*Le cambiamos en nombre al la columna id */
    $crud->display_as('id','Referencia');
    /*Hacemos lo propio con precio del producto*/
    $crud->display_as('precio_producto','Precio');
    /* llamamos al call_back antes del insert (pone la fecha) */
    //$crud->callback_before_insert(array($this,'guardar_fecha'));
    // generamos la relacion categorias
    $crud->set_relation('categoria', 'categorias', 'descripcion');
    // generamos la relacion comercios
    $crud->set_relation('comercio', 'comercios', 'descripcion');
    /* seteamos el orden de muestra en el grid
     *  por id , descendiente (el ultimo primero)
     */
    $crud->order_by('id','desc'); 
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
   private function guardar_fecha($post_array){
    $post_array['creado_en'] = now();
    return $post_array;
  }
}