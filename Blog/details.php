<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'config/d_b.php';

$arcticleId = $_GET['id']?? '';

$sessionId = $_SESSION['user_id'] ?? '';
$sessionAuth = $_SESSION['auth'] ?? '';

$stmt = $pdo -> prepare('SELECT *, blog_article.id AS article_id, MONTH(date) AS month, DAY(date) AS day FROM blog_article INNER JOIN blog_users ON blog_users.id = blog_article.user_id WHERE blog_article.id =?');
$stmt -> execute(array($arcticleId));
$row = $stmt -> fetch();

$permissionId = $row['user_id'] ?? '';
$artIdTags = $row['article_id'] ?? '';

$stmtTags = $pdo -> prepare('SELECT tag FROM blog_tag bt INNER JOIN blog_article_tag bat on bt.id = bat.tag_id INNER JOIN blog_article ba on bat.article_id = ba.id WHERE ba.id = ?');
$stmtTags -> execute(array($artIdTags));
$rowTags = $stmtTags -> fetchAll();

?>
<div class="wrapper_container_details">
    <div class="container">
        <div class="row">
            <div class="card col-lg-9 card_details">
                <div class="container_details_img">
                    <img class="card-img-top container_img" src="<?php echo $row['image'];?>" alt="Card image cap">
                    <div class="container_details_img_date">
                        <span class="container_details_img_date--number">
                            <?php echo $row['day']?>
                        </span>
                        <span class="container_details_img_date--month">
                            <?php echo array_search($row['month'], $arrMonths) ?>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card_title"><?php echo $row['title']?></h5>
                    <div class="card_details_admin">
                        <div class="card_details_admin_item"><p class="details_admin_item-icon person"><i class="far fa-user"></i><span class="link_empty"><?php echo $row['name']?></span></p></div>
                        <?php if(($permissionId == $sessionId) && $sessionAuth != null) {?>
                            <div class="card_details_admin_item"><a href="readePage.php?delete=<?php echo $row['article_id']?>" class="details_admin_item-icon delete" onclick="return confirm('Are you really sure delete?')"><span><i class="far fa-trash-alt"></i></span><span class="link_empty">Delete article</span></a></div>
                            <div class="card_details_admin_item"><a href="edit.php?id=<?php echo $row['article_id']?>" class="details_admin_item-icon edit"><span><i class="far fa-edit"></i></span><span class="link_empty">Edit article</span></a></div>
                        <?php }?>
                    </div>

                    <div class="card_text"><?php echo $row['text']?></div>
                    <div class="wrapper_card_details_social">
                            <div class="card_details_link_social">
                                <ul class="card_details_link_social_list">
                                    <li>
                                        <a href="https://www.facebook.com/sharer.php?u=<?php echo 'http://initial.testsite.co.ua/Blog/readePage.php?id='. $row['id']?>&t=<?php echo $row['title']?>" target="_blank" onclick="return Share.me(this);">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/share?url=<?php echo 'http://initial.testsite.co.ua/Blog/readePage.php?id='. $row['id']?>&text=<?php echo $row['title']?>&hashtags=<?php echo $row['tags']?>" target="_blank" onclick="return Share.me(this)">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://plus.google.com/share?url='<?php echo 'http://initial.testsite.co.ua/Blog/readePage.php?id='. $row['id']?>" target="_blank" onclick="return Share.me(this);">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo 'http://initial.testsite.co.ua/Blog/readePage.php?id='. $row['id']?>&description=<?php echo $row['title'] ?>" target="_blank" onclick="return Share.me(this);">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        <div class="card_details_tag">
                                <p><span class="card_details_tag--icon"><i class="fas fa-tags"></i>Tag:</span><span class="card_details_tag--text">
                                            <?php foreach ($rowTags as $point => $props){ ?>
                                                <a href="tagArticlePage.php?tag=<?php echo $props['tag']?>">
                                                    <?php
                                                    echo $props['tag'];
                                                    if($point != count($rowTags)-1) {
                                                        echo ", ";
                                                    }else{
                                                        echo ';';
                                                    }
                                                    ?>
                                                 </a>
                                            <?php }?>
                                    </span>
                                </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 wrapper_sidebar_position">
                <button class="jsButtonSideBarClose button_sidebar_close"><i class="fas fa-times"></i></button>
                <?php require_once 'components/sideBar.php'?>
            </div>
        </div>
    </div>
    <button class="jsButtonSideBar button_sidebar"><i class="fas fa-arrow-circle-left"></i></button>
</div>

