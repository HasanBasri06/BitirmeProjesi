<?php 

    session_start();
    ob_start();


    if(isset($_SESSION["ADMIN"]) or isset($_SESSION["MODARATOR"]) or isset($_SERVER["EDITOR"]) ):

    include "./Autoloader.php";

    $Admin = new Admin;

    $dutySetting    = $Admin->dutySetting();
    $deleteAccount  = $Admin->deleteAccount();
    $allComment     = $Admin->allComment();
    $postDetails    = $Admin->postDetails();
    $allPost        = $Admin->allPost();
    $allCategory    = $Admin->allCategory();
    
    if(isset($_GET["delete"])){
        $deleteId = $_GET["delete"];
        $Admin->deleteUser($deleteId);
    }
    else{
        $deleteId = "";
    }

    if(isset($_GET["commdelete"])){
        $deleteId = $_GET["commdelete"];
        $Admin->deleteComment($deleteId);
    }
    else{
        $deleteId = "";
    }


    if(isset($_GET["postdelete"])){
        $deleteId = $_GET["postdelete"];
        $Admin->deletePost($deleteId);
    }
    else{
        $deleteId = "";
    }

    if(isset($_GET["postconfirm"])){
        $deleteId = $_GET["postconfirm"];
        $Admin->confirmPost($deleteId);
    }
    else{
        $deleteId = "";
    }

    $file       = isset($_FILES["file"]) ? $_FILES["file"] : null;
    $head       = isset($_POST["head"]) ? $_POST["head"] : null;
    $content    = isset($_POST["content"]) ? $_POST["content"] : null;
    $category   = isset($_POST["category"]) ? $_POST["category"] : null;


    if(isset($_POST["addPostInp"])){
        $addPost = $Admin->addPost($file, $head, $content, $category);
    }
    else{
        $addPost = "";
    }


    if(isset($_SESSION["ADMIN"])):
        $session = $_SESSION["ADMIN"];
    elseif(isset($_SESSION["MODARATOR"])):
        $session = $_SESSION["MODARATOR"];
    elseif(isset($_SESSION["EDITOR"])):
        $session = $_SESSION["EDITOR"];
    endif;


    if($_GET["page"] == "lo"){
        unset($session);
        session_destroy();
    }
    
    

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        nav{
            height: 100vh;
        }
        .list-group-item{
            margin-top: 15px;
            background: none;
            border: none;
        }
        a{
            text-decoration: none;
            color: white;
        }
        .box{
            width: 100%;
            background-color: #37474F;
            border-radius: 10px;
        }
    </style>
    
</head>
<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-dark  border-end">
                <nav>
                    <ul class="list-group">
                        <?php if(isset($_SESSION["ADMIN"])): ?>
                            <li class="list-group-item">
                                <a href="Admin.php?page=asy">
                                    Alt Seviye Yönetimi
                                </a>
                            </li>
                            <li class="list-group-item">
                            <a href="Admin.php?page=he">
                                Log Takibi
                                <!-- admin -->
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="list-group-item">
                            <a href="Admin.php?page=hs">
                                Hesap Silme 
                                <!-- modaratör admin -->
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="Admin.php?page=yi">
                                Yorum İnceleme
                                <!-- modaratör admin -->
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="Admin.php?page=hyi">
                                Haber Yönetim İşlemleri
                                <!-- modaratör admin -->
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="Admin.php?page=he">
                                Haber Ekleme
                                <!-- modaratör admin editör -->
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="Admin.php?page=lo" class="text-danger">
                                Çıkış Yap
                                <!-- modaratör admin editör -->
                            </a>
                        </li>

                        
                    </ul>
                </nav>
            </div>

            <div class="col-md-9 bg-dark">
                <div class="container ps-5 mt-2">
                    
                
                    <div class="box text-light p-2">

                            
                    <?php       
                                if(!isset($_GET["page"])){
                                    echo "Hoşgeldiniz";    
                                }
                                elseif($_GET["page"] == "asy"){
                                    
                                    $sayi = 0;
                                foreach($dutySetting as $item):
                                    
                                    if($item["duty"] == "modarator"){
                    ?>
                                    <form action="./Admin.php" class="mt-4" method="post">
                                        <label for="duty" class="label-form text-muted">
                                            <?= ucfirst($item["name"]) . " - görevi : " . $item["duty"]; ?>
                                        </label>
                                    
                                        <select name="changeDuty" id="" class="form-select">
                                            <option value="<?= $sayi++; ?>">
                                                Editör
                                            </option>
                                        </select>
                                        <button class="btn btn-outline-success mt-2">Değiştir</button>
                                    </form>
                    <?php
                                    }
                                    elseif($item["duty"] == "editor"){
                    ?>
                                        <form action="./Admin.php" class="mt-4" method="post">
                                            <label for="duty" class="label-form text-muted">
                                                <?= ucfirst($item["name"]) . " - görevi : " . $item["duty"]; ?>
                                            </label>
                                        
                                            <select name="changeDuty" id="" class="form-select">
                                                <option value="<?= $sayi++; ?>">
                                                    Modaratör
                                                </option>
                                            </select>

                                            <button class="btn btn-outline-success mt-2">Değiştir</button>
                                        </form>
                    <?php
                                    }
                                endforeach;
                                
                 

                                }
                                elseif($_GET["page"] == "hs"){
                    ?>
                            <form action="./Admin.php" class="mt-4" method="post">
                                <?php foreach($deleteAccount as $item): ?>
                                        <label class="label-form text-muted w-75">
                                            <?= ucfirst($item["userName"]); ?>
                                        </label>
                                        <a href="./Admin.php?page=hs&delete=<?= $item["id"] ?>" class="text-danger">Sil</a>
                                        <hr>
                                <?php endforeach; ?>
                            </form>
                    <?php
                                }
                                elseif($_GET["page"] == "yi"){

                     ?>
                            <form action="./Admin.php" class="mt-4" method="post">
                                <?php foreach($allComment as $item): ?>
                                        <label class="label-form text-muted w-75">
                                            <?= "<b>" . ucfirst($item["user_name"]) . "<b> : " . $item["comment"]; ?>
                                        </label>
                                        <a href="./Admin.php?page=yi&commdelete=<?= $item["id"] ?>" class="text-danger">Sil</a>
                                        <hr>
                                <?php endforeach; ?>
                            </form>
                    <?php

                                }
                                elseif($_GET["page"] == "hyi"){
                    ?>

                            <form action="./Admin.php" method="post">
                    <?php foreach($allPost as $items): ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../../Config/Includes/images/<?= $items["image"]; ?>" class="img-fluid w-25" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <label><?= $items["name"]; ?></label>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="./Admin.php?page=hyi&postdelete=<?= $items["id"]; ?>" class="text-danger">
                                            Sil
                                        </a>
                                        <a href="./Admin.php?page=hyi&postconfirm=<?= $items["id"]; ?>" class="text-success">
                                            Onayla
                                        </a>
                                    </div>
                                </div>
                                <hr>

                            </form>
                        <?php endforeach; ?>

                    <?php
                                }
                                elseif($_GET["page"] == "he"){
                    ?>

                        <form action="./Admin.php?page=he" method="Post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Resim :</label>
                                <input type="file" class="form-control" name="file">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Başlık :</label>
                                <input type="text" class="form-control" name="head">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">İçerik :</label>
                                <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Kategori</label>


                                <select name="category" class="form-select" id="">
                                    <?php 
                                    $sayi = 0;
                                    foreach($allCategory as $item): 
                                    
                                    ?>
                                        <option value="<?= ++$sayi; ?>">
                                            <?= $item["name"]; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>



                            </div>

                            <div class="mb-3">
                                <input type="submit" name="addPostInp" class="btn btn-outline-info"  name="file" value="Haber Ekle">
                            </div>

                        </form>

                    <?php
                                }
                    ?>
                                
                              

                    </div>


                </div>
            </div>
        </div>
    </div>

    
</body>
</html>

<?php

    else:
        header("Location: ../Home.php");
    endif;



    