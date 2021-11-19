<?php

class LibraryBuilder
{
    // adauga client
    public function addClientToDatabase($tabel, $postName, $postType, $database_name, $database_type)
    {

        if (isset($_POST['submitName'])) {
            if (isset($_POST['nameStudent']) && isset($_POST['typeStudent'])) {

                $name_student = $_POST[$postName];
                $type_student = $_POST[$postType];

                $host = "localhost";
                $dbUsername = "root";
                $dbPassword = "parolasecreta19Adi$";
                $dbName = "library";
                $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
                if ($conn->connect_error) {
                    die('Could not connect to the database.');
                } else {
                    $Select = "SELECT $database_name FROM $tabel WHERE $database_name = ? LIMIT 1";
                    $Insert = "INSERT INTO $tabel($database_name, $database_type) values(?, ?)";
                    $stmt = $conn->prepare($Select);
                    $stmt->bind_param("s", $name_student);
                    $stmt->execute();
                    $stmt->bind_result($resultName);
                    $stmt->store_result();
                    $stmt->fetch();
                    $rnum = $stmt->num_rows;
                    if ($rnum == 0) {
                        $stmt->close();
                        $stmt = $conn->prepare($Insert);
                        $stmt->bind_param("ss", $name_student, $type_student);
                        if ($stmt->execute()) {
                            echo "New record inserted sucessfully.";
                        } else {
                            echo $stmt->error;
                        }
                    } else {
                        echo "Someone already registers using this email.";
                    }
                    $stmt->close();
                    $conn->close();
                }
            } else {
                echo "All field are required.";
                die();
            }
        }
    }
    //adauga carte
    public function addBooktoDatabase($tabel, $postName, $postPages, $postAuthor, $postGenre,  $db_book_name, $db_pages, $db_author, $db_genrel)
    {
        if (isset($_POST['submitBook'])) {
            if (isset($_POST[$postName]) && isset($_POST[$postPages]) && isset($_POST[$postPages]) && isset($_POST[$postGenre])) {

                $name = $_POST[$postName];
                $pages = $_POST[$postPages];
                $author = $_POST[$postAuthor];
                $genre = $_POST[$postGenre];


                $host = "localhost";
                $dbUsername = "root";
                $dbPassword = "parolasecreta19Adi$";
                $dbName = "library";
                $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
                if ($conn->connect_error) {
                    die('Could not connect to the database.');
                } else {
                    $Select = "SELECT $db_book_name FROM $tabel WHERE $db_book_name = ? LIMIT 1";
                    $Insert = "INSERT INTO $tabel($db_book_name, $db_pages, $db_author, $db_genrel) values(?, ?, ?, ?)";
                    $stmt = $conn->prepare($Select);
                    //
                    $stmt->bind_param("s", $name);
                    $stmt->execute();
                    $stmt->bind_result($resultName);
                    $stmt->store_result();
                    $stmt->fetch();
                    $rnum = $stmt->num_rows;
                    if ($rnum == 0) {
                        $stmt->close();
                        $stmt = $conn->prepare($Insert);
                        $stmt->bind_param("ssss", $name, $pages, $author, $genre);
                        if ($stmt->execute()) {
                            echo "New record inserted sucessfully.";
                        } else {
                            echo $stmt->error;
                        }
                    } else {
                        echo "Someone already registers using this email.";
                    }
                    $stmt->close();
                    $conn->close();
                }
            } else {
                echo "All field are required.";
                die();
            }
        }
    }
    public function searchTabelInfo($tabel, $colum, $name, $pages, $author, $genre, $inputPost)
    {
        if (isset($_POST[$inputPost])) {
            $bookName = $_POST[$inputPost]; //'book'
            foreach ($tabel as $colum) {
                if ($colum->book_name == $bookName) {
                    echo  "<h3> Book name: {$colum->$name}; <br> Book pages: {$colum->$pages} ;<br> Author: {$colum->$author}; <br> Genre: {$colum->$genre}.<br></h3>";
                }
            }
        }
    }

    // aici cred ca ar merge una singura conditia sa fie bagata intr un array cu titlul si apoi destructurat array-ul in loc de doua functii sa fie un else if daca exista conditia ,gen daca array ul are lungimea de 2 sau cv care sa verifice daca e bagata conditia in functie
    public function displayTargetFromDatabase($tabel, $colum, $target, $title)
    {

        print ' <h3>' . $title . '</h3>';
        foreach ($tabel as $colum) {
            if ($colum) {
                print '<li><span>' . $colum->$target . '<span></li>';
            }
        }
    }

    public function displayTargetFromDatabaseWithCondition($tabel, $nameVerified, $target, $title, $condition)
    {

        print ' <h3>' . $title . '</h3>';
        foreach ($tabel as $colum) {
            if ($colum->$nameVerified == $condition) {

                print '<li><span>' . $colum->$target . '<span></li>';
            }
        }
    }
    //Deleting Client using name PROBLEM ?!
    public function deletClientUsingName($tabel, $clientPost)
    {

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "parolasecreta19Adi$";
        $dbName = "library";
        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

        if (isset($_POST['delete'])) {
            $clientDeleted = $_POST[$clientPost];

            $Delet = "DELETE FROM $tabel WHERE name_student = $clientDeleted ";
            $Delet_run = mysqli_query($conn, $Delet);
            if ($Delet_run) {
                echo ' <script> alert("Data Deleted");</script>';
            } else {
                echo ' <script> alert("Data Not Deleted");</script>';
            }
        }
    }
}
