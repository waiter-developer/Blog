<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'config/d_b.php';

if(isset($_POST['createArticle'])){

    $targetDir = "uploads";

    if( ! is_dir( $targetDir )) {
        mkdir( $targetDir, 0777 );
    }

    $imageName = $_FILES['image']['name'];

    $imagePath = $targetDir .'/'. basename($_FILES['image']['name']);

    move_uploaded_file($_FILES['image']['tmp_name'],"$targetDir/$imageName");

    $data = array(
        'user_id' => $_GET['id'],
        'name'    => $_POST['name'],
        'text'    => $_POST['content'],
        'tags'    => $_POST['tags'],
        'image'   => $imagePath
    );

    $sql = "INSERT INTO `blog_article` (`user_id`, `title`, `text`, `tags`, `image`) VALUES (:user_id, :name, :text, :tags, :image)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
}
?>
<div class="wrapper_article_sand_box">
    <div class="container">
        <div class="row">
            <div class="card col-lg-9 article_sand_box">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Name article</label>
                        <input type="text" class="form-control" name="name" id="formGroupExampleInput">
                    </div>
                    <div class="form-group">
                        <label for="">Content of article</label>
                        <textarea class="form-control" id="editor" rows="3" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tag">Tags</label>
                        <input type="text" class="form-control" name="tags" id="tag">
                    </div>
                    <div class="upload_btn_wrapper">
                        <button class="btn_down">Upload image</button>
                        <input type="file" class="upload_input" name="image" />
                    </div>
                    <br>
                    <div class="box_submit">
                        <input type="submit" name="createArticle" class="article_sand_box--submit" value="Create article">
                    </div>
                </form>
            </div>
            <div class="col-lg-3 wrapper_sidebar_position">
                <button class="jsButtonSideBarClose button_sidebar_close"><i class="fas fa-times"></i></button>
                <?php require_once 'components/sideBar.php'?>
            </div>
        </div>
    </div>
    <button class="jsButtonSideBar button_sidebar"><i class="fas fa-arrow-circle-left"></i></button>
</div>
