<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    $producttype=$_POST['producttype'];
    $proid=$_POST['proid'];
    $price=$_POST['price'];
    $pname=$_POST['pname'];
    $prodes=$_POST['prodes'];
    $stock=$_POST['stock'];
    $brand=$_POST['brand'];
    $image=$_POST['image'];
    $badcon = false;
    $dsn = 'mysql:host=localhost;dbname=oelkerp1_serialnonsense';
    $name = "oelkersp1";
    $pass = "blingoishere963";
    
    if($producttype == "APPAREL")
    {
        $atype=$_POST['atype'];
        if(!$atype)
        {
            $atype = NULL;
        }
    }
    else if($producttype == "BOOK")
    {
        $pages=$_POST['pages'];
        $authornum=$_POST['authornum'];
        $authorname=$_POST['authorname'];
    }
    else if($producttype == "COMIC")
    {
        $issue=$_POST['issue'];
        $vol=$_POST['vol'];
        $title=$_POST['title'];
        $authornum=$_POST['authornum'];
        $authorname=$_POST['authorname'];
        if(!$issue)
        {
            $issue = NULL;
        }
        if(!$title)
        {
            $title = NULL;
        }
    }
    else if($producttype == "POSTER")
    {
        $width=$_POST['width'];
        $height=$_POST['height'];
    }
    
    if(!$prodes)
    {
        $prodes = NULL;
    }
    
    if(!$brand)
    {
        $brand = NULL;
    }
    
    if(!$image)
    {
        $image = NULL;
    }

    
    if(!$uname || $owner == false)
    {
        echo '<script type="text/javascript">
            window.location = "login.html";
        </script>';
    }
?>

<html>
    <head>
        <title>Product Addition - Serial Nonsense</title>
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
            if($producttype == "BOOK")
            {
                $namesarray = explode(',',$authorname);
                if($authornum != count($namesarray))
                {
                    echo 'Number of authors and amount of authors entered do not match.';
                    echo '<form action="addproduct.php" method="post">';
                        echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                        echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                        echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                        echo '<input type="submit" name="submit" value="Back to information input">';
                    echo '<form>';
                    exit;
                }
            }
            
            else if($producttype == "COMIC")
            {
                $namesarray = explode(',',$authorname);
                if($authornum != sizeof($namesarray))
                {
                    echo 'Number of authors and amount of authors entered do not match.';
                    echo '<form action="addproduct.php" method="post">';
                        echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                        echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                        echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                        echo '<input type="submit" name="submit" value="Back to information input">';
                    echo '<form>';
                    exit;
                }
            }

            try
            {
                $db = new PDO($dsn, $name, $pass);

                $query = 'INSERT INTO PRODUCT VALUES ("'.$proid.'", '.$price.', "'.$pname.'", "'.$prodes.'", '.$stock.', "'.$brand.'", "'.$image.'")';
                $statement = $db->prepare($query);
                $statement->execute();

                if($statement == false)
                {
                    echo 'Could not connect to the database. Try again.';
                    echo '<form action="addproduct.php" method="post">';
                        echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                        echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                        echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                        echo '<input type="submit" name="submit" value="Back to information input">';
                    echo '<form>';
                }

                $statement->closeCursor();

                if($producttype == "APPAREL")
                {
                    $query = 'INSERT INTO APPAREL VALUES ("'.$proid.'", "'.$atype.'")';
                    $statement = $db->prepare($query);
                    $statement->execute();

                    if($statement == false)
                    {
                        echo 'Could not connect to the database to add apparel item. Try again.';
                        echo '<form action="addproduct.php" method="post">';
                            echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                            echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                            echo '<input type="submit" name="submit" value="Back to information input">';
                        echo '<form>';
                    }

                    $statement->closeCursor();
                }

                else if($producttype == "BOOK")
                {
                    $query = 'INSERT INTO BOOK VALUES ("'.$proid.'", "'.$pages.'")';
                    $statement = $db->prepare($query);
                    $statement->execute();

                    if($statement == false)
                    {
                        echo 'Could not connect to the database to add book item. Try again.';
                        echo '<form action="addproduct.php" method="post">';
                            echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                            echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                            echo '<input type="submit" name="submit" value="Back to information input">';
                        echo '<form>';
                    }

                    $statement->closeCursor();
                    
                    foreach($namesarray as $n)
                    {
                        $query = 'INSERT INTO AUTHOR VALUES ("'.$proid.'", "'.$n.'")';
                        $statement = $db->prepare($query);
                        $statement->execute();

                        if($statement == false)
                        {
                            $badcon = true;
                        }

                        $statement->closeCursor();
                    }
                    
                    if($badcon == true)
                    {
                        echo 'Could not connect to the database to add one or more authors. Try again.';
                        echo '<form action="addproduct.php" method="post">';
                            echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                            echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                            echo '<input type="submit" name="submit" value="Back to information input">';
                        echo '<form>';
                    }
                }

                else if($producttype == "COMIC")
                {
                    $query = 'INSERT INTO COMIC VALUES ("'.$proid.'", '.$issue.', '.$vol.', "'.$title.'")';
                    $statement = $db->prepare($query);
                    $statement->execute();

                    if($statement == false)
                    {
                        echo 'Could not connect to the database to add comic item. Try again.';
                        echo '<form action="addproduct.php" method="post">';
                            echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                            echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                            echo '<input type="submit" name="submit" value="Back to information input">';
                        echo '<form>';
                    }

                    $statement->closeCursor();
                    
                    foreach($namesarray as $n)
                    {
                        $query = 'INSERT INTO AUTHOR VALUES ("'.$proid.'", "'.$n.'")';
                        $statement = $db->prepare($query);
                        $statement->execute();

                        if($statement == false)
                        {
                            $badcon = true;
                        }

                        $statement->closeCursor();
                    }
                    
                    if($badcon == true)
                    {
                        echo 'Could not connect to the database to add one or more authors. Try again.';
                        echo '<form action="addproduct.php" method="post">';
                            echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                            echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                            echo '<input type="submit" name="submit" value="Back to information input">';
                        echo '<form>';
                    }
                }

                else if($producttype == "POSTER")
                {
                    $query = 'INSERT INTO POSTER VALUES ("'.$proid.'", '.$width.', '.$height.')';
                    $statement = $db->prepare($query);
                    $statement->execute();

                    if($statement == false)
                    {
                        echo 'Could not connect to the database to add poster item. Try again.';
                        echo '<form action="addproduct.php" method="post">';
                            echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                            echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                            echo '<input type="submit" name="submit" value="Back to information input">';
                        echo '<form>';
                    }

                    $statement->closeCursor();
                }

                echo 'Process complete!<br>';
                echo '<form action="ownerhome.php" method="post">';
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                    echo '<input type="submit" name="submit" value="Back to owner page.">';
                echo '<form>';
            }
            catch(PDOException $e)
            {
                $error_message = $e->getMessage();
                echo "Error connecting: ".$error_message;
            }
        ?>
    </body>
</html>