<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn a language with flashcards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Dit is de flexbox-container die de inhoud en footer naar beneden duwt. -->
<div class="d-flex flex-column min-vh-100">
<?php
// Voeg hier je dynamische menu in
include 'menu.php';
?>

    <div class="flex-grow-1">
