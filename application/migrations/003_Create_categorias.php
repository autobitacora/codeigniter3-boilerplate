<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Categorias extends CI_Migration {
    public function up() {
        //Creamos la estructura de una tabla con id y descripcion
        $this->dbforge->add_field(
            array(
                "categoria"    =>  array(
                    "type"          =>  "INT",
                    "constraint"    =>  11,
                    "unsigned"      =>  TRUE,
                    "auto_increment"=>  TRUE,    
                 ),
                "descripcion"  =>  array(
                    "type"          =>  "VARCHAR",
                    "constraint"    =>  100,
                ),
                "creado_en"     => array(
                    "type"      => "TIMESTAMP",
                ),
            )
        );
        $this->dbforge->add_key('categoria',TRUE);
        $this->dbforge->create_table('categorias', TRUE);
    }
    
    public function down(){
        //eliminamos la tabla completamente
        $this->dbforge->drop_table('categorias');
    }
}