<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();

require_once 'config/d_b.php';

if(isset($_POST['email']) && isset($_POST['password'])){

    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');

    $dataLogin = array(
        'login'    => $_POST['email'],
        'password' => md5($_POST['password'])
    );

    $stmt= $pdo->prepare("SELECT `login_email` FROM `blog_users` WHERE  `login_email` = ?");
    $stmt->execute(array($_POST['email']));
    $user = $stmt-> fetch();

    if($user > 0){

        $stmt = $pdo -> prepare('SELECT * FROM `blog_users` WHERE `login_email`=:login AND `password`=:password');
        $stmt -> execute($dataLogin);
        $row = $stmt -> fetch();

        if(!empty($row)){
            $_SESSION['auth'] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            echo json_encode(array('ok' => 'Successful'));
        }else{

            echo json_encode(array('no' => 'Is invalid email or password. We wish to try one time!'));
        }
    }else {
        echo json_encode(array('no' => 'We do not have this user! I wish you to make a new account yet! Just follow link below'));
    }
}


