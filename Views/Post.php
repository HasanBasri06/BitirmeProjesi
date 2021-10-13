<?php

    include "../Autoloader.php";
    include "../Config/Includes/Header.php";
    include "../Config/Functions.php";
    
    
    $get_id = isset($_GET["id"]) ? $_GET["id"] : null;
    $like   = isset($_GET["like"]) ? $_GET["like"] : null;


    $Post           = new Post();

    
    
    $single_post    = $Post->single_post($get_id);
    $Categories     = $Post->categories();
    $Session = isset($_SESSION["USER_LOGIN"]) ? $_SESSION["USER_LOGIN"] : null;
    
    $userName = $Post->user($Session);
    
    
    $Posts      = $Post->Posts($get_id);
    $categId    = $Posts["category_id"];

    
    
    
    @$userID = $userName["id"];
    

    if(isset($_SESSION["USER_LOGIN"])):
        $Post->view($get_id, $userID);
    endif;
    

    
    if(isset($_POST["submit-commit"])){
        $anonim     = isset($_POST["anonim"]) ? $_POST["anonim"] : null;
        $name       = isset($_SESSION["USER_LOGIN"]) ? $_SESSION["USER_LOGIN"] : null;
        $message    = isset($_POST["message"]) ? $_POST["message"] : null;


        $addMessage = $Post->addMessage($get_id, $userID, $name, $anonim, inputSecurity($message));
        echo $addMessage;
    }

    $allComment = $Post->allComments($get_id);
            
    if(isset($like)){
        $Post->liked($get_id, $like, $userID, $categId);
    }
    

?>   

    <div class="container bg-light mt-1 mb-1">

        <div class="row">
            <div class="col-md-9">

                <!-- post alanı template -->

                <h2>
                    <?= $single_post["post_name"]; ?>
                </h2>
                
                <img src="<?= "{$root_url}Config/Includes/images/$single_post[post_image]" ?>" class="img-fluid w-100" alt="">

                <p class="fs-5 mt-3">
                    <?= $single_post["post_text"]; ?>
                </p>

                <?php if(isset($_SESSION["USER_LOGIN"])): ?>

                    <div class="col">
                        <label class="label-form text-warning">Haber ile ilgili düşüncelerin?</label><br>
                        
                        <br>

                        <a href="./Post.php?id=<?= $get_id; ?>&like=on">
                            <button class="btn btn-outline-success w-25">
                                <i class="fas fa-thumbs-up"></i>
                            </button>
                        </a>
                        &nbsp;

                        <a href="./Post.php?id=<?= $get_id; ?>&like=off">
                            <button class="btn btn-outline-danger w-25">
                                <i class="fas fa-thumbs-down"></i>
                            </button>
                        </a>
                    </div>
                <?php else: ?>
                        <label class="label-form text-warning">Haber ile ilgili bir görüş belirtmek için giriş yapmanız gerekir.</label><br>
                <?php endif; ?>

                <hr>

                <div class="col mt-3">
                    <h4 class="text-muted">Yorumlar</h4>
                <?php foreach($allComment as $comment): ?>
                    <div class="row">
                        <div class="col ps-5">
                            <h6><?= $comment["user_name"]; ?></h6>
                            <p class="ps-2">
                                <?= $comment["comment"]; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach;?>
                    

                    <div class="col mt-3">
                        <form action="./Post.php?id=<?= $get_id; ?>" method="post">

                            <div class="row">
                                <div class="col">
                                    <?php 

                                        if(isset($_SESSION["USER_LOGIN"])){
                                            
                                    ?>
                                    <label class="form-control">
                                    <?php
                                            echo $_SESSION["USER_LOGIN"];
                                        }

                                    else{
                                                echo "<div class='text-muted'>Yorumunuz anonim olarak gönderilir, isim belirtmek için kayıt olmanız gerekir</div>";
                                            }
                                        
                                        ?>
                                    </label>

                                    <?php 
                                        if(isset($_SESSION["USER_LOGIN"])):
                                            echo <<<OP
                                                <input type='checkbox' name='anonim' />İsim belirtmek istemiyorum
                                            OP;
                                        endif;    
                                    ?>

                                </div>
                            </div>
                            <div class="col mt-1">
                                <textarea name="message" class="form-control" style="max-height:150px; min-height:100px" cols="10" rows="10"></textarea>
                            </div>

                            <div class="col mt-2">
                                <button class="btn btn-outline-info" name="submit-commit" id="submit_commit">
                                    Yorumu Gönder
                                    <i class="fas fa-share"></i>
                                </button>
                            </div>

                            <?php 

                                    if(isset($_POST["submit-commit"])):
                                        echo <<<SCRIPT
                                            <script>
                                                let submit_commit = document.getElementById('submit_commit');
                                                submit_commit.addEventListener('submit', (e) => {
                                                    e.preventDefault();
                                                });
                                            </script>
                                        SCRIPT;
                                    endif;

                            ?>


                        </form>
                    </div>


                </div>

            </div>
            <div class="col-md-3">
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
