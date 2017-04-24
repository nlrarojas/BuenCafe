<?php

namespace utility;

/**
 *
 */
class DataBase {

    public function getInfoDB() {
        return array(
            "DataBase" => "db_buen_cafe",
            "UID" => "sqlserver",
            "PWD" => "saucr.12",
            "CharacterSet" => "UTF-8"
        );
    }
    
    public function getServerName(){
        return "163.178.107.130";
    }
}