 <?php
     define('DB_DSN','mysql:host=localhost;dbname=a3_blog;charset=utf8');
     define('DB_USER','root');
     define('DB_PASS','');     
     
     try {
        //PDO allows us to work with any of the various databases out there.
        //https://www.phptutorial.net/php-pdo/pdo-connecting-to-mysql/
         // Try creating new PDO connection to MySQL.
         $db = new PDO(DB_DSN, DB_USER, DB_PASS);
         //,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
     } catch (PDOException $e) {
         print "Error: " . $e->getMessage();
         die(); // Force execution to stop on errors.
         // When deploying to production you should handle this
         // situation more gracefully. ¯\_(ツ)_/¯
     }
 ?>