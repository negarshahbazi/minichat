<?php
header('refresh: 3; url=index.php');
require_once('./connexion.php');
$request = $database->query('SELECT * FROM user ');
$user = $request->fetchAll();
// var_dump($user);
?>
<?php
require_once('./connexion.php');
$request = $database->query('SELECT * FROM `message` INNER JOIN user ON `message`.user_id = user.id ');
$messageUser = $request->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>mini-chat</title>
</head>
<body>
  <nav class="navbar bg-danger fixed-top mb-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MINI_CHAT</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header bg-danger">
          <h5 class="offcanvas-title fs3" id="offcanvasNavbarLabel">Users</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body   mypic ">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 ">
           <?php foreach($user as $use1){?>
            <?php if(!isset($use1['pseudo']))?>
            <li class="nav-item ">
              <a class="nav-link  btn border  bg-danger  fs-5 lh-s m-1" aria-current="page" href="#"><?php echo $use1['pseudo']?></a>
            </li>
            <?php } ?>
          </ul>

        </div>
      </div>
    </div>
  </nav><br><br><br>


  <div class="content mt-5 myBody container-fluid">

    <ul class="list-unstyled boite-dialogue">
      <?php foreach ($messageUser as $content) { ?>
        <div class="container">
          <li class="media">
            <div class="row m-2 " >
            <div class="col-1 border text-center bg-danger-subtle btn btn-shadow rounded-pill" >
          <p class=""><?php echo $content['pseudo'] ?></p>
            </div>
            <div class="col-1 border border-danger rounded-3 text-white my_auto datetime shadow rounded-pill " >
            
            <p class="  datetime my-auto"> <?php echo $content['created_at']  ?> </p>
            </div>
            <div class="col-10 border border-danger rounded-3 bg-light d-flex align-items-center" >
            <p> <?php echo $content['content']  ?> </p>
            
            </div>
           
            </div>
          </li>
        </div>
      <?php } ?>
    </ul>
  </div>
  <div class="d-flex justify-content-center align-items-center saisir mt-5">
    <form action="./verifier.user.php" method="post" class="">
      <div class="row  card bg-warning p-2 ">
      <div class="">
      <input type="text" name="pseudo" placeholder="Pseudo :" class="">
      </div>
      <div class=" pt-2 ">
       
      <input type="text" name="message" placeholder="message :" class="">
      </div>
      <div class="text-center pt-3">
      <button type="submit" class=" text-center hover btn btn-outline-danger " >send</button>
      </div>
      </div>
    </form>
    
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>
</html>