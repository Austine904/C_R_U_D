<?php
    //Database connection
                $db_server = "localhost";
                $db_user ="root";
                $db_pass = "";
                $db_name = "oriagidb";
                $conn = "";

                $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                if($conn){
                    $s_id=$_GET['ID'];
                    $get_sql="SELECT * FROM bashdb where ID='$s_id'";
                    $query=mysqli_query($conn, $get_sql);
                    $row= mysqli_fetch_assoc($query);

                    if(isset($_POST['Update'])){
                        $s_id=$_GET['ID'];
                        $s_name=$_POST['fname'];
                        $s_email=$_POST['email'];
                        $s_phone=$_POST['phone'];
                        $update_sql = "UPDATE bashdb SET fname='$s_name', email='$s_email', phone='$s_phone' where ID='$s_id'";

                        $data = mysqli_query($conn, $update_sql);

                        if ($data) {

                           
                           header("Location:welcome.php");

                        }
                    }
                        
                    
                }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <h1>Update Page</h1>

    <form action="" method="POST">

    <div>
            <label for="fname">Full Names:</label>
            <input type="text" id="fname" name="fname" value="<?php echo $row['fname'] ?>">
        </div>
    

        <br>


        <div>
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email'] ?>">
        </div>

        <br>


        <div>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $row['phone'] ?>">
        </div>

        <br>


        <div>
            <input type="submit" name="Update" value="Update">
        </div> 
    </form>
    
</body>
</html>