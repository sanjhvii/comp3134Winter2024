<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <lable>Text</label>
        <input type="text" name="input">
        <input type="submit" name="btnSubmit" value="Submit">
    </form>

<?php 


    $servername = "localhost";
    $username = "elder";
    $password = "pass";
    $db = "lab8DB"

    $con=mysqli_connect($servername,$username,$password,$db);

    if (mysqli_connect_errno()) 
        echo "Failed to connect to the database: " . mysqli_connect_error();

    if (isset($_GET["submit"])){
        $query = mysqli_query($con, "SELECT * FROM users WHERE firstname LIKE '" . $_GET['input'] . "' AND active LIKE 1"); 
        echo "<table>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                </tr>";

        while($row = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
    }
    mysqli_close($con);
?>
</body>
</html>