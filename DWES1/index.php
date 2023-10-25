<?php
$books = [
    [
        "title" => "The Great Gatsby",
        "author" => "F. Scott Fitzgerald",
        "url" => "https://www.amazon.com/Great-Gatsby-F-Scott-Fitzgerald/dp/0743273567",
        "year" => 1925
    ],
    [
        "title" => "To Kill a Mockingbird",
        "author" => "Harper Lee",
        "url" => "https://www.amazon.com/Kill-Mockingbird-Harper-Lee/dp/0446310786",
        "year" => 1960
    ],
    [
        "title" => "1984",
        "author" => "George Orwell",
        "url" => "https://www.amazon.com/1984-Signet-Classics-George-Orwell/dp/0451524934",
        "year" => 1949
    ],
    [
        "title" => "The Catcher in the Rye",
        "author" => "J.D. Salinger",
        "url" => "https://www.amazon.com/Catcher-Rye-J-D-Salinger/dp/0316769487",
        "year" => 1951
    ],
    [
        "title" => "Pride and Prejudice",
        "author" => "Jane Austen",
        "url" => "https://www.amazon.com/Pride-Prejudice-Jane-Austen/dp/0486284735",
        "year" => 1813
    ],
    [
        "title" => "The Hobbit",
        "author" => "J.R.R. Tolkien",
        "url" => "https://www.amazon.com/Hobbit-J-R-Tolkien/dp/054792822X",
        "year" => 1937
    ],
    
];

$authorFilteredList = array_filter($books, function ($book) {
    return $book["author"] === "J.D. Salinger";
});

$yearFilteredList = array_filter($books, function ($book) {
    return $book["year"] > 1950 && $book["year"] < 2000;
});


require "index.view.php";