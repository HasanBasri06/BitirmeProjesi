<?php


    include "../Config/Database.php";

    class Account extends Database{

        public function allUser($session_id){
            $str = "SELECT * FROM users WHERE userName = ?";
            $qry = $this->conn()->prepare($str);
            $qry->execute([$session_id]);

            $user = $qry->fetch(PDO::FETCH_ASSOC);

            $Data = [
                "id" => $user["id"],
                "name" => $user["userName"],
                "pass" => $user["userPass"],
                "is_delete" => $user["is_delete"],
                "created_at" => $user["created_at"],
                "updated_at" => $user["updated_at"],
            ];

            return $Data;

        }

        // id ye göre kullanıcı sorgulama methodu
        private static function is_have($value){

            if($value):
                echo <<<HU
                    <div class="alert alert-info container mt-2" role="alert">
                        Oturum Sonlandırılıyor...
                    </div>
                HU;          

            elseif($value === false):
                echo <<<DU
                    <div class="alert alert-warning alert-dismissible fade show container mt-2" role="alert">
                        Böyle Bir Kullanıcı Yok
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                DU;
            endif;

        }

        public static function passSec($value){
            $pass = $value;
            $passLength = strlen($pass);

            return "øøøøøøøøøøø";

           
            
        }

        public static function accountsetting($post_id, $userID, $name, $pass, $created_at, $updated_at){
            
            $form = '
                <form action="./Account.php?accountsetting='.$userID.'"  method="post">
                    <input type="hidden" name="accountconfirm" value="onay">
                    <h2>Hesap Ayarları</h2>
                    <div class="col mt-2">
                        <label class="label-form">İsim / Soyisim</label>
                        <label class="form-control">'.$name.'</label>
                    </div>

                    <div class="col mt-2">
                        <label class="label-form">Şifre</label>
                        <label class="form-control">*********</label>
                    </div>

                    <div class="col mt-2">
                        <label class="label-form">Kayıt Tarihi</label>
                        <label class="form-control">'.$created_at.' tarihinde kayıt olundu</label>
                    </div>

                    <div class="col mt-2">
                        <button class="btn btn-outline-danger">
                            Hesabımı Sil
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </form>
            '; 

            return $form;
            
        }

        
        public function deleteAccount($userID){

        //SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo failed: Bilinen böyle bir ana bilgisayar yok. : Sorunu aldım ve uzun araştırmam sonucu çözemedim o yüzden bu yönteme başvurdum
        
            try{
                $db = new PDO("mysql:host=localhost;dbname=news", "root", "");
            }
            catch(PDOException $e){
                die("Sorun");
            }    

            $qry = $db->prepare("UPDATE users SET is_delete = ? WHERE id = ?");
            

            if($qry->execute(["1", $userID])){
                echo '
                    <div class="alert alert-secondary mt-2 container" role="alert">
                        Hesabınız işleme alındı, yakın zamanda hesabınız silinecektir.
                    </div>
                ';
            }
            

        }

        public function commit($user_id){

        
            
        //SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo failed: Bilinen böyle bir ana bilgisayar yok. : Sorunu aldım ve uzun araştırmam sonucu çözemedim o yüzden bu yönteme başvurdum
            try{
                $db = new PDO("mysql:host=localhost;dbname=news", "root", "");
            }
            catch(PDOException $e){
                die("Sorun");
            }

            $qry = $db->prepare("SELECT comment FROM comments WHERE user_id = ?");
            $qry->execute([$user_id]);

            $result = $qry->fetchAll(PDO::FETCH_ASSOC);

            foreach($result as $item):
                
                $form = '
                    <div class="row mt-2">
                        <div class="col">
                            <label class="label-form">Yorumunuz</label> 
                            <label class="form-control">'.$item["comment"].'</label>                   
                        </div>
                    </div>
                ';

                echo $form;
            endforeach;



            


        }

        public function viewnews($userID){

            //SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo failed: Bilinen böyle bir ana bilgisayar yok. : Sorunu aldım ve uzun araştırmam sonucu çözemedim o yüzden bu yönteme başvurdum
            try{
                $db = new PDO("mysql:host=localhost;dbname=news", "root", "");
            }
            catch(PDOException $e){
                die("Sorun");
            }
            
            $qry = $db->prepare("SELECT * FROM view_ip WHERE user_id = ?");
            $qry->execute([$userID]);

            $view = $qry->fetchAll(PDO::FETCH_ASSOC);


            if($qry){

                $qry2 = $db->prepare("SELECT * FROM view_ip INNER JOIN posts ON posts.id = view_ip.post_id WHERE user_id = ?");
                $qry2->execute([$userID]);

                $view = $qry2->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($view as $name){
                    
                    echo "
                        <label class='form-control mt-2'>
                           <b> Haber Başlığı : </b>$name[name]
                        </label>
                    ";

                }
                

            }
            else{

            }

        }


        public function accountPage($value, $id, $userID, $name, $pass, $created_at, $updated_at){

            $post_id = $id;


            if($value == "accountsetting"):

                echo $this->accountsetting($post_id, $userID, $name, $pass, $created_at, $updated_at);

            elseif($value == "commit"):

                print_r($this->commit($userID));

            elseif($value == "viewnews"):

                echo $this->viewnews($userID);

            endif;
            

        }


        // oturum sonlandırma methodu

        public function logout($id){
            
            $is_user_id = "SELECT * FROM users WHERE id = ?";
            $qry        = $this->conn()->prepare($is_user_id); 
            $qry->execute([$id]);
            $is_have    = $qry->fetch();

            self::is_have($is_have);


            unset($_SESSION['USER_LOGIN']);
            session_destroy();
            ob_flush();
            header("Refresh:2; url=../Views/Home.php");


        }

    }