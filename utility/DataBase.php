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
        );
    }
    
    public function getServerName(){
        return "S-LABS\MSSQLSERVER";
    }
}