<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Gastos extends CI_Migration {
    public function up() {
        //Creamos la estructura de una tabla con id y descripcion
        $this->dbforge->add_field(
            array(
                "id"    =>  array(
                    "type"          =>  "INT",
                    "constraint"    =>  11,
                    "unsigned"      =>  TRUE,
                    "auto_increment"=>  TRUE,    
                ),
                "fecha"  =>  array(
                    "type"          =>  "TIMESTAMP",
                ),
                "creado_en"     => array(
                    "type"      => "",
                ),
                "descripcion"  =>  array(
                    "type"          =>  "VARCHAR",
                    "constraint"    =>  100,
                ),
                "precio_producto"  =>  array(
                    "type"          =>  "FLOAT",
                ),
                "cotizacion_dolar"  =>  array(
                    "type"          =>  "FLOAT",
                ),
                "cantidad"      => array(
                    "type"          => "INT",
                    "default"       => 1,
                ),
            )
        );
        $this->dbforge->add_key('id',TRUE);
        $this->dbforge->create_table('gastos', TRUE);
    }
    
    public function down(){
        //eliminamos la tabla completamente
        $this->dbforge->drop_table('gastos');
    }
}