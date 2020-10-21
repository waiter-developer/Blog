<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'config/d_b.php';

$arrMonths = array(
        '01' => 'JAN',
        '02' => 'FEB',
        '03' => 'MAR',
        '04' => 'APR',
        '05' => 'MAY',
        '06' => 'JUN',
        '07' => 'JUL',
        '08' => 'AUG',
        '09' => 'SEP',
        '10' => 'OCT',
        '11' => 'NOV',
        '12' => 'DEC',
);

$stmt  = $pdo->query('SELECT * FROM `blog_article`')->fetchAll();

$data = $stmt;

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
                            24
                        </span>
                        <span class="container_news_img_date--month">
                            DEC
                        </span>
                    </div>
                </div>
                <div class="card-body container_news_body">
                    <h5 class="card_title"><?php echo $value['title'];?></h5>
                    <div class="card_text"><?php echo $value['text']?></div>
                    <div>
                        <a href="readePage.php?id=<?php echo $value['id'];?>" class="container_news_btn">More</a>
                        <span><img src="Images/message.png"><span class="container_news_comment">06 Comments</span></span>
                        <span><img src="Images/heart_icon.png"><span class="container_news_like">31 Likes</span></span>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3">
                <div class="pagination">
                    <ul class="pagination_list">
                        <li><a href="#"><i class="fas fa-chevron-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
