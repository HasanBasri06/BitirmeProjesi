<?php 

    include "../Config/Database.php";

    class Shuffle extends Database{
        


        public function categories(){

            $str = "SELECT * FROM category";
            $qry = $this->conn()->query($str);

            while($result = $qry->fetchAll(PDO::FETCH_ASSOC)){
                return $result;
            }
            
        }

        public function User($user){

           
            $qry = $this->conn()->prepare("SELECT * FROM users WHERE userName = ?");
            $qry->execute([$user]);

            $result = $qry->fetch(PDO::FETCH_ASSOC);
            
            $id         = $result["id"];
            $userName   = $result["userName"];

            return $id;

        }


        public function Shuffle($user){

                    
            $qry = $this->conn()->prepare("SELECT liked_post FROM users_flow WHERE user_id = ?");
            $qry->execute([$user]);

            $result = $qry->fetch(PDO::FETCH_NUM);

            if(!$result){

                
                
                // return $notShuffle;
            }
            else{

                $liked_post = $result["0"];

                $qry = $this->conn()->prepare("SELECT * FROM users_flow INNER JOIN posts ON posts.category_id = users_flow.category_id ORDER BY posts.id DESC LIMIT 10");
                $qry->execute();

                $result2 = $qry->fetchAll(PDO::FETCH_ASSOC);

                return $result2;

            }






        }

    }
