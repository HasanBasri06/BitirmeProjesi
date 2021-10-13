<?php 

    // veritabanına bağlandı

    class Database{

        public function __construct(
            private string $host    = "localhost",
            private string $dbname  = "news",
            private string $root    = "root",
            private string $pass    = "",
        ){}

        public function conn(){

            try {
                $db = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."", $this->root , $this->pass);
                return $db;
            } catch (\PDOException $th) {

                echo $th->getMessage();
                die("\nVeritabanına bağlanılamadı");
            }



        }


    }



