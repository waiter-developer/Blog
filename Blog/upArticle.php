<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'config/d_b.php';


$tagArticle = $_GET['tag'] ?? '';

$stmt  = $pdo->prepare("SELECT *, MONTH(date) AS month, DAY(date) AS day FROM blog_article ba 
                                        INNER JOIN blog_article_tag bat ON bat.article_id = ba.id 
                                        INNER JOIN blog_tag bt ON bt.id = bat.tag_id WHERE bt.tag IN (?)");
$stmt -> execute(array($tagArticle));
$data = $stmt -> fetchAll();

?>
<div class="wrapper_container_news">
    <div class="container">
        <div class="row justify-content-around" >
            <?php foreach ($data as $value){?>
                <div class="card col-sm-12 col-md-6 col-lg-4 news_card">
                    <div class="container_news_img">
                        <img class="card-img-top" src="<?php echo $value['image']?>" alt="<?php echo $value['title'];?>" title="<?php echo $value['title'];?>">
                        <div class="container_news_img_date">
                        <span class="container_news_img_date--number">
                            <?php echo $value['day']?>
                        </span>
                            <span class="container_news_img_date--month">
                            <?php echo array_search($value['month'], $arrMonths) ?>
                        </span>
                        </div>
                    </div>
                    <div class="card-body container_news_body">
                        <h5 class="card_title"><?php echo $value['title'];?></h5>
                        <div class="card_text"><?php echo $value['text']?></div>
                        <div>
                            <a href="readePage.php?id=<?php echo $value['article_id'];?>" class="container_news_btn">More</a>
                            <span><img src="Images/message.png"><span class="container_news_comment">06 Comments</span></span>
                            <span><img src="Images/heart_icon.png"><span class="container_news_like">31 Likes</span></span>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>

