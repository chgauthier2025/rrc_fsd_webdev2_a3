<?php
    require('db_connect.php');
    
     // SQL is written as a String.
     $query = "SELECT * FROM quotes";

     // A PDO::Statement is prepared from the query.
     $statement = $db->prepare($query);

     // Execution on the DB server is delayed until we execute().
     $statement->execute(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>PDO SELECT</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <?php include('nav.php'); ?>
    <!-- How many database table rows did we SELECT? -->
        <h1>Found <?= $statement->rowCount() ?> Rows</h1>
        
        <ul>
            <?php while($row= $statement->fetch()): ?>
                <li> <?= $row['content'] ?> By <?=$row['author']?> </li>
            <?php endwhile ?>
        </ul>

</body>
</html>