<?php 

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");


    include "../../Config/Database.php";

    class Users extends Database{

        public function users(){

            $str = "SELECT * FROM users";
            $qry = $this->conn()->prepare($str);
            $qry->execute();

            $sayi = 1;
            
            while($result = $qry->fetchAll(PDO::FETCH_ASSOC)){

                $post_arr = array();
                $post_arr["data"] = array();

                extract($result);

                $post_item = array(
                    "userName" => $result[1]["userName"],
                    "created_at" => $result[1]["created_at"],
                    "userPass" => md5($result[1]["userPass"]),
                );

                array_push($post_arr["data"], $post_item);

                echo json_encode($post_arr);

                // hepsini gösteremedim
            }
            
        }
            
        

    }

    $Users = new Users();
    $Users->users();


?>