<?php

namespace utility;

/**
 *
 */
class DataBase {

    /**
     *
     */
    public function __construct() {
        
    }

    /**
     * @return array
     */
    public function infoDB() {
        return array(
            "driver" => "",
            "host" => "163.178.107.130",
            "user" => "sqlserver",
            "pass" => "saucr.12",
            "database" => "db_buen_cafe",
            "charset" => "utf8"
        );
    }
}