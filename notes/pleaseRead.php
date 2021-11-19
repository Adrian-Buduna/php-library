<?php

//nu o sa fac asta ptc sunt sigur ca nu are rost trebuie sa existe o metoda deja creeata dar ma gandeam asa :
//in loc sa bag variabile ma gandeam sa bag array uri pe care sa le deschid in functia care s-ar numi addRowToTabel
function addClientToDatabase($tabel, $postName, $postType, $database_name, $database_type)

{

    if (isset($_POST['submit'])) {
        if (isset($_POST['nameStudent']) && isset($_POST['typeStudent'])) {

            //o functie care sa genereze variabile pt fiecare post si sa le bage intr un array al lor postArray
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
                //ma gandeam ca aici sar outea dispune tot ce am ca coloane similar cu spred operator , nus daca se poate in php exJS: [...array]
                $Insert = "INSERT INTO $tabel($database_name, $database_type) values(?, ?)";//aici sa fac o functie care sa genereze ? in functie de lungimea array ului
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
                    $stmt->bind_param("ss", $name_student, $type_student);// ar trebui ca in functie sa intre o variabila care sa specifice decida daca este string s sau i integer, b boolean
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
    } else {
        echo "Submit button is not set";
    }
}
// in felul asta nu am nev de doua metode pt clienti si carti
//nu stiu daca am gandit bine dar am vrut sa imi prezint ideea :D
