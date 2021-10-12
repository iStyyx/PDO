<?php
require_once '_connec.php';
$pdo = new \PDO(DSN, USER, PASS);

$query = 'SELECT * FROM friend';
$statement = $pdo->prepare($query);

$statement->execute();
$friends = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>

<style>
    .formulaire {
        margin: 0 auto;
        width: 500px;
        text-align: center;
        padding: 1rem 1rem;
        border-radius: 25px;
        background-color: #f76c6c;
        color: #fff;
    }

    .list {
        margin: 2rem auto 0 auto;
        width: 500px;
        text-align: center;
        padding: 1rem 1rem;
        border-radius: 25px;
        background-color: #f76c6c;
        color: #fff;
    }

    .formulaire form div {
        padding: .6rem;
    }

    .formulaire form div label {
        font-size: 1.2rem;
    }

    .formulaire form div.input input {
        width: 50%;
        margin-top: .7rem;
        border-radius: 10px;
        border: 0px solid;
        border-bottom: 2px solid black;
        border-right: 1.5px solid black;
        border-left: 1.5px solid black;
    }

    .formulaire form .submit-button {
        margin-top: 1rem;
    }

    .formulaire form .submit-button input {
        padding: .5rem;
        border: 0px solid;
        border-radius: 5px;
        border-bottom: 2px solid black;
        cursor: pointer;
    }

    .formulaire form div.input input:focus-visible {
        outline: 0px;
        border-bottom: 2px solid green;
        border-right: 1.5px solid green;
        border-left: 1.5px solid green;
    }

    .list ul {
        padding: 0;
    }

    .list ul li {
        list-style: none;
    }
</style>

<body>
    <section class="formulaire">
        <h1>Add friends form</h1>
        <form action="insert.php" method="POST">
            <div class="input">
                <label for="firstname">Firstname</label><br>
                <input type="text" name="firstname" id="firstname" required minlength="1" maxlength="45"/>
            </div>

            <div class="input">
                <label for="lastname">Lastname</label><br>
                <input type="text" name="lastname" id="lastname" required minlength="1" maxlength="45"/>
            </div>

            <div class="submit-button">
                <input type="submit" value="Add a friend" /><br>
                <h2 style="color:green;font-weight:bold;display:none"> A new friend has been added</h2>
                <h2 style="color:red;font-weight:bold;display:none">Error during saving the new friend!</h2>
            </div>
        </form>
    </section>
    <section class="list">
        <h1>Friends list</h1>
        <?php
            echo '<ul>';
            foreach ($friends as $friend) {
                echo '<li>' . $friend['firstname'] . ' ' . $friend['lastname'] . '</li>';
            }
            echo '</ul>';
        ?>
    </section>
</body>

</html>