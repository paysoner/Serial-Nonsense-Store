<?php
    $log = false;
    $owner = false;
    $dsn = 'mysql:host=localhost;dbname=oelkerp1_serialnonsense';
    $name = "oelkersp1";
    $pass = "blingoishere963";
    $apparel=false;
    $book=false;
    $comic=false;
    $poster=false;
    $request=false;
    $itemname = "Oh no!";

    if(isset($_POST['uname']))
    {
        $uname = $_POST['uname'];
        $owner = $_POST['owner'];
        $log = true;
    }

    if(isset($_POST['pid']))
    {
        $pid = $_POST['pid'];

        try
        {
            $db = new PDO($dsn, $name, $pass);

            $query = 'SELECT * FROM PRODUCT, APPAREL WHERE PRODUCT.ProID = APPAREL.ProID AND PRODUCT.ProID = "'.$pid.'"';
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch();

            $statement->closeCursor();

            if($result != NULL)
            {
                $apparel = true;
            }

            $query = 'SELECT * FROM PRODUCT, BOOK WHERE PRODUCT.ProID = BOOK.ProID AND PRODUCT.ProID = "'.$pid.'"';
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch();

            $statement->closeCursor();

            if($result != NULL)
            {
                $book = true;
            }

            $query = 'SELECT * FROM PRODUCT, COMIC WHERE PRODUCT.ProID = COMIC.ProID AND PRODUCT.ProID = "'.$pid.'"';
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch();

            $statement->closeCursor();

            if($result != NULL)
            {
                $comic = true;
            }

            $query = 'SELECT * FROM PRODUCT, POSTER WHERE PRODUCT.ProID = POSTER.ProID AND PRODUCT.ProID = "'.$pid.'"';
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch();

            $statement->closeCursor();

            if($result != NULL)
            {
                $poster = true;
            }

            $query = 'SELECT * FROM PRODUCT, REQUEST WHERE PRODUCT.ProID = REQUEST.ProID AND PRODUCT.ProID = "'.$pid.'"';
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch();

            $statement->closeCursor();

            if($result != NULL)
            {
                $request = true;
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
    }
?>

<html>
    <head>
        <?php
            echo '<title>'.$itemname.' - Serial Nonsense</title>';
        ?>
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
        <?php
            echo "<div class='header'><img src='logo.png' height='150'>";
          
            echo '<form action="results.php" method="post" style="float: right; margin-right: 20px; margin-top: 10px; text-align: right">';
            if($log == false)
            {
                echo '<a href="login.html">Login!</a><br><br>';
            }
            else
            {
                echo 'Hi, '.$uname.'!<br><br>';
            }
            echo 'Search Type:';
            echo '<select name="searchtype">';
                echo '<option value="PRODUCT">All Products';
                echo '<option value="APPAREL">Apparel';
                echo '<option value="BOOK">Books';
                echo '<option value="COMIC">Comics';
                echo '<option value="POSTER">Poster';
            echo '</select><br>';
            echo 'Search:';
            echo '<input name="searchterm" type="text" size="20">';
            if(isset($uname))
            {
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
            }
            echo '<input type="submit" name="submit" value="Search">';
            echo '</form></div>';
            
            echo '<table class="navi">';
            echo '<tr>';
            echo '<td>';
            echo '<form action="allproducts.php" method="post">';
                if(isset($uname))
                {
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                }
                echo '<input type="submit" name="submit" value="All Products">';
            echo '</form>';
            echo '</td>';
            
            echo '<td>';
            echo '<form action="apparelproducts.php" method="post">';
                if(isset($uname))
                {
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                }
                echo '<input type="submit" name="submit" value="Apparel">';
            echo '</form>';
            echo '</td>';
            
            echo '<td>';
            echo '<form action="bookproducts.php" method="post">';
                if(isset($uname))
                {
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                }
                echo '<input type="submit" name="submit" value="Books">';
            echo '</form>';
            echo '</td>';
            
            echo '<td>';
            echo '<form action="comicproducts.php" method="post">';
                if(isset($uname))
                {
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                }
                echo '<input type="submit" name="submit" value="Comics">';
            echo '</form>';
            echo '</td>';
            
            echo '<td>';
            echo '<form action="posterproducts.php" method="post">';
                if(isset($uname))
                {
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                }
                echo '<input type="submit" name="submit" value="Posters">';
            echo '</form>';
            echo '</td>';
            
            echo '<td>';
            echo '<form action="item.php" method="post">';
                if(isset($uname))
                {
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                }
                echo '<input type="hidden" id="pid" name="pid" value="23">';
                echo '<input type="submit" name="submit" value="Drawing Request!">';
            echo '</form>';
            echo '</td>';
            
            echo '<td>';
            echo '<form action="mycart.php" method="post">';
                if(isset($uname))
                {
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                }
                echo '<input type="submit" name="submit" value="My Cart">';
            echo '</form>';
            echo '</td>';
            
            echo '<td>';
            echo '<form action="myorders.php" method="post">';
                if(isset($uname))
                {
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                }
                echo '<input type="submit" name="submit" value="My Orders">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
            echo '</table>';

            if($apparel == true)
            {
                $query = 'SELECT * FROM PRODUCT, APPAREL WHERE PRODUCT.ProID = APPAREL.ProID AND PRODUCT.ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetch();

                $statement->closeCursor();

                echo '<table>';
                    echo '<tr>';
                    echo '<td>';
                        echo '<h1>'.$result['Name'].'</h1>';
                        echo '<img src="'.$result['Image'].'" alt="'.$result['Name'].'" height="340">';
                    echo '</td>';
                
                    echo '<td>';
                            echo '<p>$'.$result['Price'].'<br>';
                            echo $result['Type'].'<br>';
                            echo $result['ProDes'].'</p>';
                            echo '<form action="cart.php" method="post">';
                                if(isset($uname))
                                {
                                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                                }
                                echo '<input type="hidden" id="pid" name="pid" value='.$pid.'>';
                                echo 'Quantity:<input name="quan" type="number" min="1" size="10" required><br><br>';
                                echo '<input type="submit" name="submit" value="Add to Cart!">';
                            echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                echo '</table>';
            }

            else if($book == true)
            {
                $query = 'SELECT * FROM PRODUCT, BOOK WHERE PRODUCT.ProID = BOOK.ProID AND PRODUCT.ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetch();

                $statement->closeCursor();

                $query = 'SELECT AUTHOR.AName FROM PRODUCT, BOOK, AUTHOR WHERE BOOK.ProID = "'.$pid.'" AND BOOK.ProID = PRODUCT.ProID AND BOOK.ProID = AUTHOR.ProID';
                $statement = $db->prepare($query);
                $statement->execute();
                $result2 = $statement->fetchAll();

                $statement->closeCursor();

                echo '<table>';
                    echo '<tr>';
                    echo '<td>';
                        echo '<h1>'.$result['Name'].'</h1>';
                        echo '<img src="'.$result['Image'].'" alt="'.$result['Name'].'" height="340">';
                    echo '</td>';
                
                    echo '<td>';
                            echo '<p>$'.$result['Price'].'<br>';
                            echo $result['Pages'].' pages.<br>';
                            echo 'Written by ';
                            for($i=0; $i <sizeof($result2); $i++)
                            {
                                echo $result2[$i]['AName'];
                                if($i < sizeof($result2) - 1)
                                {
                                    echo ', ';
                                }
                            }
                            echo '<br>';
                            echo $result['ProDes'].'</p>';
                            echo '<form action="cart.php" method="post">';
                                if(isset($uname))
                                {
                                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                                }
                                echo '<input type="hidden" id="pid" name="pid" value='.$pid.'>';
                                echo 'Quantity:<input name="quan" type="number" min="1" size="10" required><br><br>';
                                echo '<input type="submit" name="submit" value="Add to Cart!">';
                            echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                echo '</table>';
            }

            else if($comic == true)
            {
                $query = 'SELECT * FROM PRODUCT, COMIC WHERE PRODUCT.ProID = COMIC.ProID AND PRODUCT.ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetch();

                $statement->closeCursor();
                
                $query = 'SELECT AUTHOR.AName FROM PRODUCT, COMIC, AUTHOR WHERE COMIC.ProID = "'.$pid.'" AND COMIC.ProID = PRODUCT.ProID AND COMIC.ProID = AUTHOR.ProID';
                $statement = $db->prepare($query);
                $statement->execute();
                $result2 = $statement->fetchAll();

                $statement->closeCursor();
                
                echo '<table>';
                    echo '<tr>';
                    echo '<td>';
                        echo '<h1>'.$result['Name'].'</h1>';
                        echo '<img src="'.$result['Image'].'" alt="'.$result['Name'].'" height="340">';
                    echo '</td>';
                
                    echo '<td>';
                        echo '<p>$'.$result['Price'].'<br>';
                        if($result['Issue'] != NULL)
                        {
                            echo 'Issue '.$result['Issue'].': '.$result['Title'].'<br>';
                        }
                        echo 'Volume '.$result['Volume'].'<br>';
                        echo 'Created by ';
                        for($i=0; $i < sizeof($result2); $i++)
                        {
                            echo $result2[$i]['AName'];
                            if($i < sizeof($result2) - 1)
                            {
                                echo ', ';
                            }
                        }
                        echo '<br>';
                        echo $result['ProDes'].'</p>';    
                        echo '<form action="cart.php" method="post">';
                            if(isset($uname))
                            {
                                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            }
                            echo '<input type="hidden" id="pid" name="pid" value='.$pid.'>';
                            echo 'Quantity:<input name="quan" type="number" min="1" size="10" required><br><br>';
                            echo '<input type="submit" name="submit" value="Add to Cart!">';
                        echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                echo '</table>';
            }

            else if($poster == true)
            {
                $query = 'SELECT * FROM PRODUCT, POSTER WHERE PRODUCT.ProID = POSTER.ProID AND PRODUCT.ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetch();

                $statement->closeCursor();

                echo '<table>';
                    echo '<tr>';
                    echo '<td>';
                        echo '<h1>'.$result['Name'].'</h1>';
                        echo '<img src="'.$result['Image'].'" alt="'.$result['Name'].'" height="340">';
                    echo '</td>';
                
                    echo '<td>';
                        echo '<p>$'.$result['Price'].'<br>';
                        echo $result['Width'].' in. by '.$result['Height'].' in.<br>';
                        echo $result['ProDes'].'</p>';
                        echo '<form action="cart.php" method="post">';
                            if(isset($uname))
                            {
                                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            }
                            echo '<input type="hidden" id="pid" name="pid" value='.$pid.'>';
                            echo 'Quantity:<input name="quan" type="number" min="1" size="10" required><br><br>';
                            echo '<input type="submit" name="submit" value="Add to Cart!">';
                        echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                echo '</table>';
            }

            else if($request == true)
            {
                $query = 'SELECT * FROM PRODUCT, REQUEST WHERE PRODUCT.ProID = REQUEST.ProID AND PRODUCT.ProID = "'.$pid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetch();

                $statement->closeCursor();

                echo '<table>';
                    echo '<tr>';
                    echo '<td>';
                        echo '<h1>'.$result['Name'].'</h1>';
                        echo '<img src="'.$result['Image'].'" alt="'.$result['Name'].'" height="340">';
                    echo '</td>';
                
                    echo '<td>';
                        echo '<p>$'.$result['Price'].'<br>';
                        echo $result['ProDes'].'</p>';
                        echo '<form action="requestcart.php" method="post">';
                            if(isset($uname))
                            {
                                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            }
                            echo 'Due to the specificity of this service, this item may only be added to your cart one at a time.<br>';
                            echo 'Type in what you want me to draw!<br><input name="description" type="text" size="50" required><br><br>';
                            echo '<input type="submit" name="submit" value="Add to Cart!">';
                        echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                echo '</table>';
            }

            else
            {
                if(!isset($_POST['pid']))
                {
                    echo '<h1>Sorry, you must select a product to properly see this page!</h1>';
                }
                else
                {
                    $query = 'SELECT * FROM PRODUCT WHERE PRODUCT.ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $result = $statement->fetch();

                    $statement->closeCursor();

                    echo '<table>';
                        echo '<tr>';
                        echo '<td>';
                            echo '<h1>'.$result['Name'].'</h1>';
                            echo '<img src="'.$result['Image'].'" alt="'.$result['Name'].'" height="340">';
                        echo '</td>';
                    
                        echo '<td>';
                            echo '<p>$'.$result['Price'].'<br>';
                            echo $result['ProDes'].'</p>';
                            echo '<form action="cart.php" method="post">';
                                if(isset($uname))
                                {
                                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                                }
                                echo '<input type="hidden" id="pid" name="pid" value='.$pid.'>';
                                echo 'Quantity:<input name="quan" type="number" min="1" size="10" required><br><br>';
                                echo '<input type="submit" name="submit" value="Add to Cart!">';
                            echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    echo '</table>';
                }
            }
        ?>
    </body>
    <footer>
        <?php
            if($owner == true)
            {
                echo '<form action="ownerhome.php" method="post">';
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                    echo '<input type="submit" name="submit" value="Go to owner page!">';
                echo '</form>';
            }
        ?>
    </footer>
</html>