<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    $pid=$_POST['pid'];
    
    if(!$uname || $owner == false)
    {
        echo '<script type="text/javascript">
            window.location = "login.html";
        </script>';
    }
?>

<html>
    <head>
        <title>Update Stock - Serial Nonsense</title>
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
            echo '<form action="updatedstock.php" method="post">';
                echo '<select name="adjusttype">';
                    echo '<option value="SHIP">Add Shipment to Stock';
                    echo '<option value="INVENTORY">Update Inventory Amount';
                echo '</select><br>';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="hidden" id="pid" name="pid" value='.$pid.'>';
                echo 'Quantity:<input name="quan" type="text" size="10"><br><br>';
                echo '<input type="submit" name="submit" value="Change stock!">';
            echo '</form>';
            
            echo '<form action="ownerhome.php" method="post">';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="submit" name="submit" value="Back to owner page.">';
            echo '<form>';
        ?>
    </body>
</html>