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
            if (!empty($_POST["fname"]) && !empty($_POST["email"]) && !empty($_POST["phone"])){
                $fname = $_POST['fname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $date = $_POST['date'];

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

                                        
                    $sql = "INSERT INTO bashdb(fname, email, phone, date) values(?, ?, ?, ?)";

                    $stmt = $conn->prepare("INSERT INTO bashdb(fname, email, phone, date)
                    values(?, ?, ?, ?)");
                    $stmt->bind_param("ssii",$fname, $email, $phone, $date);
                     if ($stmt->execute()) {
                        echo "Registration Successful"; 

                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                    $conn->close();
                }
                else{
                    echo"Registration Unsuccessful";
                }
            }
        }
    ?>
            
    <form class="" action="#" method="post">
        
        <div>
            <label for="fname">Full Names:</label>
            <input type="text" id="fname" name="fname" placeholder="Oriagi Oriagi Oriagi">
        </div>
    

        <br>


        <div>
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" placeholder="nyamweya@fmail.com">
        </div>

        <br>


        <div>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="254 769 696 969">
        </div>

        <br>

        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date">
        </div>

        <br>


        <div>
            <input type="submit">
        </div> 
    </form>

    <h1>List Of Bash Goers</h1>
    <br>
    <Table>
        <thread>
            <tr>
            <th>ID</th>
            <th>fname</th>
            <th>email</th>
            <th>phone</th>
            <th>Date</th>
            <th>Delete</th>
            </tr>
        </thread>

        <tbody>
            <?php
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
                    if (isset($_GET["ID"])){
                        $ID=$_GET["ID"];
                        $Delete= mysqli_query($conn, "DELETE FROM bashdb WHERE ID = '$ID'" );
                    }

                    //read db data
                    $sql = "SELECT * FROM bashdb";
                    $result = $conn->query($sql);

                    if (!$result){
                        die("invalid querry: " . $conn->error);
                    }

                    // read data of each row
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>".$row["ID"]."</td>
                            <td>".$row["fname"]."</td>
                            <td>".$row["email"]."</td>
                            <td>".$row["phone"]."</td>
                            <td>".$row["date"]."</td>
                            <td>
                                <a href = 'welcome.php?ID= ".$row["ID"]."'>Delete</a>
                        </tr>";
                    }
                }
            ?>
        </tbody>
    </Table>
</body>
</html>