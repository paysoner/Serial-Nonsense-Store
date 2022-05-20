<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    $pid=$_POST['pid'];
    $apparel=false;
    $book=false;
    $comic=false;
    $poster=false;
    $request=false;
    $dsn = 'mysql:host=localhost;dbname=oelkerp1_serialnonsense';
    $name = "oelkersp1";
    $pass = "blingoishere963";
    
    if(!$uname || $owner == false)
    {
        echo '<script type="text/javascript">
            window.location = "login.html";
        </script>';
    }

    try
    {
        $db = new PDO($dsn, $name, $pass);

        $query = 'SELECT * FROM PRODUCT, APPAREL WHERE PRODUCT.ProID = APPAREL.ProID AND PRODUCT.ProID = "'.$pid.'"';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
                
        $statement->closeCursor();

        if(sizeof($result) > 0)
        {
            $apparel=true;
        }

        $query = 'SELECT * FROM PRODUCT, BOOK WHERE PRODUCT.ProID = BOOK.ProID AND PRODUCT.ProID = "'.$pid.'"';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
                
        $statement->closeCursor();

        if(sizeof($result) > 0)
        {
            $book=true;
        }

        $query = 'SELECT * FROM PRODUCT, COMIC WHERE PRODUCT.ProID = COMIC.ProID AND PRODUCT.ProID = "'.$pid.'"';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
                
        $statement->closeCursor();

        if(sizeof($result) > 0)
        {
            $comic=true;
        }

        $query = 'SELECT * FROM PRODUCT, POSTER WHERE PRODUCT.ProID = POSTER.ProID AND PRODUCT.ProID = "'.$pid.'"';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
                
        $statement->closeCursor();

        if(sizeof($result) > 0)
        {
            $poster=true;
        }

        $query = 'SELECT * FROM PRODUCT, REQUEST WHERE PRODUCT.ProID = REQUEST.ProID AND PRODUCT.ProID = "'.$pid.'"';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
                
        $statement->closeCursor();

        if(sizeof($result) > 0)
        {
            $request=true;
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
?>

<html>
    <head>
        <title>Enter Modifications - Serial Nonsense</title>
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
            echo '<div style="text-align: center; background-color: #333333; margin-right: auto; margin-left: auto; width: 50%">';
            echo '<h2>Modify Product</h2>';
            echo '<form action="modedproduct.php" method="post">';
                echo 'Product ID: <br><input name="proid" type="text" size="30"><br>';
                echo 'Product Price: <br><input name="price" type="text" size="30"><br>';
                echo 'Product Name: <br><input name="pname" type="text" size="30"><br>';
                echo 'Product Description (if any): <br><input name="prodes" type="text" size="30"><br>';
                echo 'Quantity in Stock: <br><input name="stock" type="text" size="30"><br>';
                echo 'Product Brand (if any): <br><input name="brand" type="text" size="30"><br>';
                echo 'Product Image Name (if any): <br><input name="image" type="text" size="30"><br>';
            
                if($apparel == true)
                {
                    echo 'Product Clothing Type (if any): <b><input name="atype" type="text" size="30"><br>';
                    $producttype = "APPAREL";
                }
                
                else if($book == true)
                {
                    echo 'Pages: <br><input name="pages" type="text" size="30"><br>';
                    echo 'Number of Authors: <br><input name="authornum" type="text" size="30"><br>';
                    echo 'Author Names (separate with comma without space): <br><input name="authorname" type="text" size="30"><br>';
                    $producttype = "BOOK";
                }
                
                else if($comic == true)
                {
                    echo 'Issue Number (if any): <br><input name="issue" type="text" size="30"><br>';
                    echo 'Volume Number: <br><input name="vol" type="text" size="30"><br>';
                    echo 'Comic Title (if any): <br><input name="title" type="text" size="30"><br>';
                    echo 'Number of Authors: <br><input name="authornum" type="text" size="30"><br>';
                    echo 'Author Names (separate with comma without space): <br><input name="authorname" type="text" size="30"><br>';
                    $producttype = "COMIC";
                }
                
                else if($poster == true)
                {
                    echo 'Width: <br><input name="width" type="text" size="30"><br>';
                    echo 'Height: <br><input name="height" type="text" size="30"><br>';
                    $producttype = "POSTER";
                }
                
                else if($request == true)
                {
                    $producttype = "REQUEST";
                }
                
                else
                {
                    $producttype = "GENERIC";
                }
                
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                echo '<input type="hidden" id="pid" name="pid" value='.$pid.'>';
                echo '<hr><input type="submit" name="submit" value="Modify the product!">';
            echo '</form></div>';
                
                
            
            echo '<form action="ownerhome.php" method="post">';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="submit" name="submit" value="Back to owner page.">';
            echo '<form>';
        ?>
    </body>
</html>