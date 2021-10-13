<?php 

    include "../../Config/Database.php";

    class Admin extends Database implements IManageAdmin{

        public function allUSer(){
            $str = "SELECT * FROM users";
            $qry = $this->conn()->prepare($str);

            $qry->execute();

            $row = $qry->fetchAll(PDO::FETCH_ASSOC);

            return $row;

        }

        public function allCategory(){
            $str = "SELECT * FROM category";
            $qry = $this->conn()->prepare($str);

            $qry->execute();

            $row = $qry->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }

        public function allPost(){
            $str = "SELECT * FROM posts WHERE is_active = ?";
            $qry = $this->conn()->prepare($str);

            $qry->execute(["0"]);

            $row = $qry->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }

        public function deletePost($postId){
            $str = "DELETE FROM posts WHERE id = ?";
            $qry = $this->conn()->prepare($str);

            $qry->execute([$postId]);
        }

        public function deleteUsers(){
            $str = "SELECT * FROM users WHERE is_delete = ?";
            $qry = $this->conn()->prepare($str);

            $qry->execute(["1"]);

            $row = $qry->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
        
        public function allAdmin(){
            $str = "SELECT * FROM admins";
            $qry = $this->conn()->prepare($str);

            $qry->execute();

            $row = $qry->fetchAll(PDO::FETCH_ASSOC);

            return $row;

        }

        public function confirmPost($postID){
            $str = "UPDATE posts SET is_active = ? WHERE id = ?";
            $qry = $this->conn()->prepare($str);

            $qry->execute(["1", $postID]);

            $row = $qry->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }

        public function dutySetting(){
            $allAdmin = $this->allAdmin();

            return $allAdmin;

        }

        public function deleteAccount(){
            $row = $this->deleteUsers();

            return $row;
        }

        public function deleteUser($userID){
            $str = "DELETE FROM users WHERE id = ?";
            $qry = $this->conn()->prepare($str);

            $qry->execute([$userID]);

        }

        public function allComment(){
            $str = "SELECT * FROM comments";
            $qry = $this->conn()->prepare($str);

            $qry->execute();
            $row = $qry->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }

        public function deleteComment($value){
            $str = "DELETE FROM comments WHERE id = ?";
            $qry = $this->conn()->prepare($str);

            $qry->execute([$value]);
        }
        public function postDetails(){

        }

        public function addPost($file, $head, $content, $category){

       
            // Array ( [name] => asd.png [type] => image/png [tmp_name] => C:\xampp\tmp\php676A.tmp [error] => 0 [size] => 83796 )

            if(!$file == "" and !$head == "" and !$content == ""){

                if($file["type"] == "image/png" or $file["type"] == "image/jpg" or $file["type"] == "image/jpeg"){

                        $dosya = "C:/xampp/htdocs/Basri/Config/Includes/images/";

                        $sonYol = $dosya.$file["name"];

                        if(move_uploaded_file($file["tmp_name"], $sonYol)){
                            
                        };
                    
                    $str = "INSERT INTO posts (name, image, text, is_active, category_id) VALUES (?, ?, ?, ?, ?)";
                    $qry = $this->conn()->prepare($str);

                    $qry->execute([$head, $file["name"], $content, "0", $category]);

                    if($qry){
                        echo "
                            <script>
                                alert('Haber Eklendi');
                            </script>
                     ";

                    }
                    else{
                        echo "
                            <script>
                                alert('Bir Hata Oluştu');
                            </script>
                        ";
                    }

                }
                else{
                    echo "
                            <script>
                                alert('Dosya uzantınız \'JPG, PNG\' olmalıdır');
                            </script>
                        ";
                }

            }
            else{
                echo "
                    <script>
                        alert('LütfenBoş Alan Bırakmayınız!');
                    </script>
                ";
            }

            
            


        }



    }