<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Migration_add_comercios_gastos extends CI_Migration{
    public function up(){
        // creamos un array con la definicion de l anueva columna
        $comercios = array(
            'comercio'  => array(
                'type'  => 'INT',
            ),
        );
        // agregamos esa columna a la tabla
        $this->dbforge->add_column('gastos', $comercios);
    }
    public function down(){
        // borramos la columna recien agregada
        $this->dbforge->drop_column('gastos', 'comercio');
        
    }
}