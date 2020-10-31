<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'config/d_b.php';


$stmtTags  = $pdo->query('SELECT * FROM `blog_tag`')->fetchAll();
$dataTags = $stmtTags;


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
    'image'   => $imagePath
);

$sql = "INSERT INTO `blog_article` (`user_id`, `title`, `text`, `image`) VALUES (:user_id, :name, :text, :image)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);
$articleId = $pdo -> lastInsertId();


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

$sqlListArtTag = "INSERT INTO `blog_article_tag` (`article_id`, `tag_id`) VALUES (:article_id, :tag_id)";
$stmtListArtTag  = $pdo->prepare($sqlListArtTag);
    foreach ($tagsId as $tagId){
        $stmtListArtTag ->execute(array('article_id' => $articleId, 'tag_id' => $tagId));
    }
}

?>
<div class="wrapper_article_sand_box">
    <div class="container">
        <div class="row">
            <div class="card col-lg-9 article_sand_box">
                <span></span>
                <form action="" id="jsCreateArticleForm" class="jsCreateArticleForm" method="post" enctype="multipart/form-data">
                    <div class="jsCreateArticleFormGroup  form-group">
                        <label for="formGroupExampleInput">Name article</label>
                        <input type="text" class="jsCreateArticleInput form-control" name="name" id="formGroupExampleInput" required>
                        <span class="jsCreateArticleResponse"></span>
                    </div>
                    <div class="jsCreateArticleFormGroup  form-group">
                        <label for="editor">Content of article</label>
                        <textarea class="jsCreateArticleText form-control" id="editor" rows="3" name="content"></textarea>
                        <span class="jsCreateArticleResponse"></span>
                    </div>
                    <div class="jsCreateArticleFormGroup  form-group">
                        <label for="tag">Tags</label>
                        <select type="text" class="form-control" name="tags[]" id="tag">
                            <option></option>
                             <?php foreach($dataTags as $key => $value){?>
                                 <option value="<?php echo $value['tag']?>"><?php echo $value['tag']?></option>
                            <?php }?>
                        </select>
                        <span class="jsCreateArticleResponse"></span>
                    </div>
                    <div class="jsCreateArticleFormGroup form-group">
                        <input type="file" class="form-control article_sand_box-download-btn"  name="image" required accept="image/*"><br>
                        <span class="jsCreateArticleFile"></span>
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
