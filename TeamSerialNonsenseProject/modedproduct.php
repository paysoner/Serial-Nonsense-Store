<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    $pid=$_POST['pid'];
    $producttype=$_POST['producttype'];
    $proid=$_POST['proid'];
    $price=$_POST['price'];
    $pname=$_POST['pname'];
    $prodes=$_POST['prodes'];
    $stock=$_POST['stock'];
    $brand=$_POST['brand'];
    $image=$_POST['image'];
    $dsn = 'mysql:host=localhost;dbname=oelkerp1_serialnonsense';
    $name = "oelkersp1";
    $pass = "blingoishere963";
    
    if($producttype == "APPAREL")
    {
        $atype=$_POST['atype'];
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
    }
    else if($producttype == "POSTER")
    {
        $width=$_POST['width'];
        $height=$_POST['height'];
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
        <title>Product Modified - Serial Nonsense</title>
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
            .navi
            {
                margin-left: auto;
                margin-right: auto;
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
            select
            {
                background-color: #4ddbff;
                border: none;
                margin: 3px;
                font-size: 25px;
                font-family: arial;
                border-radius: 5px;
            }
            a
            {
                text-decoration: none;
                background-color: #4ddbff;
                font-size: 25px;
                font-family: arial;
                border-radius: 5px;
                color: black;
            }
            a:hover
            {
                background-color: #8600b3;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class='header'><img src='logo.png' height='150'></div>
        <?php
            try
            {
                $db = new PDO($dsn, $name, $pass);
        
                $query = 'SELECT * FROM PRODUCT WHERE ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                $origin = $statement->fetch();
                        
                $statement->closeCursor();

                if(!$proid)
                {
                    $proid = $origin['ProID'];
                }
                if(!$price)
                {
                    $price = $origin['Price'];
                }
                if(!$pname)
                {
                    $pname = $origin['Name'];
                }
                if(!$prodes)
                {
                    $prodes = $origin['ProDes'];
                }
                if(!$stock)
                {
                    $stock = $origin['Qty'];
                }
                if(!$brand)
                {
                    $brand = $origin['Brand'];
                }
                if(!$image)
                {
                    $image = $origin['Image'];
                }

                if($producttype == "APPAREL")
                {
                    $query = 'SELECT * FROM APPAREL WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $origin = $statement->fetch();
                        
                    $statement->closeCursor();
                    
                    if(!$atype)
                    {
                        $atype = $origin['Type'];
                    }
                }

                else if($producttype == "BOOK")
                {
                    $query = 'SELECT * FROM BOOK WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $origin = $statement->fetch();
                        
                    $statement->closeCursor();
                    
                    if(!$pages)
                    {
                        $pages = $origin['Pages'];
                    }
                    
                    $query = 'SELECT * FROM AUTHOR WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $origin = $statement->fetchAll();
                        
                    $statement->closeCursor();
                    
                    if(!$authorname)
                    {
                        for($i=0; $i <sizeof($origin); $i++)
                        {
                            if($i==0)
                            {
                                $authorname = $origin[$i]['AName'];
                            }
                            else
                            {
                                $authorname = $authorname.','.$origin[$i]['AName'];
                            }
                        }
                        $authornum = sizeof($origin);
                    }
                    
                    $namesarray = explode(',',$authorname);
                    
                    if($authornum != count($namesarray))
                    {
                        echo 'Number of authors and amount of authors entered do not match.';
                        echo '<form action="modifiedproduct.php" method="post">';
                            echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                            echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                            echo '<input type="hidden" id="pid" name="pid" value='.$pid.'>';
                            echo '<input type="submit" name="submit" value="Back to information input">';
                        echo '<form>';
                        exit;
                    }
                }

                else if($producttype == "COMIC")
                {
                    $namesarray = explode(',',$authorname);
                    
                    $query = 'SELECT * FROM COMIC WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $origin = $statement->fetch();
                        
                    $statement->closeCursor();
                    
                    if(!$issue)
                    {
                        $issue = $origin['Issue'];
                    }
                    if(!$vol)
                    {
                        $vol = $origin['Volume'];
                    }
                    if(!$title)
                    {
                        $title = $origin['Title'];
                    }
                    
                    $query = 'SELECT * FROM AUTHOR WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $origin = $statement->fetchAll();
                        
                    $statement->closeCursor();
                    
                    if(!$authorname)
                    {
                        for($i=0; $i <sizeof($origin); $i++)
                        {
                            if($i==0)
                            {
                                $authorname = $origin['AName'];
                            }
                            else
                            {
                                $authorname = $authorname.','.$origin['AName'];
                            }
                        }
                        $authornum = sizeof($origin);
                    }
                    
                    $namesarray = explode(',',$authorname);
                    
                    if($authornum != count($namesarray))
                    {
                        echo 'Number of authors and amount of authors entered do not match.';
                        echo '<form action="modifiedproduct.php" method="post">';
                            echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                            echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                            echo '<input type="hidden" id="pid" name="pid" value='.$pid.'>';
                            echo '<input type="submit" name="submit" value="Back to information input">';
                        echo '<form>';
                        exit;
                    }
                }

                else if($producttype == "POSTER")
                {
                    $query = 'SELECT * FROM POSTER WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $origin = $statement->fetch();
                        
                    $statement->closeCursor();
                    
                    if(!$width)
                    {
                        $width = $origin['Width'];
                    }
                    if(!$height)
                    {
                        $height = $origin['Height'];
                    }
                }

                $query = 'UPDATE PRODUCT SET ProID = "'.$proid.'", Price = '.$price.', Name = "'.$pname.'", ProDes = "'.$prodes.'", Qty = '.$stock.', Brand = "'.$brand.'", Image = "'.$image.'" WHERE ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();

                if($statement == false)
                {
                    echo 'Something went wrong and the item could not be modified.';
                    $statement->closeCursor();
                    exit;
                }
                        
                $statement->closeCursor();

                if($producttype == "APPAREL")
                {
                    $query = 'UPDATE APPAREL SET ProID = "'.$proid.'", Type = "'.$atype.'" WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    
                    if($statement == false)
                    {
                        echo 'Something went wrong and the apparel item could not be inserted into the database.';
                    }

                    $statement->closeCursor();
                }

                else if($producttype == "BOOK")
                {
                    $query = 'UPDATE BOOK SET ProID = "'.$proid.'", Pages = '.$pages.' WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    
                    $query = 'DELETE FROM AUTHOR WHERE ProID = "'.$pid.'"';
                    $statement2 = $db->prepare($query);
                    $statement2->execute();
                    
                    foreach($namesarray as $n)
                    {
                        $query = 'INSERT INTO AUTHOR VALUES ("'.$proid.'", "'.$n.'")';
                        $statement3 = $db->prepare($query);
                        $statement3->execute();

                        if($statement3 == false)
                        {
                            echo 'Something went wrong and the book item could not be inserted into the database.';
                        }

                        $statement3->closeCursor();
                    }
                    
                    if($statement == false || $statement2 == false)
                    {
                        echo 'Something went wrong and the book item could not be inserted into the database.';
                    }

                    $statement->closeCursor();
                    $statement2->closeCursor();
                }

                else if($producttype == "COMIC")
                {
                    $query = 'UPDATE COMIC SET ProID = "'.$proid.'", Issue = "'.$issue.'", Volume = '.$vol.', Title = "'.$title.'" WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    
                    $query = 'DELETE FROM AUTHOR WHERE ProID = "'.$pid.'"';
                    $statement2 = $db->prepare($query);
                    $statement2->execute();
                    
                    foreach($namesarray as $n)
                    {
                        $query = 'INSERT INTO AUTHOR VALUES ("'.$proid.'", "'.$n.'")';
                        $statement3 = $db->prepare($query);
                        $statement3->execute();

                        if($statement3 == false)
                        {
                            echo 'Something went wrong and the comic item could not be inserted into the database.';
                        }

                        $statement3->closeCursor();
                    }
                    
                    if($statement == false || $statement2 == false)
                    {
                        echo 'Something went wrong and the comic item could not be inserted into the database.';
                    }

                    $statement->closeCursor();
                    $statement2->closeCursor();
                }

                else if($producttype == "POSTER")
                {
                    $query = 'UPDATE POSTER SET ProID = "'.$proid.'", Width = '.$width.', Height = '.$height.' WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    
                    if($statement == false)
                    {
                        echo 'Something went wrong and the poster item could not be inserted into the database.';
                    }

                    $statement->closeCursor();
                }

                else if($producttype == "REQUEST")
                {
                    $query = 'UPDATE REQUEST SET ProID = "'.$proid.'" WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    
                    if($statement == false)
                    {
                        echo 'Something went wrong and the request could not be inserted into the database.';
                    }

                    $statement->closeCursor();
                }

                echo 'Modification process complete!';
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