<?php

    include "../Config/Database.php";

    class Home extends Database{

        // anasayfa için bütün haberleri getiriyor
        public function posts(){
            
            $str = "SELECT * FROM posts WHERE is_active = 1 ORDER BY id DESC";
            $qry = $this->conn()->query($str);

            return $result = $qry->fetchAll(PDO::FETCH_ASSOC);

        }

        // anasayfada olan bütün kategorilerin isimlerini getiriyor 
        public function categories(){

            $str = "SELECT * FROM category";
            $qry = $this->conn()->query($str);

            while($result = $qry->fetchAll(PDO::FETCH_ASSOC)){
                return $result;
            }
            
        }

    }

    