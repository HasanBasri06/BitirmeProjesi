<?php 

    include "../Config/Database.php";

    class Post extends Database{

        public function user($user_id){
            $qry = $this->conn()->prepare("SELECT * FROM users WHERE userName = ?");
            $qry->execute([$user_id]);

            $result = $qry->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        public function view($post_id, $user_id){

            $look       = $this->conn()->prepare("SELECT * FROM view_ip WHERE post_id = ? AND user_id = ? AND ip_name = ?");
            $look->execute([$post_id, $user_id, $_SERVER["REMOTE_ADDR"]]);

            if(($look->fetch(PDO::FETCH_ASSOC) === false)){
                $qry = $this->conn()->prepare("INSERT INTO view_ip (post_id, user_id, ip_name) VALUES (?,?,?)");
                $qry->execute([$post_id, $user_id, $_SERVER["REMOTE_ADDR"]]);
            }
            

            
        }

        public function Posts($post_id){
            $qry = $this->conn()->prepare("SELECT * FROM posts WHERE id = ? ");
            $qry->execute([$post_id]);

            $result = $qry->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        public function single_post($post_id){
            
            $str = "SELECT * FROM posts WHERE id = :post_id";
            $qry = $this->conn()->prepare($str);
            $qry->bindParam(":post_id", $post_id);
            $qry->execute();

            $result = $qry->fetch(PDO::FETCH_ASSOC);

            $data = [
                "post_name" => $result["name"],
                "post_image" => $result["image"],
                "post_text" => $result["text"],
            ];

            return $data;
            

        }

        public function addMessage($id, $userID, $name, $anonim, $message){


            if( (isset($name)) && ($anonim === null) ){
                


                if(!$message == ""){

                                    
                $qry =  $this->conn()->prepare("INSERT INTO comments (post_id, user_id, user_name, comment) VALUES (?,?,?,?)");
                $is_insert = $qry->execute([$id, $userID, $name, $message]);

                if($is_insert == true){
                    $comment =  '
                        <div class="alert alert-success alert-dismissible fade show container mt-2" role="alert">
                            Yorumunuz Gönderildi
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    ';

                    return $comment;
                }

            
            
                
                
            }else{
                
                $empty =  '
                    <div class="alert alert-danger alert-dismissible fade show container mt-2" role="alert">
                    Lütfen Boş Alan Bırakmayınız!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
                return $empty;
                
            }

                            
            }
            elseif($anonim === "on"){

                $qry =  $this->conn()->prepare("INSERT INTO comments (post_id, user_name, comment, is_anonim) VALUES (?,?,?,?)");
                $is_insert = $qry->execute([$id, "anonim". rand(500,1000), $message, "1"]);

                if($is_insert == true){
                    $comment =  '
                        <div class="alert alert-success alert-dismissible fade show container mt-2" role="alert">
                            Yorumunuz Anonim Olarak Gönderildi
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    ';

                    return $comment;
                }

            }
            elseif(!isset($_SESSION["USER_LOGIN"])){
                $qry =  $this->conn()->prepare("INSERT INTO comments (post_id, user_name, comment, is_anonim) VALUES (?,?,?,?)");
                $is_insert = $qry->execute([$id, "anonim". rand(500,1000), $message, "1"]);

                if($is_insert == true){
                    $comment =  '
                        <div class="alert alert-success alert-dismissible fade show container mt-2" role="alert">
                            Yorumunuz Anonim Olarak Gönderildi
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    ';

                    return $comment;
                }
            }

        }


        public function allComments($post_id){
            $str = "SELECT * FROM comments WHERE post_id = ?";
            $qry = $this->conn()->prepare($str);
            $qry->execute([$post_id]);

            $result = $qry->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }


        public function liked($post_id, $like, $user_id, $categId){  

            
            if($like == "on"):
            
                $qry = $this->conn()
                    ->prepare("SELECT * FROM user_ip WHERE post_id = ? AND user_id = ? AND ip_name = ? LIMIT 1");

                $qry->execute([
                        $post_id,
                        $user_id,
                        $_SERVER["REMOTE_ADDR"],
                    ]);
                
                $result = $qry->fetch(PDO::FETCH_ASSOC);

                if($result){
                    echo '
                        <div class="alert alert-warning container mt-2" role="alert">
                            Zaten Oy Kullandınız!    
                        </div>
                    ';
                }
                elseif(!$result){

                    

                    $in_qry = $this->conn()
                    ->prepare("INSERT INTO user_ip (post_id, user_id, ip_name) VALUES (?,?,?)")
                    ->execute([$post_id, $user_id, $_SERVER["REMOTE_ADDR"]]);

                    $ins_qry = $this->conn()
                    ->prepare("INSERT INTO users_flow (liked_post, user_id, category_id) VALUES (?,?,?)")
                    ->execute([$post_id, $user_id, $categId]);

                    echo '
                        <div class="alert alert-success container mt-2" role="alert">
                            Oyunuz İçin Teşekkür Ederiz :)    
                        </div>
                    ';

                }
            
            endif;

        }

        public function categories(){

            $str = "SELECT * FROM category";
            $qry = $this->conn()->query($str);

            while($result = $qry->fetchAll(PDO::FETCH_ASSOC)){
                return $result;
            }
            
        }

    }