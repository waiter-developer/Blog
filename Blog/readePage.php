<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'config/d_b.php';

if(isset($_GET['delete'])) {
    $deleteRow = $_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM `blog_article` WHERE id = :id");
    $stmt->bindParam(':id', $deleteRow, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/selectize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>News</title>
</head>
<body>
<div class="main_container">
    <header>
        <?php require_once 'components/header.php'?>
    </header>
    <section>
        <?php require_once 'components/blogPromo.php'?>
    </section>
    <main>
        <?php require_once 'details.php'?>
    </main>
    <section>
        <?php require_once 'components/carouselBrands.php'?>
    </section>
    <section>
        <?php require_once 'components/newsLetter.php'?>
    </section>
    <footer>
        <?php require_once 'components/footer.php'?>
    </footer>
</div>

<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/selectize.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>

