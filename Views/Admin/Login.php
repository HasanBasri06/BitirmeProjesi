<?php
    
    include "./Autoloader.php";

    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $pass = isset($_POST["pass"]) ? $_POST["pass"] : null;
  
    $Login = new Login;
    $Login->login($name, $pass);
 

?>
<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Yönetici Paneli</title>
  </head>
  <body class="bg-dark text-light">


    <div class="container mt-5 w-50">
        <form action="./Login.php" method="post">

            <h2 class="text-center">Yönetici Giriş Paneli</h2>

            <div class="mb-3 mt-4">
                <label class="label-form ps-3">Yönetici Adı</label>
                <input type="text" name="name" class="form-control mt-2" placeholder="Lütfen isminizi giriniz">
            </div>

            <div class="mb-3 mt-2">
                <label class="label-form ps-3">Şifreniz</label>
                <input type="password" name="pass" class="form-control mt-2" placeholder="Lütfen şifrenizi giriniz">
            </div>

            <div class="mb-3 mt-2">
                <button class="btn btn-outline-primary">
                    Giriş Yap
                </button>
            </div>

        </form>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>