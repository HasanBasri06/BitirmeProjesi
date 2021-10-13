<?php 

  require __DIR__ . "../config.php";

  session_start();
  ob_start();

  


?>
<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?= $root_url; ?>/Config/Includes/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= $root_url; ?>/Config/Includes/css/style.css">

    <title>Basri - Haber Blog</title>
    <script src="https://kit.fontawesome.com/c400c00162.js" crossorigin="anonymous"></script>
  </head>
  <body>

      <div class="top-header"></div>
      <nav class="d-flex justify-content-between">
        <div class="logo">
          Basri<span class="btn-warning text-light ps-2 pe-2 fs-5">News</span>
        </div>

        <ul class="navbar-ul d-flex text-dark">
          <li>
            <a href="<?=$root_url . "Views/Home.php"; ?>" class="text-dark">
              Anasayfa
              <i class="fas fa-home"></i>
            </a>
          </li>
          <?php if(isset($_SESSION["USER_LOGIN"])): ?>
          <li>
            <a href="<?=$root_url . "Views/Shuffle.php"; ?>" class="text-dark">
              Keşfet
              <i class="fas fa-random"></i>
            </a>
          </li>
          <?php endif; ?>

          <?php if(isset($_SESSION["USER_LOGIN"])): ?>
          <li>
            <a href="<?=$root_url . "Views/Account.php"; ?>" class="text-dark">
              <?= ucfirst($_SESSION["USER_LOGIN"]); ?>
              <i class="fas fa-user"></i>
            </a>
          </li>

          <?php
            else:
          ?>
          <li>
            <a href="<?=$root_url . "Views/Login.php"; ?>" class="text-dark">
              Giriş Yap
              <i class="fas fa-user"></i>
            </a>
          </li>    
          <?php        
            endif; 
          ?>
        </ul>
      </nav>

  


   