<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'config/d_b.php';



$articleId = $_GET['id']?? '';

if(isset($_POST['updateArticle'])){

    $targetDir = "uploads";

    if( ! is_dir( $targetDir )) {
        mkdir( $targetDir, 0777 );
    }

    $imageName = $_FILES['image']['name'];

    $imagePath = $targetDir .'/'. basename($_FILES['image']['name']);

    move_uploaded_file($_FILES['image']['tmp_name'],"$targetDir/$imageName");

    $data = array(
        'id'      => $articleId,
        'title'    => $_POST['name'],
        'text'    => $_POST['content'],
        'tags'    => $_POST['tags'],
        'image'   => $imagePath
    );

    $stmt= $pdo->prepare("UPDATE `blog_article` SET `title`=:title, `text`=:text, `tags`=:tags, `image`=:image WHERE `id`=:id");
    $stmt->execute($data);

    header('Location: index.php');
}


$stmt = $pdo -> prepare('SELECT * FROM `blog_article` WHERE id=?');
$stmt -> execute(array($articleId));
$row = $stmt -> fetch();

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
    <title>Edit</title>
</head>
<body>
<div class="wrapper_article_sand_box">
    <div class="container">
        <div class="row">
            <div class="card col-lg-9 article_sand_box">
                <form action="" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="formGroupExampleInput">Name article</label>
                        <input type="text" class="form-control" name="name" id="formGroupExampleInput" value="<?php echo $row['title']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Content of article</label>
                        <textarea class="form-control" id="editor" rows="3" name="content" >
                            <?php echo $row['text']?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="tag">Tags</label>
                        <input type="text" class="form-control" name="tags" id="tag" value="<?php echo $row['tags'];?>">
                    </div>
                    <div class="upload_btn_wrapper">
                        <button class="btn_down">Upload image</button>
                        <input type="file" class="upload_input" name="image" required>
                    </div>
                    <br>
                    <div class="box_submit">
                        <input type="submit" name="updateArticle" class="article_sand_box--submit" value="Edit Article">
                    </div>
                </form>
            </div>
        </div>
    </div>
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

