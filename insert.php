<?php 

require_once '_connec.php';
$pdo = new \PDO(DSN, USER, PASS);

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);

if(isset($_POST['firstname']) && isset($_POST['lastname'])){
    $query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
    $statement2 = $pdo->prepare($query);
    $statement2->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
    $statement2->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
    $statement2->execute();
    if($statement2){
        header('Location: index.php');
    } else {
        echo "Error during saving the new friend!";
        $classDisplayError = "block";
    }
} else {
    echo "Enter a not empty firstname and lastname please!";
}


