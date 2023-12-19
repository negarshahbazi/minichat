<?php
require_once('./connexion.php');
$request = $database->query('SELECT * FROM user ');
$user = $request->fetchAll();
// var_dump($user);
?>
<?php
require_once('./connexion.php');
$request = $database->query('SELECT * FROM `message` INNER JOIN user ON `message`.user_id = user.id');
$messageUser = $request->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="style.css" href="./style.css">
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
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Users</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
           <?php foreach($user as $use1){?>
            <?php if(!isset($use1['pseudo']))?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"><?php echo $use1['pseudo']?></a>
            </li>
            <?php } ?>
          </ul>

        </div>
      </div>
    </div>
  </nav><br><br><br>
  <div class="content mt-5 ">
    <ul class="list-unstyled">
      <?php foreach ($messageUser as $content) { ?>
        <div class="container">
          <li class="media">
            <div class="row m-2" >
            <div class="col-1 border text-center bg-danger-subtle btn " >
            <?php echo $content['pseudo'] ?>
            </div>
            <div class="col-11 border border-danger rounded-3 " >
            <p> <?php echo $content['content'] ?> </p>
            </div>
            </div>
          </li>
        </div>
      <?php } ?>
    </ul>
  </div>
  <div class="d-flex justify-content-center align-items-center saisir mt-5">
    <form action="./verifier.user.php" method="post" class="card">
      <input type="text" name="pseudo" placeholder="Pseudo :" class=" mb-0">
      <input type="text" name="message" placeholder="message :" class="myMessage ">
      <button type="submit">send</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>