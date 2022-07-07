<?php

    require '../vendor/autoload.php';

    use App\Manager\UserPasswordManager;

    session_start();

    $accounts = UserPasswordManager::getAccounts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>YOU HAVE BEEN LOGGED IN</h1>
    <?php echo $_SESSION['user']['Username'] ?>
    <hr>
    <form action="/group.php" method="POST">
        <input type="text" name="website" placeholder="website" >
        <input type="text" name="loginName" placeholder="Username" >
        <input type="text" name="password" placeholder="password" >
        <button type="submit">Submit</button>
    </form>
    <table>
        <thead>
            <tr>
                <td>Website</td>
                <td>Username</td>
                <td>Password</td>
            </tr>
        </thead>
        <tbody>
                <?php
                foreach ($accounts as $account) {
                    echo "<tr>";
                        echo "<td>$account[4]</td>";
                        echo "<td>$account[2]</td>";
                        echo "<td>$account[3]</td>";
                    echo "</tr>";
                }
                ?>
            </tr>
        </tbody>
    </table>
</body>
</html>