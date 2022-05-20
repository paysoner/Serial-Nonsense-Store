<?php
    $uname=$_POST['uname'];
    $owner=$_POST['owner'];
    $producttype=$_POST['producttype'];
    
    if(!$uname || $owner == false)
    {
        echo '<script type="text/javascript">
            window.location = "login.html";
        </script>';
    }
?>

<html>
    <head>
        <title>Add a Product - Serial Nonsense</title>
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
            form
            {
                text-align: center;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class='header'><img src='logo.png' height='150'></div>

        <?php
            echo '<div style="text-align: center; background-color: #333333; margin-right: auto; margin-left: auto; width: 50%">';
            echo '<h2>Add Product</h2>';
            echo '<form action="addedproduct.php" method="post">';
                echo 'Product ID: <br><input name="proid" type="text" size="30" required><br>';
                echo 'Product Price: <br><input name="price" type="number" size="30" min="0" step="any" required><br>';
                echo 'Product Name: <br><input name="pname" type="text" size="30" required><br>';
                echo 'Product Description (if any): <br><input name="prodes" type="text" size="30"><br>';
                echo 'Quantity in Stock: <br><input name="stock" type="number" size="30" min="0" required><br>';
                echo 'Product Brand (if any): <br><input name="brand" type="text" size="30"><br>';
                echo 'Product Image Name (if any): <br><input name="image" type="text" size="30"><br>';
                if($producttype == "APPAREL")
                {
                    echo 'Product Clothing Type (if any): <input name="atype" type="text" size="30"><br>';
                }
                else if($producttype == "BOOK")
                {
                    echo 'Pages: <br><input name="pages" type="number" size="30" min="1" required><br>';
                    echo 'Number of Authors: <br><input name="authornum" type="number" size="30" min="1" required><br>';
                    echo 'Author Names (separate with comma without space): <br><input name="authorname" type="text" size="30" required><br>';
                }
                else if($producttype == "COMIC")
                {
                    echo 'Issue Number (if any): <br><input name="issue" type="number" size="30"><br>';
                    echo 'Volume Number: <br><input name="vol" type="number" size="30" required><br>';
                    echo 'Comic Title (if any): <br><input name="title" type="text" size="30"><br>';
                    echo 'Number of Authors: <br><input name="authornum" type="number" size="30" min="1" required><br>';
                    echo 'Author Names (separate with comma without space): <br><input name="authorname" type="text" size="30" required><br>';
                }
                else if($producttype == "POSTER")
                {
                    echo 'Width: <br><input name="width" type="number" size="30" required><br>';
                    echo 'Height: <br><input name="height" type="number" size="30" required><br>';
                }
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="hidden" id="producttype" name="producttype" value='.$producttype.'>';
                echo '<hr><input type="submit" name="submit" value="Add the product!">';
            echo '</form>';
            echo '</div>';
            
            echo '<form action="ownerhome.php" method="post">';
                echo '<input type="hidden" id="uname" name="uname" value='.$uname.'>';
                echo '<input type="hidden" id="owner" name="owner" value='.$owner.'>';
                echo '<input type="submit" name="submit" value="Back to owner page.">';
            echo '<form>';
        ?>
    </body>
</html>