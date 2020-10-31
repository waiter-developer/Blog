<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'config/d_b.php';
session_start();

if(isset($_POST['email']) && isset($_POST['password'])){

    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    $confirm = md5($_POST['confirmPassword']);

    $data = array(
        'name'     => $_POST['name'],
        'surname'  => $_POST['surname'],
        'date'     => $_POST['date'],
        'email'    => $_POST['email'],
        'gender'   => $_POST['gender'],
        'password' => md5($_POST['password'])
    );

    $stmt = $pdo -> prepare('SELECT `login_email` FROM `blog_users` WHERE `login_email`=?');
    $stmt -> execute(array($_POST['email']));
    $row = $stmt -> fetch();

    if($row == 0){

        if($data['password'] == $confirm){
            $sql = "INSERT INTO `blog_users` (`name`, `surname`, `login_email`, `password`, `gender`, `birthday`) VALUES (:name, :surname, :email, :password, :gender, :date)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute($data);
            $lastId = $pdo -> lastInsertId();

            if($stmt){
                $_SESSION['auth'] = true;
                $_SESSION['user_id'] = $lastId;
                echo json_encode(array('ok' => 'Successful'));
            }
        } else{
            echo json_encode(array('no' =>'The password not equally together'));
        }

    }else {
        echo json_encode(array('no' => 'Ooops, The user exist similar email yet!'));
    }
}else{?>
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
    <title>Login</title>
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        body{
            padding: 0 1em;
            background-color: rgba(20, 144, 144, 0.38);
        }
    </style>
</head>
<body>
<div class="wrapper_modal_window_login">
    <div class="modal_window_login">
        <div class="card">
            <article class="card-body">
                <header class="mb-4">
                    <h4 class="card-title" style="font-size: 4em; text-align: center;">
                        <i class="fas fa-user-circle" style="box-shadow: 0px 0px 10px 4px orange;border-radius: 50%"></i>
                    </h4>
                </header>
                <span class="jsRegisterResult"></span>
                <form id="jsRegisterForm"  class="jsRegisterForm" action="Login.php" method="post">
                    <div class="jsRegisterFormGroup form-group">
                        <label>First name</label>
                        <input type="text" name="name" class="jsRegisterInput form-control">
                        <span class="jsRegisterResponse"></span>
                    </div>
                    <div class="jsRegisterFormGroup form-group">
                        <label>Last name</label>
                        <input type="text"  class="jsRegisterInput form-control" name="surname">
                        <span class="jsRegisterResponse"></span>
                    </div>
                    <div class="jsRegisterFormGroup form-group">
                        <label>Birthday</label>
                        <input type="date" class="jsRegisterInput form-control" name="date" placeholder="dd-mm-yyyy">
                        <span class="jsRegisterResponse"></span>
                    </div>
                    <div class="jsRegisterFormGroup form-group">
                        <label>Login</label>
                        <input type="email" class="jsRegisterInput form-control" name="email" placeholder="Email">
                        <span class="jsRegisterEmail"></span>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-radio custom-control-inline" for="login_checkbox_male">
                            <input id="login_checkbox_male" class="custom-control-input login_checkbox_male" type="radio" name="gender" value="male">
                            <span class="custom-control-label">Male</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline" for="login_checkbox_female">
                            <input  id="login_checkbox_female" class="custom-control-input" type="radio" name="gender" value="female">
                            <span  class="custom-control-label">Female</span>
                        </label>
                    </div>
                    <div class="jsRegisterFormGroup form-row">
                        <div class="form-group col-md-6">
                            <label>Create password</label>
                            <input class="jsRegisterInput form-control" type="password" name="password">
                        </div>
                        <div class="jsRegisterFormGroup form-group col-md-6">
                            <label>Repeat password</label>
                            <input class="jsRegisterInput form-control" type="password" name="confirmPassword">
                        </div>
                        <span class="jsRegisterPassword"></span>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" name="register" class="btn btn-primary btn-block register_form_submit" >Register</button>
                    </div>
                </form>
            </article>
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

<?php }?>