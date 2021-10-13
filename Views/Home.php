<?php

    include "../Autoloader.php";
    include "../Config/Includes/Header.php";

    $Home       = new Home();
    $Item       = $Home->posts();
    $Categories = $Home->categories();

    switch($Categories):
        case "Spor";
            $cat = "Spor";
        break;

        case "Magazin";
            $cat = "Magazin";
        break;

        case "Finans";
            $cat = "Finans";
        break;

        case "Oyun";
            $cat = "spor";
        break;
    endswitch;

    
 ?>   

    <div class="container bg-light mt-1 mb-1">

        <div class="row">
            

            <div class="col-md-8 ">
                <!-- 
                    haber postu için azırlanmış bootstrap card yapısı,
                    post görüntü başlangıç 
                -->
                
            <?php foreach($Item as $item): ?>
                <!-- 
                    1. Spor,
                    2. Magazin,
                    3. Finans,
                    4. Oyun
                 -->

                <?php 
                    switch ($item["category_id"]) {
                        case '1':
                            $class = "bg-warning text-center br-2 rounded text-light";
                            $cat = "Yazılım";
                            break;
                            
                        case '2':
                            $class = "bg-secondary text-center br-2 rounded text-light";
                            $cat = "Magazin";
                            break;

                        case '3':
                            $class = "bg-primary text-center br-2 rounded text-light";
                            $cat = "Finans";
                            break;
                            
                        case '4':
                            $class = "bg-success text-center br-2 rounded text-light";
                            $cat = "Oyun";
                            break; 
                    } 

                    
                ?>

                <div class="card post" style="width: 100%;">
                    <h2>
                        <?= $item["name"]; ?>
                    </h2>
                        <img src="../Config/Includes/images/<?= $item["image"]; ?>" class="card-img-top">
                        <div class="category-box <?= $class; ?>"><?= $cat; ?></div>

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



            </div>




            <!-- Post görüntü son -->





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
