<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'config/d_b.php';

$stmtTags  = $pdo->query('SELECT * FROM `blog_tag`')->fetchAll();
$rowTags = $stmtTags;


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
        'title'   => $_POST['name'],
        'text'    => $_POST['content'],
        'image'   => $imagePath,
        'nowTime' => date('Y/m/d h:i:s', time())
    );


    $arrTags = $_POST['tags'];
    $tagsId = [];

    foreach ($arrTags as $key => $props){

        $stmtTagId = $pdo -> prepare("SELECT `id` FROM `blog_tag` WHERE `tag`=?");
        $stmtTagId -> execute(array($props));
        $something = $stmtTagId -> fetch();
        $other = $something['id'] ?? '';

        if(!empty($other)){
            $tagsId[] = $other;
        }else{
            $stmtTag = $pdo->prepare("INSERT INTO `blog_tag` (`tag`) VALUE (:tag_name)");
            $stmtTag -> execute(array('tag_name' => $props));
            $tagsId[] = $pdo -> lastInsertId();
        }
    }


    $stmtArtTagDel = $pdo->prepare("DELETE FROM `blog_article_tag` WHERE `article_id`=?");
    $stmtArtTagDel -> execute(array($articleId));


    $sqlListArtTag = "INSERT INTO `blog_article_tag` (`article_id`, `tag_id`) VALUES (:article_id, :tag_id)";
    $stmtListArtTag  = $pdo->prepare($sqlListArtTag);
    foreach ($tagsId as $tagId){
        $stmtListArtTag ->execute(array('article_id' => $articleId, 'tag_id' => $tagId));
    }


    $stmt= $pdo->prepare("UPDATE `blog_article` SET `title`=:title, `text`=:text, `image`=:image, `date`=:nowTime WHERE `id`=:id");
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
                        <select type="text" class="form-control" name="tags[]" id="tag">
                            <option></option>
                            <?php foreach($rowTags as $key => $value){?>
                                <option value="<?php echo $value['tag']?>"><?php echo $value['tag']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group article_sand_box-download">
                        <input type="file" id="upload_img" class="form-control article_sand_box-download-btn" name="image" required accept="image/*">
                    </div>
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

