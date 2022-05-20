<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    $address=$_POST['address'];
    $log=false;
    $dsn = 'mysql:host=localhost;dbname=oelkerp1_serialnonsense';
    $name = "oelkersp1";
    $pass = "blingoishere963";
    
    if(!$uname)
    {
        echo '<script type="text/javascript">
                    alert("You must be logged in to access your orders!");
                    window.location = "login.html";
                </script>';
    }
    else
    {
        $log = true;
    }
?>

<html>
    <head>
        <title>Completing Your Order - Serial Nonsense</title>
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

            try
            {
                $db = new PDO($dsn, $name, $pass);

                $query = 'SELECT OrderID FROM ORDERS';
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();

                $statement->closeCursor();

                $orderid = -1;
                
                for($i=0; $i <sizeof($result); $i++)
                {
                    if($orderid < $result[$i]['OrderID'])
                    {
                        $orderid = $result[$i]['OrderID'];
                    }
                }
                
                $orderid++;

                $query = 'INSERT INTO ORDERS VALUES (CURRENT_TIMESTAMP, "'.$uname.'", "'.$address.'", NULL, NULL, '.$orderid.')';
                $statement = $db->prepare($query);
                $statement->execute();

                if($statement == false)
                {
                    echo 'Something went wrong and we were unable to complete your order.';
                    exit;
                }

                $statement->closeCursor();

                $query = 'SELECT * FROM CART WHERE Uname = "'.$uname.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();

                $statement->closeCursor();

                for($i=0; $i <sizeof($result); $i++)
                {
                    $query = 'SELECT * FROM PRODUCT WHERE ProID = "'.$result[$i]['ProID'].'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $result2 = $statement->fetch();

                    $statement->closeCursor();
                        
                    if($result[$i]['RNum'] == NULL)
                    {
                        $rec = "NULL";
                    }
                    else
                    {
                        $rec = $result[$i]['RNum'];
                    }
                    if($result[$i]['Quant'] <= $result2['Qty'])
                    {
                        $query = 'INSERT INTO ORDERITEM VALUES ('.$orderid.', "'.$result[$i]['ProID'].'", '.$i.', '.$rec.', '.$result[$i]['Quant'].')';
                        $statement = $db->prepare($query);
                        $statement->execute();
                            
                        if($statement == false)
                        {
                            echo 'Something went wrong with one of your items and we were unable include it in the order. Check your orders for more information.<br>';
                        }
                        else
                        {
                            $newqty = $result2['Qty'] - $result[$i]['Quant'];
                                
                            $query = 'UPDATE PRODUCT SET Qty = '.$newqty.' WHERE ProID = "'.$result[$i]['ProID'].'"';
                            $statement2 = $db->prepare($query);
                            $statement2->execute();
                                
                            if($statement2 == false)
                            {
                                echo 'Something went wrong.';
                            }

                            $statement2->closeCursor();
                        }

                        $statement->closeCursor();
                    }
                    else
                    {
                        echo 'The amount of '.$result2['Name'].'s in your cart exceeds the amount we have in stock and could not be applied to your order.';
                    }
                }

                $query = 'DELETE FROM CART WHERE Uname = "'.$uname.'"';
                $statement = $db->prepare($query);
                $statement->execute();

                if($statement == false)
                {
                    echo 'Something went wrong with your cart! No items were removed.';
                }

                $statement->closeCursor();

                echo '<p>Order completed!</p>';
            }
            catch(PDOException $e)
            {
                $error_message = $e->getMessage();
                echo "Error connecting: ".$error_message;
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