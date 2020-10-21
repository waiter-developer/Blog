<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'config/d_b.php';

$arcticleId = $_GET['id']?? '';

$stmt = $pdo -> prepare('SELECT * FROM `blog_article` WHERE id=?');
$stmt -> execute(array($arcticleId));
$row = $stmt -> fetch();

//SELECT * FROM blog_article INNER JOIN blog_users WHERE blog_article.user_id = blog_users.id

?>
<div class="wrapper_container_details">
    <div class="container">
        <div class="row">
            <div class="card col-lg-9 card_details" >
                <div class="container_details_img">
                    <img class="card-img-top container_img" src="<?php echo $row['image'];?>" alt="Card image cap">
                    <div class="container_details_img_date">
                        <span class="container_details_img_date--number">24</span>
                        <span class="container_details_img_date--month">DEC</span>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card_title"><?php echo $row['title']?></h5>
                    <div class="card_details_admin">
                        <div class="card_details_admin_item"><p class="details_admin_item-icon person"><i class="far fa-user"></i><span class="link_empty">By Admin</span></p></div>
                        <div class="card_details_admin_item"><a href="readePage.php?delete=<?php echo $row['id']?>" class="details_admin_item-icon delete" onclick="return confirm('Are you really sure delete?')"><span><i class="far fa-trash-alt"></i></span><span class="link_empty">Delete article</span></a></div>
                        <div class="card_details_admin_item"><a href="edit.php?id=<?php echo $row['id']?>" class="details_admin_item-icon edit"><span><i class="far fa-edit"></i></span><span class="link_empty">Edit article</span></a></div></div>
                    <div class="card_text"><?php echo $row['text']?></div>
                    <div class="wrapper_card_details_social">
                            <div class="card_details_link_social">
                            <ul class="card_details_link_social_list">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                        <div class="card_details_tag">
                            <p><span class="card_details_tag--icon"><i class="fas fa-tags"></i>Tag:</span><span class="card_details_tag--text"><?php echo $row['tags'];?></span></p>
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

