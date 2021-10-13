<?php 

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");


    include "../../Config/Database.php";

    class News extends Database{

        // anasayfa için bütün haberleri getiriyor
        public function posts(){
            
            $str = "SELECT * FROM posts WHERE is_active = 1";
            $qry = $this->conn()->prepare($str);
            $qry->execute();

            $sayi = 1;

            while($result = $qry->fetchAll(PDO::FETCH_ASSOC)){


                $post_arr = array();
                $post_arr["data"] = array();

                extract($result);

                $post_item = array(
                    "id" => $result[0]["id"],
                    "name" => $result[0]["name"],
                    "text" => $result[0]["text"],
                );

                array_push($post_arr["data"], $post_item);

                echo json_encode($post_arr);


            }

        
        }
        

    }

    
    $News = new News();
    $News->posts();


?>