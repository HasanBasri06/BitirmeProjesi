<?php 

    include "../Autoloader.php";
    include "../Config/Includes/Header.php";
    include "../Config/Functions.php";

    if($_SESSION["USER_LOGIN"]):

    //include "../Config/Database.php";
    
    $Account = new Account();
    $allUser = $Account->allUser($_SESSION["USER_LOGIN"]);
    
    $userID         = $allUser["id"];
    $name           = $allUser["name"];
    $pass           = $allUser["pass"];
    $created_at     = $allUser["created_at"];
    $updated_at     = $allUser["updated_at"];
    
    if(isset($_GET["cikis"])){
        $cikis = $_GET["cikis"];
        $Account->logout($cikis);
    }
    else{
        $cikis = null;
    }
    
    $Account = new Account($userID);
    

    if(isset($_POST["accountconfirm"])){
        $Account->deleteAccount($userID);
    }


    
    


?>
    
        <div class="container mt-2 mb-2">
            
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group user_nav">
                        <a href="./Account.php?accountsetting=<?= $userID; ?>">
                            <li class="list-group-item">
                                <img src="<?= $root_url . "Config/Includes/images/icon/sliders.svg"; ?>" alt="" width="20">
                                Hesap Ayarları
                            </li>
                        </a>
                        <a href="./Account.php?commit=<?= $userID; ?>">
                            <li class="list-group-item">
                                <img src="<?= $root_url . "Config/Includes/images/icon/message.svg"; ?>" alt="" width="20">
                                Yorumlarım
                            </li>
                        </a>
                        <a href="./Account.php?viewnews=<?= $userID; ?>">
                            <li class="list-group-item">
                                <img src="<?=$root_url . "Config/Includes/images/icon/eye.svg" ?>" width="20">
                                Okunan Haberler
                            </li>
                        </a>
                        <a href="./Account.php?cikis=<?= $userID; ?>">
                            <li class="list-group-item text-danger">
                                Çıkış Yap &nbsp;
                                <i class="fas fa-sign-out-alt"></i>
                            </li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-9">

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Hoşgeldiniz</h4>
                    <p>Burası sizin hesap ile ilgili ayarlarınızı ve gözlemlerinizi izleyeceğiniz bölümdür.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                    <?php 

                        if(isset($_GET)):
                            $get = $_GET;
                            $key = array_key_first($get);
                            @$val = $get[$key];
                            

                            $accountPage = $Account->accountPage($key, $val, $userID, $name, $pass, $created_at, $updated_at);



                        endif;
                        
                        
                        
                        


                    ?>

                    

                </div>
            </div>

        </div>

<?php 

    else:

        header("Location: ./Login.php");
        exit();

    endif;

    include "../Config/Includes/Footer.php";
?>