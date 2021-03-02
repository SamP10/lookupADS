<?php
session_start();
//Setting up database access credentials
$host='localhost';
$user='root';
$password='tiaspbiqe2r';
$dbname='accounts';
//Database Connection with exit message upon error
$connect = mysqli_connect($host, $user, $password, $dbname) or exit("Unable to connect to database!");
?>
<!DOCTYPE html>
<html lang="en">
<header>

</header>
<body>
<h1>Employee Lookup</h1>
<form method="POST" action="">
    Room Number:<input type="number" name="roomnumber"><br>
    Phone Extension:<input type="number" name="numberext"><br>
    <button name="submit" type="submit">SEARCH</button>
</form>
<?php
    if(isset($_POST['submit'])){
        if(isset($_POST['roomnumber'])&&!empty($_POST['roomnumber'])){
            $roomnumber=$_POST['roomnumber'];
            $query="SELECT * FROM users WHERE roomnumber=$roomnumber";
            $run=mysqli_query($connect, $query);
            while($row=mysqli_fetch_assoc($run)){
                echo'Username: '.$row['username'];
                echo'Group: '.$row['group_name'];
                echo'Room Number: '.$row['roomnumber'];
                echo'Number Extension: '.$row['numberext'];
            }
        }elseif(isset($_POST['numberext'])&&!empty($_POST['numberext'])){
            $numberext=$_POST['numberext'];
            $query="SELECT * FROM users WHERE numberext=$numberext";
            $run=mysqli_query($connect, $query);
            while($row=mysqli_fetch_assoc($run)){
                echo'Username: '.$row['username'];
                echo'Group: '.$row['group_name'];
                echo'Room Number: '.$row['roomnumber'];
                echo'Number Extension: '.$row['numberext'];
            }

        }
    }
?>
</body>
<footer>

</footer>
</html>
