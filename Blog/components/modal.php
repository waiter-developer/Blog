<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'config/d_b.php';

$stmt = $pdo -> prepare('SELECT * FROM `blog_users` WHERE `id`=?');
$stmt -> execute(array($_SESSION['user_id']??''));
$row = $stmt -> fetch();

?>
<div class="wrapper_register_form">
        <?php if(isset($_SESSION['auth']) != null){?>
            <div class="modal_window_myprofil">
                <header class="mb-4">
                    <h4 class="card-title" style="font-size: 4em; text-align: center;">
                        <i class="fas fa-user-circle" style="box-shadow: 0px 0px 10px 4px orange;border-radius: 50%"></i>
                    </h4>
                </header>
                <h3 class="modal_window_myprofil--title" >Hello! <br>We are happy see you!</h3>
                <p class="modal_window_myprofil--fio"><?php echo $row['name']?? '' ?></p>
                <p class="text-center modal_window_myprofil--text">You can create a new article, just <a href="createPage.php?id=<?php echo $_SESSION['user_id']?>">Click right here</a></p>
                <hr>
                <p><a href="../Blog/Logout.php"><i class="fas fa-door-open"></i>Logout</a></p>
            </div>
<?php } else {?>
    <div class="register_form">
        <article class="card-body">
            <h4 class="card-title mb-4 mt-1">Sign in</h4>
            <span class="jsLogResponse"></span>
            <form action="ajax.php" id="jsLoginForm" method="post" class="jsValidForm">
                <div class="jsValidFormGroup form-group">
                    <label>Your email</label>
                    <input class="jsValidInput form-control" placeholder="Email" type="text"  name="email" >
                    <span class="jsValidResponseEmail register_form_error"></span>
                </div>
                <div class="jsValidFormGroup form-group">
                    <label>Your password</label>
                    <input class="jsValidInput form-control" placeholder="***********" type="password" name="password">
                    <span class="jsValidResponsePassword register_form_error"></span>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block register_form_sing_submit"><i class="fas fa-sign-in-alt"></i> Login  </button>
                </div>
            </form>
            <hr>
            <div>
                <p>Create an account <a href="../Blog/Login.php">Here!</a></p>
            </div>
        </article>
    </div>
        <?php } ?>
</div>




