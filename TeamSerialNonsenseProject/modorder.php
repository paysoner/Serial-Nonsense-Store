<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    $oid=$_POST['oid'];
    $totalprice = 0;
    $dsn = 'mysql:host=localhost;dbname=oelkerp1_serialnonsense';
    $name = "oelkersp1";
    $pass = "blingoishere963";
    
    if(!$uname || $owner == false)
    {
        echo '<script type="text/javascript">
            window.location = "login.html";
        </script>';
    }
?>

<html>
    <head>
        <title>Customer Order</title>
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

                $query = 'SELECT * FROM ORDERS WHERE ORDERS.OrderID = "'.$oid.'"';
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetch();
            
                $statement->closeCursor();

                echo '<p>Order ID: '.$result['OrderID'].'<br>';
                echo 'Customer username: '.$result['Uname'].'<br>';
                echo 'Time of order: '.$result['TimeOfOrder'].'<br>';
                echo 'Sent to: '.$result['Address'].'<br>';
                if($result['DateSent'])
                {
                    echo 'Sent on: '.$result['DateSent'].'<br>';
                }
                if($result['DateDelivered'])
                {
                    echo 'Sent on: '.$result['DateDelivered'].'<br>';
                }
                
                echo '<br>Items in order:<br><br>';

                $query = 'SELECT * FROM ORDERITEM, PRODUCT WHERE ORDERITEM.OrderID = '.$oid.' AND ORDERITEM.ProID = PRODUCT.ProID';
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
            
                $statement->closeCursor();

                for($i=0; $i < sizeof($result); $i++)
                {
                    echo '<div style="width: 99%; background-color: #333333; border-color: black; border-style: solid; padding: 3px">';
                    echo '('.$result[$i]['Qt'].') '.$result[$i]['Name'].'<br>';
                    $totalprice += $result[$i]['Qt'] * $result[$i]['Price'];
                    echo '<form action="modifiedorder.php" method="post">';
                        echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                        echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                        echo '<input type="hidden" id="del" name="del" value=true>';
                        echo '<input type="hidden" id="oid" name="oid" value="'.$oid.'">';
                        echo '<input type="hidden" id="proid" name="proid" value="'.$result[$i]['ProID'].'">';
                        echo '<input type="submit" name="submit" value="Delete from order">';
                    echo '</form></div>';
                }
                echo 'Total price of order: $'.$totalprice.'</p>';

                echo '<form action="modifiedorder.php" method="post">';
                    echo 'Modify customer address: <input name="add" type="text" size="30" required><br>';
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                    echo '<input type="hidden" id="oid" name="oid" value="'.$oid.'">';
                    echo '<input type="submit" name="submit" value="Modify the order!">';
                echo '</form>';

                echo '<form action="modifyorder.php" method="post">';
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                    echo '<input type="submit" name="submit" value="Back to order page.">';
                echo '<form><br>';

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