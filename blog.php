    <?php
        try{
            $user ='root';
            $password ='';
            $dbConnection = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]);
        }

            catch (PDOExpection $e) {
                die('Keine Verbindung zur Datenbank möglich:'.$e->getMessage());
            }

            $query = 'select * from blog_db limit 3';

            if (($_GET['action']?? '')==='all'){
                $query='select * from blog_db order by created_at desc';
            }

            $statement = $dbConnection->query($query);
            $blog_db = $statement->fetchAll();

            //var_dump($blog_db);

            foreach($rows as $row){
                echo $row["created_by"]. ',Post:'.$row["post_test"].'<br>';
            }
            ?>


