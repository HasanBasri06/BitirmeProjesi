<?php

    include "../Config/Database.php";
    include "../Config/Functions.php";

    

    class Login extends Database{

        
        public function login($name, $pass){

            if( (!$name=="") and (!$pass=="") ){

                $str    = "SELECT * FROM users WHERE userName = ? && userPass = ?";
                $qry    = $this->conn()->prepare($str);
                $qry->execute([inputSecurity($name), inputSecurity($pass)]);

                $result = $qry->fetch(PDO::FETCH_ASSOC);

                if(empty($result)):
                    echo <<<LOGIN

                    <div class="alert alert-danger container mt-2" role="alert">
                        Kullanıcı adı veya şifre yanlış
                    </div>
                    LOGIN;
                else:
                    
                    echo <<<LOGIN

                    <div class="alert alert-success container mt-2" role="alert">
                        Giriş Başarılı. Yönlendiriliyorsunuz...
                    </div>
                    LOGIN;
                    
                    $_SESSION["USER_LOGIN"] = $result["userName"];
                    setcookie("USER_DATA", $result["userName"], 86400);


                    header("Refresh:2; url=../Views/Account.php");
                endif;

            }
            else{
                echo <<<EOL
                    <div class="alert alert-danger container mt-2" role="alert">
                        Lütfen Boş Alan Bırakmayınız!
                    </div>
                EOL;
            }
           
            



            
           
            
        }

    }

    