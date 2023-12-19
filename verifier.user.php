
<?php

require_once('./connexion.php');
$hourdiff = 0; // Replace the 0 with your timezone difference (;
$date = date("Y-m-d H:i:s",time() + ($hourdiff * 3600));
// tu fais ton cookie ici qui va récupérer le pseudo ici

// var_dump($date);
// die();
if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['message']) && !empty($_POST['message'])) {
    setcookie("pseudo", $_POST['pseudo'], time()+864000);

    // FIND IF pseudo already exist and if it exist don't insert it in my database Search if pseudo exist but in 
    // my Database SELECT + WHERE
    $pseudo=$_POST['pseudo'];
    $request = $database->query("SELECT * FROM user WHERE pseudo = '$pseudo'");
    $data = $request->fetch(); 
    if ($data['pseudo'] === $_POST['pseudo'] ) {
        // DONT INSERT IF IT FIND A PSEUDO AND A USER GET HIS ID;
        $lastId = $data['id']; // DONT INSERT IF IT FIND A PSEUDO AND A USER GET HIS ID;
        // If it find an user lastId you will get the user id 
    } else { // We get the id in each CASE because we need it to send a message 
        $request = $database->prepare("INSERT INTO user  (pseudo) VALUES (:pseudo)");
        $request->execute([
            ':pseudo' => $_POST['pseudo']]);
            $lastId = $database->lastInsertId(); // IF pseudo doesn't exist lastId will be the last inserted ID
            // var_dump($lastId);

    }
    // var_dump($lastId);



      

    
    $request = $database->prepare("INSERT INTO `message` (content,created_at,ip_adress,user_id) VALUES (:content,:created_at,:ip_adress,:user_id)");
    $request->execute([
        ':content' =>$_POST['message'], // Replace the 0 with your timezone difference (;
        ':created_at' => $date,
        ':ip_adress' =>$_SERVER['SERVER_NAME'],
        ':user_id' => $lastId]); // Get an ID in every condition
        
    } 


 header('Location: index.php');
?>
