<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // $host = "localhost";
    // $dbUsername = "root";
    // $dbPassword = "parolasecreta19Adi$";
    // $dbName = "library";

    // $clientName = $_post['name_student'];

    // $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    // $clientDeleted = $_POST['name_student'];

    // $Delet = "DELETE FROM 'clients' WHERE 'name_student' = $clientName ";

    // $Delet_run = mysqli_query($conn, $Delet);

    // if ($Delet_run) {
    //     echo ' <script> alert("Data Deleted");</script>';
    // } else {
    //     echo ' <script> alert("Data Not Deleted");</script>';
    // }

    // mysqli_close($conn);
    ?>
    <!-- Delet Client -->
    <form action="" method="post">
        <h3>Delet Client</h3>
        <input type='text' name='name_student' />
        <button type="submit" name="delete">Delete</button>
    </form>

    <!-- Search book -->
    <h3>Serch book info</h3>
    <form action="index.php" method="POST">
        <input type='text' name='book' />
        <button type="submit">Submit</button>
    </form>
    <br>

    <!-- Add book -->
    <form action="index.php" method="post">
        <p>Add Book</p>

        <p>Name:</p>
        <input type="text" name='postName' required /><br>
        <p>Pages:</p>
        <input type="number" name='postPages' required /><br>
        <p>Author:</p>
        <input type="text" name='postAuthor' required /><br>
        <p>Genre:</p>
        <input type="text" name='postGenre' required /><br>
        <input type="submit" value="Submit" name="submitBook"><br>
    </form><br>

    <!-- Add client -->
    <form action="index.php" method="post">
        <p>Add Client</p>

        <p>Name:</p>
        <input type="text" name='nameStudent' required /><br>
        <p>Type:</p>
        <input type="text" name='typeStudent' required /><br>
        <input type="submit" value="Submit" name="submitName"><br>
    </form>

</body>

</html>