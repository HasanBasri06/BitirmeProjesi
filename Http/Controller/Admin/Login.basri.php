<?php

    session_start();
    ob_start();

    include "../../Config/Database.php";

    class Login extends Database{

        public function login($name, $pass){
            
            $str = "SELECT * FROM admins WHERE name = ? AND password = ?";
            $qry = $this->conn()->prepare($str);

            $qry->execute([$name, $pass]);

            $row = $qry->fetch(PDO::FETCH_ASSOC); 

            if(!$row){
                // buraya birşey yazılmayacak
            }
            else{

                if($row["duty"] == "admin"){
                    $_SESSION["ADMIN"] = $name;
                    header("Location: ../../Views/Admin/Admin.php");
                }
                elseif($row["duty"] == "modarator"){
                    $_SESSION["MODARATOR"] = $name;
                    header("Location: ../../Views/Admin/Admin.php");
                }
                elseif($row["duty"] == "editor"){
                    $_SESSION["EDITOR"] = $name;
                    header("Location: ../../Views/Admin/Admin.php");
                }
                
            }
            

        }

    } 
