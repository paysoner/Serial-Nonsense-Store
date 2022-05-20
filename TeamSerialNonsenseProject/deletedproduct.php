<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    $pid=$_POST['pid'];
    $apparel=false;
    $book=false;
    $comic=false;
    $poster=false;
    $request=false;
    $dsn = 'mysql:host=localhost;dbname=oelkerp1_serialnonsense';
    $name = "oelkersp1";
    $pass = "blingoishere963";
    
    if(!$uname || $owner == false)
    {
        echo '<script type="text/javascript">
            window.location = "login.html";
        </script>';
    }

    try
    {
        $db = new PDO($dsn, $name, $pass);

        $query = 'SELECT * FROM PRODUCT, APPAREL WHERE PRODUCT.ProID = APPAREL.ProID AND PRODUCT.ProID = "'.$pid.'"';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
                
        $statement->closeCursor();

        if(sizeof($result) > 0)
        {
            $apparel=true;
        }

        $query = 'SELECT * FROM PRODUCT, BOOK WHERE PRODUCT.ProID = BOOK.ProID AND PRODUCT.ProID = "'.$pid.'"';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
                
        $statement->closeCursor();

        if(sizeof($result) > 0)
        {
            $book=true;
        }

        $query = 'SELECT * FROM PRODUCT, COMIC WHERE PRODUCT.ProID = COMIC.ProID AND PRODUCT.ProID = "'.$pid.'"';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
                
        $statement->closeCursor();

        if(sizeof($result) > 0)
        {
            $comic=true;
        }

        $query = 'SELECT * FROM PRODUCT, POSTER WHERE PRODUCT.ProID = POSTER.ProID AND PRODUCT.ProID = "'.$pid.'"';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
                
        $statement->closeCursor();

        if(sizeof($result) > 0)
        {
            $poster=true;
        }

        $query = 'SELECT * FROM PRODUCT, REQUEST WHERE PRODUCT.ProID = REQUEST.ProID AND PRODUCT.ProID = "'.$pid.'"';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
                
        $statement->closeCursor();

        if(sizeof($result) > 0)
        {
            $request=true;
        }

        $query = 'SELECT * FROM PRODUCT WHERE PRODUCT.ProID = "'.$pid.'"';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
                
        $statement->closeCursor();

        $itemname = $result['Name'];
    }
    catch(PDOException $e)
    {
        $error_message = $e->getMessage();
        echo "Error connecting: ".$error_message;
    }
?>

<html>
    <head>
        <title>Product Deleted - Serial Nonsense</title>
        <style>
            body
            {
                background-color: black;
                color: white;
                font-size: 25px;
                font-family: arial;
            }
            .header
            {
                background: rgb(57,174,255);    
                background: linear-gradient(90deg, rgba(57,174,255,1) 0%, rgba(9,9,121,1) 81%, rgba(160,3,164,1) 100%);
                padding: 10px;
            }
            input
            {
                background-color: #4ddbff;
                border: none;
                margin: 3px;
                font-size: 25px;
                font-family: arial;
                border-radius: 5px;
            }
            input:hover
            {
                background-color: #8600b3;
                color: white;
            }
            form
            {
                text-align: center;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class='header'><img src='logo.png' height='150'></div>
        <?php
            if($apparel == true)
            {
                $query = 'DELETE FROM PRODUCT WHERE ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                
                $query = 'DELETE FROM APPAREL WHERE ProID = "'.$pid.'"';
                $statement2 = $db->prepare($query);
                $statement2->execute();
                
                if($statement == false || $statement2 == false)
                {
                    echo 'The item could not be deleted.';
                }

                $statement->closeCursor();
                $statement2->closeCursor();
            }

            else if($book == true)
            {
                $query = 'DELETE FROM PRODUCT WHERE ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                
                $query = 'DELETE FROM BOOK WHERE ProID = "'.$pid.'"';
                $statement2 = $db->prepare($query);
                $statement2->execute();
                
                $query = 'DELETE FROM AUTHOR WHERE ProID = "'.$pid.'"';
                $statement3 = $db->prepare($query);
                $statement3->execute();

                if($statement == false || $statement2 == false || $statement3 == false)
                {
                    echo 'The item could not be deleted.';
                }

                $statement->closeCursor();
                $statement2->closeCursor();
                $statement3->closeCursor();
            }

            else if($comic == true)
            {
                $query = 'DELETE FROM PRODUCT WHERE ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                
                $query = 'DELETE FROM COMIC WHERE ProID = "'.$pid.'"';
                $statement2 = $db->prepare($query);
                $statement2->execute();
                
                $query = 'DELETE FROM AUTHOR WHERE ProID = "'.$pid.'"';
                $statement3 = $db->prepare($query);
                $statement3->execute();
                
                if($statement == false || $statement2 == false || $statement3 == false)
                {
                    echo 'The item could not be deleted.';
                }

                $statement->closeCursor();
                $statement2->closeCursor();
                $statement3->closeCursor();
            }

            else if($poster == true)
            {
                $query = 'DELETE FROM PRODUCT WHERE ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                
                $query = 'DELETE FROM POSTER WHERE ProID = "'.$pid.'"';
                $statement2 = $db->prepare($query);
                $statement2->execute();
                
                if($statement == false || $statement2 == false)
                {
                    echo 'The item could not be deleted.';
                }

                $statement->closeCursor();
                $statement2->closeCursor();
            }

            else if($request == true)
            {
                $query = 'DELETE FROM PRODUCT WHERE ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                
                $query = 'DELETE FROM REQUEST WHERE ProID = "'.$pid.'"';
                $statement2 = $db->prepare($query);
                $statement2->execute();
                
                if($statement == false || $statement2 == false)
                {
                    echo 'The item could not be deleted.';
                }
            }

            else
            {
                $query = 'DELETE FROM PRODUCT WHERE PRODUCT.ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                
                if($statement == false)
                {
                    echo 'The item could not be deleted.';
                }
            }

            echo '<p>Process completed.</p>';
            echo '<form action="ownerhome.php" method="post">';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="submit" name="submit" value="Back to owner page.">';
            echo '<form>';
        ?>
    </body>
</html>