<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "hello Oriagi<br>\n";
        echo "Date is: " . date('j-m-y, h:i:s');
    ?>


    <br><br>

    <?php
        if ($_SERVER['REQUEST_METHOD'] =="POST"){
            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $phone= $_POST['phone'];
            echo $fname . "<br />";
            echo $email . "<br />";
            echo $phone . "<br />";

    }
    ?>

    <br><br>
    
<form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <div>
        <label for="fname">Full Names:</label>
        <input type="text" id="fname" name="fname" placeholder="Oriagi Oriagi Oriagi" required>
    </div>
   

    <br>


    <div>
        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" placeholder="nyamweya@fmail.com" required>
    </div>

    <br>


    <div>
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" placeholdereholder="254 769 696 969" required>
    </div>

    <br>

    <div>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
    </div>

    <br>


    <div>
        <input type="submit">
    </div>
</form>
</body>
</html>