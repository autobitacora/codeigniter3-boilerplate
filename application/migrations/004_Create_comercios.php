<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Comercios extends CI_Migration {
    public function up() {
        //Creamos la estructura de una tabla con id y descripcion
        $this->dbforge->add_field(
            array(
                "comercio"    =>  array(
                    "type"          =>  "INT",
                    "constraint"    =>  11,
                    "unsigned"      =>  TRUE,
                    "auto_increment"=>  TRUE,    
                ),
                "creado_en"     => array(
                    "type"      => "TIMESTAMP",
                ),
                "descripcion"  =>  array(
                    "type"          =>  "VARCHAR",
                    "constraint"    =>  150,
                ),
            )
        );
        $this->dbforge->add_key('comercio',TRUE);
        $this->dbforge->create_table('comercios', TRUE);
    }
    
    public function down(){
        //eliminamos la tabla completamente
        $this->dbforge->drop_table('comercios');
    }
}