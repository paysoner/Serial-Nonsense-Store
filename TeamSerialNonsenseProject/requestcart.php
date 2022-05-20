<?php
    $dsn = 'mysql:host=localhost;dbname=oelkerp1_serialnonsense';
    $name = "oelkersp1";
    $pass = "blingoishere963";
    
    if(isset($_POST['uname']))
    {
        $uname=$_POST['uname'];
        $owner=$_POST['owner'];
        $log = true;
        $description=$_POST['description'];
    }
    else
    {
        echo '<script type="text/javascript">
            alert("You must be logged in to access your cart!");
            window.location = "login.html";
        </script>';
    }
?>

<html>
    <head>
        <title>Adding to cart... - Serial Nonsense</title>
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

            if($owner == true)
            {
                echo "<p>Nothing was added to the cart because you own the store!</p>";
            }
            else
            {
                try
                {
                    $db = new PDO($dsn, $name, $pass);

                    $query = 'SELECT * FROM REQUEST';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
        
                    $statement->closeCursor();

                    $recnum = -1;
                
                    for($i=0; $i <sizeof($result); $i++)
                    {
                        if($recnum < $result[$i]['RNum'])
                        {
                            $recnum = $result[$i]['RNum'];
                        }
                    }

                    $recnum++;

                    $query = 'INSERT INTO REQUEST VALUES ("23", '.$recnum.', "'.$description.'")';
                    $statement = $db->prepare($query);
                    $statement->execute();

                    if($statement == true)
                    {
                        $query = 'SELECT * FROM CART WHERE Uname = "'.$uname.'"';
                        $statement2 = $db->prepare($query);
                        $statement2->execute();
                        $result2 = $statement2->fetchAll();
            
                        $statement2->closeCursor();

                        $high = -1;
                
                        for($i=0; $i <sizeof($result2); $i++)
                        {
                            if($high < $result2[$i]['NumInCart'])
                            {
                                $high = $result2[$i]['NumInCart'];
                            }
                        }

                        $high++;

                        $query = 'INSERT INTO CART VALUES ("'.$uname.'", '.$high.', "23", '.$recnum.', 1)';
                        $statement2 = $db->prepare($query);
                        $statement2->execute();

                        if($statement2 == true)
                        {
                            echo 'Addition to cart successful!<br>NOTE: Reloading the page will cause your cart to populate more items.';
                        }
                        else
                        {
                            echo 'Something went wrong when we tried to add this to your cart. Please try again!';
                        }

                        $statement2->closeCursor();
                    }
                    else
                    {
                        echo 'Something went wrong when we tried to add this to your cart. Please try again!';
                    }

                    $statement->closeCursor();

                    echo '<br><br>Current cart:<br>';

                    $query = 'SELECT * FROM CART, CUSTOMER, PRODUCT WHERE CART.Uname = CUSTOMER.Uname AND CUSTOMER.Uname = "'.$uname.'" AND PRODUCT.ProID = CART.ProID AND CART.RNum IS NULL';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();

                    $statement->closeCursor();

                    for ($i=0; $i <sizeof($result); $i++)
                    {
                        echo '<table style="width: 100%; background-color: #333333; border-color: black; border-style: solid; padding: 3px">';
                        echo '<tr>';
                        echo '<td style="width: 100px">';
                            echo '<img src="'.$result[$i]['Image'].'" alt="'.$result[$i]['Name'].'" width="100">';
                        echo '</td>';
                        
                        echo '<td>';
                            echo '<p>'.$result[$i]['Name'].'<br>';
                            echo '$'.$result[$i]['Price'].'<br>';
                            echo $result[$i]['ProDes'].'<br>';
                        echo '</td>';
                        
                        echo '<td>';
                            echo 'In cart: '.$result[$i]['Quant'].'</p>';
                        echo '</td>';
                        echo '</tr>';
                        echo '</table>';
                    }

                    $query = 'SELECT * FROM CART, CUSTOMER, PRODUCT, REQUEST WHERE CART.Uname = CUSTOMER.Uname AND CUSTOMER.Uname = "'.$uname.'" AND PRODUCT.ProID = CART.ProID AND REQUEST.RNum = CART.RNum';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();

                    $statement->closeCursor();

                    for ($i=0; $i <sizeof($result); $i++)
                    {
                        echo '<table style="width: 100%; background-color: #333333; border-color: black; border-style: solid; padding: 3px">';
                        echo '<tr>';
                        echo '<td style="width: 100px">';
                            echo '<img src="'.$result[$i]['Image'].'" alt="'.$result[$i]['Name'].'" width="100">';
                        echo '</td>';
                        
                        echo '<td>';
                            echo '<p>'.$result[$i]['Name'].'<br>';
                            echo '$'.$result[$i]['Price'].'<br>';
                            echo $result[$i]['ProDes'].'<br>';
                            echo 'You requested: '.$result[$i]['ReqDes'];
                        echo '</td>';
                        echo '</tr>';
                        echo '</table>';
                    }
                }
                catch(PDOException $e)
                {
                    $error_message = $e->getMessage();
                    echo "Error connecting: ".$error_message;
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