<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    
    if(!$uname || $owner == false)
    {
        echo '<script type="text/javascript">
            window.location = "login.html";
        </script>';
    }
?>

<html>
    <head>
        <title>Owner Page - Serial Nonsense</title>
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
            echo "<div class='header'><img src='logo.png' height='150'></div>";

            echo '<h2>Owner Permissions:</h2>';

            echo '<form action="addproduct.php" method="post">';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="submit" name="submit" value="Add a new product!">';
                echo '<select name="producttype">';
                    echo '<option value="GENERIC">No Category';
                    echo '<option value="APPAREL">Apparel';
                    echo '<option value="BOOK">Books';
                    echo '<option value="COMIC">Comics';
                    echo '<option value="POSTER">Poster';
                echo '</select><br>';
            echo '</form>';
            
            echo '<form action="deleteproduct.php" method="post">';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="submit" name="submit" value="Delete a current product!">';
            echo '</form>';
            
            echo '<form action="modifyproduct.php" method="post">';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="submit" name="submit" value="Change attributes of a product!">';
            echo '</form>';
            
            echo '<form action="addstock.php" method="post">';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="submit" name="submit" value="Update the stock of a product!">';
            echo '</form>';
            
            echo '<form action="modifyorder.php" method="post">';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="submit" name="submit" value="Modify a customer order!">';
            echo '</form>';
        ?>
    </body>
    <footer>
        <?php
                echo '<form action="allproducts.php" method="post">';
                    echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                    echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                    echo '<input type="submit" name="submit" value="Go back to the normal site!">';
                echo '</form>';
        ?>
    </footer>
</html>