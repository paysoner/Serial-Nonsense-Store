<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    $dsn = 'mysql:host=localhost;dbname=oelkerp1_serialnonsense';
    $name = "oelkersp1";
    $pass = "blingoishere963";
    $pid=$_POST['pid'];
    $adjusttype=$_POST['adjusttype'];
    $quan=$_POST['quan'];
    
    if(!$uname || $owner == false)
    {
        echo '<script type="text/javascript">
            window.location = "login.html";
        </script>';
    }
?>

<html>
    <head>
        <title>Stock Updated - Serial Nonsense</title>
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

                if($adjusttype == "SHIP")
                {
                    $query = 'SELECT * FROM PRODUCT WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $result = $statement->fetch();
            
                    $statement->closeCursor();
                    
                    $quan = $result['Qty'] + $quan;
                    
                    $query = 'UPDATE PRODUCT SET Qty = '.$quan.' WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    
                    if($statement == false)
                    {
                        echo 'Something went wrong and the new shipment could not be added.';
                    }
                    
                    else
                    {
                        echo 'Shipment added!';
                    }

                    $statement->closeCursor();
                }

                else if($adjusttype == "INVENTORY")
                {
                    $query = 'UPDATE PRODUCT SET Qty = '.$quan.' WHERE ProID = "'.$pid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    
                    if($statement == false)
                    {
                        echo 'Something went wrong and inventory could not be updated.';
                    }
                    
                    else
                    {
                        echo 'Inventory updated!';
                    }

                    $statement->closeCursor();
                }
                
                else
                {
                    echo 'Something went wrong, please go back.';
                }
            }
            catch(PDOException $e)
            {
                $error_message = $e->getMessage();
                echo "Error connecting: ".$error_message;
            }

            echo '<form action="ownerhome.php" method="post">';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="submit" name="submit" value="Back to owner page.">';
            echo '</form>';
        ?>
    </body>
</html>