<?php

    namespace App\db;

    use \PDO;
    class DataBase{

        const HOST= "localhost";
        const NAME= "ECOMMERCE";
        const USUARIO= "ROOT";
        const PASSWORD= "";

        private $tabale;
        private $connection;

        public function __construct($tabale = null) {
            $this->tabale = $tabale;
            $this->setConnection();
        }

        private function setConnection() {
            try {
                $this
                }
            } catch (PDOException $e) { 
    }