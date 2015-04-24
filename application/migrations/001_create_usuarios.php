<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Usuarios extends CI_Migration {
    public function up() {
        //Creamos la estructura de una tabla con id, username y password
        $this->dbforge->add_field(
            array(
                "id"    =>  array(
                    "type"          =>  "INT",
                    "constraint"    =>  11,
                    "unsigned"      =>  TRUE,
                    "auto_increment"=>  TRUE,    
                 ),
                "usuario"  =>  array(
                    "type"          =>  "VARCHAR",
                    "constraint"    =>  100,
                ),
                "contrasena"	=>		array(
					"type"			=>	"VARCHAR",
					"constraint"	=>	50,
				),
            )
        );
        $this->dbforge->add_key('id',TRUE);
        $thid->debforge->create_table('usuarios');
    }
    
    public function down(){
        //eliminamos la tabla completamente
        $this->dbforge->drop_table('usuarios');
    }
}