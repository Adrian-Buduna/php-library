<?php
require 'api/Connection.php';
require 'api/QueryBuilder.php';
require 'api/LibraryBuilder.php';
require 'functions.php';

//make conection
$pdo = Connection::make();

//selecting tabels in database
$query = new QueryBuilder($pdo);
$books = $query->selectAll('books');
$clients = $query->selectAll('clients');

//adding methods to to database from form
$libraryQuerry = new LibraryBuilder(); // la asta am folosit in metode o cale spre baza de date nu este similar modul cu cel in care le selectez nu ma0 folosesc de $pdo dar nu am mai schimbat dupa ce am realizat
$addClient = $libraryQuerry->addClientToDatabase('clients', 'nameStudent', 'typeStudent', 'name_student', 'type_student');
$addBook = $libraryQuerry->addBookToDatabase('books', 'postName', 'postPages', 'postAuthor', 'postGenre', 'book_name', 'pages', 'author', 'genre', 'type_student');

// method that display book info if is serched in to form
$displayBookInfo = $libraryQuerry->searchTabelInfo($books, 'book', 'book_name', 'pages', 'author', 'genre',  'book');

// display data from database
$displayBooksName = $libraryQuerry->displayTargetFromDatabase($books, 'book', 'book_name', 'Books name');
$displayClientsName = $libraryQuerry->displayTargetFromDatabase($clients, 'client', 'name_student', 'Clients Name');

// display data from database whit condition
$clientsThatAreStudents = $libraryQuerry->displayTargetFromDatabaseWithCondition($clients, 'type_student', 'name_student', 'Clients That Are Students', 'student');
$booksAvailebel = $libraryQuerry->displayTargetFromDatabaseWithCondition($books, 'asigned_to', 'book_name', 'Books Availebel', null);

// $deleteClient= $libraryQuerry->deletClientUsingName($clients,'name_student' ); PROBLEM?! 

require 'view.index.php';
