<?php session_start() ?>
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

    <form action="/group.php" method="POST">
        <input type="text" name="website" placeholder="website" >
        <input type="text" name="loginName" placeholder="Username" >
        <input type="text" name="password" placeholder="password" >
        <button type="submit">Submit</button>
    </form>
</body>
</html>