<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'config/d_b.php';

if(isset($_POST['register'])){

    $data = array(
        'name'     => $_POST['name'],
        'surname'  => $_POST['surname'],
        'date'     => $_POST['date'],
        'email'    => $_POST['email'],
        'gender'   => $_POST['gender'],
        'password' => $_POST['password'],
    );

    $sql = "INSERT INTO `blog_users` (`name`, `surname`, `login_email`, `password`, `gender`, `birthday`) VALUES (:name, :surname, :email, :password, :gender, :date)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);

    if($stmt){
        header("Location: index.php");
        exit;
    }
}


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
                <form action="" method="post">
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text"  class="form-control" name="surname" required>
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" class="form-control" name="date" placeholder="dd-mm-yyyy" required>
                    </div>
                    <div class="form-group">
                        <label>Login</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" name="gender" value="male">
                            <span class="custom-control-label"> Male </span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" name="gender" value="female">
                            <span class="custom-control-label"> Female </span>
                        </label>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Create password</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Repeat password</label>
                            <input class="form-control" type="repeatedPassword" required>
                        </div>
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
