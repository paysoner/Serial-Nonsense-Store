<?php
    $Uname=trim($_POST['Uname']);
    $PassW=$_POST['PassW'];
    $PassW2=$_POST['PassW2'];
    $FullName=$_POST['FullName'];
    $Email=$_POST['Email'];
    
    if(!$Uname || !$PassW || !$PassW2 || !$FullName || !$Email)
    {
        echo '<script type="text/javascript">
            alert("All fields must be filled in!");
            window.location = "newaccount.html";
        </script>';
        exit;
    }
    
    if($PassW != $PassW2)
    {
        echo '<script type="text/javascript">
            alert("Passwords must match!");
            window.location = "newaccount.html";
        </script>';
        exit;
    }

    $dsn = 'mysql:host=localhost;dbname=oelkerp1_serialnonsense';
    $name = "oelkersp1";
    $pass = "blingoishere963";

    try
    {
        $db = new PDO($dsn, $name, $pass);
    
        $query = "SELECT Username FROM OWNER WHERE Username like '".$Uname."'";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
    
        $statement->closeCursor();

        $query = "SELECT Uname FROM CUSTOMER WHERE Uname like '".$Uname."'";
        $statement = $db->prepare($query);
        $statement->execute();
        $result2 = $statement->fetch();
    
        $statement->closeCursor();
    
        if($result != NULL || $result2 != NULL)
        {
            echo '<script type="text/javascript">
                alert("Something went wrong! Please try again with a different username.");
                window.location = "newaccount.html";
            </script>';
            exit;
        }
    
        $query = "INSERT INTO CUSTOMER VALUES
            ('".$Uname."', '".$PassW."', '".$FullName."', '".$Email."')";
        $statement = $db->prepare($query);
        $statement->execute();

        if ($statement == true)
        {
            echo '<script type="text/javascript">
                alert("Account successfully created! You may now log in.");
                window.location = "login.html";
            </script>';
        }
        else 
        {
            echo '<script type="text/javascript">
                alert("Something went wrong! Please try again with a different username.");
                window.location = "newaccount.html";
            </script>';
        }

        $statement->closeCursor();
    }
    catch(PDOException $e)
    {
        $error_message = $e->getMessage();
        echo "Error connecting: ".$error_message;
    }
?>

<html>
    <head>
        <title>Creating account...?</title>
    </head>
    <body>
        <p>If you're seeing this, something probably went wrong. Try and go to a different page.</p>
    </body>
</html>