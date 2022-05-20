<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    $oid=$_POST['oid'];
    if(isset($_POST['del']))
    {
        $del=$_POST['del'];
    }
    else
    {
        $del = false;
    }
    if(isset($_POST['proid']))
    {
        $proid=$_POST['proid'];
    }
    if(isset($_POST['add']))
    {
        $add=$_POST['add'];
    }
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
        <title>Order Modified - Serial Nonsense</title>
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

                if($del == true)
                {
                    $query = 'DELETE FROM ORDERITEM WHERE OrderID = "'.$oid.'" AND ProID = "'.$proid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    
                    if($statement == false)
                    {
                        echo 'The item could not be deleted from the order.';
                    }
                    else
                    {
                        echo 'Item deleted from order.';
                    }

                    $statement->closeCursor();
                }
        
                else
                {
                    $query = 'UPDATE ORDERS SET Address = "'.$add.'" WHERE OrderID = "'.$oid.'"';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    
                    if($statement == false)
                    {
                        echo 'Something went wrong, order not modified.';
                    }
                    else
                    {
                        echo 'Order modified.';
                    }

                    $statement->closeCursor();
                }

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