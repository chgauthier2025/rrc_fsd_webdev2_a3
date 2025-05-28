<?php
    //for resources https://www.php.net/manual/en/book.pdo.php
    //include means the page will load anyway
    //require allows us to fail if there is an error
    //For how to use PDO in vscode
    //https://www.digitalocean.com/community/tutorials/how-to-set-up-visual-studio-code-for-php-projects#step-1-installing-vs-code-php-extensions-for-extra-support
    require('db_connect.php');
    
    //make sure author and content aren't empty
    if ($_POST && !empty($_POST['author']) && !empty($_POST['content'])) {
        //  Sanitize user input to escape HTML entities and filter out dangerous characters.
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        //  Build the parameterized SQL query and bind to the above sanitized values. to avoid cross site injections
        //https://www.youtube.com/watch?v=1tqdMNnXF0M
        //variable is built and then you can bind to them first
        //you can also install php server in an extension
        //https://stackoverflow.com/questions/18028706/php-pdoexception-sqlstatehy093-invalid-parameter-number
        // how to do arrays using the current PDO and PHP
        $query = "INSERT INTO quotes (author, content)
        VALUES (:author, :content)";
        $statement = $db->prepare($query);

        
        $statement->bindValue(':author', $author);
        $statement->bindValue(':content', $content);

      


        $statement->execute(array(
            ":author" => $author,
            ":content" => $content)

        );


        
        //  Bind values to the parameters

        
        //  Execute the INSERT.
        //  execute() will check for possible SQL injection and remove if necessary


    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>PDO Insert</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <?php include('nav.php'); ?>
    <form method="post" action="insert.php">
        <label for="author">Author</label>
        <input id="author" name="author">
        <label for="content">Content</label>
        <input id="content" name="content">
        <input type="submit">
    </form>
</body>
</html>