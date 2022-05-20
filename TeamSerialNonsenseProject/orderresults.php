<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    $searchtype=$_POST['searchtype'];
    $searchterm=trim($_POST['searchterm']);
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
        <title>Customer Orders</title>
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

            echo '<form action="orderresults.php" method="post" style="float: right; margin-right: 20px; margin-top: 30px; text-align: right">';
            echo 'Search Type:';
            echo '<select name="searchtype">';
                echo '<option value="Uname">Search by Username';
                echo '<option value="OrderID">Search by Order ID';
            echo '</select><br>';
            echo 'Search:';
            echo '<input name="searchterm" type="text" size="20">';
            echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
            echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
            echo '<input type="submit" name="submit" value="Search">';
            echo '</form></div>';

            echo '<form action="ownerhome.php" method="post">';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="submit" name="submit" value="Back to owner page.">';
            echo '</form>';

            try
            {
                $db = new PDO($dsn, $name, $pass);

                $query = 'SELECT * FROM ORDERS WHERE '.$searchtype.' like "%'.$searchterm.'%"';
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
            
                $statement->closeCursor();

                echo "<p>Total orders: ".sizeof($result)."</p>";

                for ($i=0; $i <sizeof($result); $i++)
                {
                    echo '<table style="width: 100%; background-color: #333333; border-color: black; border-style: solid; padding: 3px">';
                    echo '<tr>';
                    echo '<td>';
                        echo '<p>Order ID: '.$result[$i]['OrderID'].'<br>';
                        echo 'Ordered by '.$result[$i]['Uname'].'<br>';
                        echo 'Sent to: '.$result[$i]['Address'].'</p>';
                    echo '</td>';
                    
                    echo '<td>';
                        echo '<form action="modorder.php" method="post" style="float: right; margin-right: 10px">';
                            echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                            echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            echo '<input type="hidden" id="oid" name="oid" value='.$result[$i]['OrderID'].'>';
                            echo '<input type="submit" name="submit" value="Modify Order">';
                        echo '</form>';
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
        ?>
    </body>
</html>