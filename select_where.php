<?php
    require('db_connect.php');
    //tutorial for PDO https://www.youtube.com/watch?v=Li90TQap1bc
    $query = "select * from quotes where id = ?";
    //pdo will sanitize your query for you
    $statement = $db->prepare($query);

    // Sanitize $_GET['id'] to ensure it's a number.
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    echo ("ID: " . $id);
    // Bind the :id parameter in the query to the sanitized
    // $id specifying a binding-type of Integer.
    //$statement->bindValue('id', $id, PDO::PARAM_INT);
    $statement->execute(array($id));
    
    // Fetch the row selected by primary key id.
    $row = $statement->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>PDO SELECT with WHERE</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <?php include('nav.php'); ?>
    <h1>Rows Found: <?= $statement->rowCount() ?></h1>
    <h2>Content</h2>
    <p><?= $row['content'] ?></p>
    <h2>Author</h2>
    <p><?= $row['author'] ?></p>
    <h2>Zero Rows Found?</h2>
    <p>Try <a href="?id=1">this</a> link and then play with the GET parameter in the URL.</p>
</body>
</html> 