<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
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
        <title>Modify a Product - Serial Nonsense</title>
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

            echo '<form action="modifyresults.php" method="post" style="float: right; margin-right: 20px; margin-top: 30px; text-align: right">';
            echo 'Search Type:';
            echo '<select name="searchtype">';
                echo '<option value="PRODUCT">All Products';
                echo '<option value="APPAREL">Apparel';
                echo '<option value="BOOK">Books';
                echo '<option value="COMIC">Comics';
                echo '<option value="POSTER">Poster';
            echo '</select><br>';
            echo 'Search Products:';
            echo '<input name="searchterm" type="text" size="0">';
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

                $query = "select * from PRODUCT";
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
                        echo $result[$i]['ProDes'].'</p>';
                    echo '</td>';
                    
                    echo '<td>';
                        echo '<form action="modifiedproduct.php" method="post" style="float: right; margin-right: 10px">';
                            if(isset($uname))
                            {
                                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                            }
                            echo '<input type="hidden" id="pid" name="pid" value='.$result[$i]['ProID'].'>';
                            echo '<input type="submit" name="submit" value="Modify">';
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