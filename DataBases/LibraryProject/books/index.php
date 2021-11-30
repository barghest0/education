<?php
include_once "../connection.php";

$books;

if ($_GET['genres'] || $_GET['publishers']) {
    $sth = $pdo->prepare('SELECT lib_books.id, lib_books.name, lib_publishers.name as publisher, lib_genres.name as genre FROM lib_books 
    JOIN lib_publishers ON lib_books.id_publisher=lib_publishers.id 
    JOIN lib_genres ON lib_books.id_genre=lib_genres.id where lib_books.id_genre=:genre OR lib_books.id_publisher=:publisher');
    $sth->execute([
        ':genre' => $_GET['genres'],
        ':publisher' => $_GET['publishers']
    ]);
    $books = $sth->fetchAll();
} else {
    $sth = $pdo->prepare('SELECT lib_books.id, lib_books.name, lib_publishers.name as publisher, lib_genres.name as genre FROM lib_books 
    JOIN lib_publishers ON lib_books.id_publisher=lib_publishers.id 
    JOIN lib_genres ON lib_books.id_genre=lib_genres.id');
    $sth->execute();
    $books = $sth->fetchAll();
}



$sthGenres = $pdo->prepare('SELECT * FROM lib_genres');
$sthGenres->execute();
$genres = $sthGenres->fetchAll();

$publishers = $pdo->prepare('SELECT * FROM lib_publishers');
$publishers->execute();
$publishers = $publishers->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="../index.php">
        <- Вернуться назад</a>
            <h1>Книги</h1>
            <form action="">
                <select name="genres" id="">
                    <option value="" selected disabled>Жанры</option>
                    <?php
                    foreach ($genres as $genre) {
                        echo '<option value="' . $genre['id'] . '">' . $genre['name'] . '</option>';
                    } ?>
                </select>
                <select name="publishers" id="">
                    <option value="" selected disabled>Издательства</option>
                    <?php
                    foreach ($publishers as $publisher) {
                        echo '<option value="' . $publisher['id'] . '">' . $publisher['name'] . '</option>';
                    } ?>
                </select>
                <button type="submit">Найти</button>
            </form>
            <?php
            foreach ($books as $book) {
                echo 'Название: ' . $book['name'] . '<br> ' . 'Издательство: ' . $book['publisher'] . '<br> ' . 'Жанр: ' . $book['genre'] . '<br>' . '<a href="book.php?id=' . $book['id'] . '">Перейти -></a><br>';
            }
            ?>
</body>

</html>