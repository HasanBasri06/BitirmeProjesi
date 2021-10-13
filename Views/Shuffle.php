<?php

    include "../Autoloader.php";
    include "../Config/Includes/Header.php";


    $Shuffle    = new Shuffle;
    $Categories = $Shuffle->categories();

    $User = $Shuffle->User($_SESSION["USER_LOGIN"]);

    
    $Disc = $Shuffle->Shuffle($User);


?>   

    <div class="container bg-light mt-1 mb-1">

        <h2 class="text-warning">Sizin için seçtiklerimiz</h2>

        <hr>

        <div class="row">
            

            <div class="col-md-8 ">
                <!-- 
                    haber postu için azırlanmış bootstrap card yapısı,
                    post görüntü başlangıç 
                -->
            <?php if(!$Disc){
                echo  '
                <div class="alert alert-success container " role="alert">
                    <h4 class="alert-heading">Hay Aksi! :\'(</h4>
                    <p>Üzgünüm Sana Uygun Haber Bulamadık... Görünüşe göre hiçbir haberlerimizden haberdar değilsin, senin için üzüldüm, Hemen <a href="../Views/Home.php" class="alert-link">Anasayfa</a>\' ya gidip yeni haberler keşfedebilirsin :)</p>
                </div>
            ';
            }
            else{
            ?>
            <?php foreach($Disc as $item): ?>

                <div class="card post" style="width: 100%;">
                    <h2>
                        <?= $item["name"]; ?>
                    </h2>
                        <img src="../Config/Includes/images/<?= $item["image"]; ?>" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">
                            <?= substr($item["text"], 0, 200) . " ..."; ?>
                        </p>
                        <a href="./Post.php?id=<?=$item["id"]; ?>">
                            <div class="btn btn-outline-info">
                                Detay...
                            </div>
                        </a>
                    </div>
                </div>
                <hr>

            <?php endforeach; ?>

            <?php            
            }
            ?>



            </div>



            <div class="col-md-4">
                <div class="row mx-auto" style="width:95%">

                <ul class="list-group list-group-flush mt-2">
                    <li class="list-group-item bg-warning text-light">Katagoriler</li>
                    
                <?php foreach($Categories as $cate): ?>
                    <li class="list-group-item"><?= $cate["name"]; ?></li>
                <?php endforeach; ?>
                </ul>

                </div>
            </div>





        

        </div>


    </div>
    
<?php 
    include "../Config/Includes/Footer.php";
