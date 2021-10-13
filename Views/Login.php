<?php

    include "../Autoloader.php";
    include "../Config/Includes/Header.php";

    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $pass = isset($_POST["pass"]) ? $_POST["pass"] : null;
    

    if(isset($_POST["login_control"])){
        $Login = new Login();
        $des = $Login->login($name, $pass);

        print_r($des);
    }


 ?>   

    <div class="container bg-light">

        
        <div class="box">
            <form action="./Login.php" method="POST">
                <h3 class="text-center">Giriş Yap</h3>
                <div class="col">
                    <label class="label-form mt-3">İsim</label>
                    <input type="text" name="name" autocomplete="off" class="form-control mt-3" placeholder="Lütfen isim giriniz...">
                </div>

                <div class="col mt-2">
                    <label class="label-form mt-3">Şifre</label>
                    <input type="password" name="pass" class="form-control mt-3" placeholder="Lütfen şifrenizi giriniz...">
                </div>

                <div class="col mt-3">
                    <button class="btn btn-primary" name="login_control">
                        Giriş Yap
                    </button>
                </div>
            </form>
        </div>

        <br><br>
    <br><br>
    <br><br>
    <br><br>
    </div>
    
    
    
<?php 
    include "../Config/Includes/Footer.php";
