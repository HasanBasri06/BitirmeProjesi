<?php 

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");


    include "../../Config/Database.php";

    class ReadSingle extends Database{

        public function read_single($get_id){

            $str = "SELECT * FROM posts WHERE id = ?";
            $qry = $this->conn()->prepare($str);
            $qry->execute([$get_id]);
            
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

    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $News = new ReadSingle();
    $News->read_single($id);


?>