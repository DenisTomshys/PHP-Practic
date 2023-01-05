<?php

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/functions.php';

function clear_data($val){
    $val = trim($val); //очищаем пробелы
    $val = stripslashes($val); // очищаем слэш
    $val = strip_tags($val); // очищаемhtml символы
    $val = htmlspecialchars($val); // преобразуем html символы в спец сущности
    return $val;
}

$login = clear_data($_POST['login']);
$password = clear_data($_POST['password']);
$confirm_password = clear_data($_POST['confirm-password']);
$email = clear_data($_POST['email']);
$name = clear_data($_POST['name']);

/*function validate_name($login) {
    $err=""; // присваиваем переменной $err пустую строку 
    if(strlen($login)<6) // если длина переменной $data меньше 6
        $err = "Minimum of 6 characters"; 
    if (preg_match('/^[a-zA-Z]*$/',$login)) // если в имени содержатся недопустимые символы 
        $err = $err . "<p>Latin letters only</p>";
    if(!empty($err))
        return($err);
    else
        return 0;
}*/


$pattern_login = '/^[A-Za-z0-9]*$/';
$pattern_password = '/^[a-z]*$/';
$pattern_name = '/^[A-z]*$/';
$err = [];
$flag = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (!preg_match($pattern_login, $login)){
        $err['login'] = '<p class="text-danger">Latin letters only</p>';
        $flag = 1;
    }
    if (mb_strlen($login) < 6){
        $err['login'] = '<p class="text-danger">Minimum of 6 characters</p>';
        $flag = 1;
    }
    if (empty($login)){
        $err['login'] = '<p class="text-danger">The field cannot be empty</p>';
        $flag = 1;
    }

    if (!preg_match($pattern_password, $password)){
        $err['password'] = '<p class="text-danger">Latin letters only</p>';
        $flag = 1;
    }
    if (mb_strlen($password) < 6){
        $err['password'] = '<p class="text-danger">Minimum of 6 characters</p>';
        $flag = 1;
    }
    if (empty($password)){
        $err['password'] = '<p class="text-danger">The field cannot be empty</p>';
        $flag = 1;
    }

    if ($_POST['password'] != $_POST['confirm-password']){
        $err['confirm-password'] = '<p class="text-danger">Enter the password again</p>';
        $flag = 1;
    }
    if (empty($confirm_password)){
        $err['confirm-password'] = '<p class="text-danger">The field cannot be empty</p>';
        $flag = 1;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $err['email'] = '<p class="text-danger">Wrong format!</p>';
        $flag = 1;
    }
    if (empty($email)){
        $err['email'] = '<p class="text-danger">The field cannot be empty</p>';
        $flag = 1;
    }

    if (!preg_match($pattern_name, $name)){
        $err['name'] = '<p class="text-danger">Latin letters only</p>';
        $flag = 1;
    }
    if (mb_strlen($name) < 2){
        $err['name'] = '<p class="text-danger">Minimum of 2 characters</p>';
        $flag = 1;
    }
    if (empty($name)){
        $err['name'] = '<p class="text-danger">The field cannot be empty</p>';
        $flag = 1;
    }
    if ($flag == 0){
        Header("Location:". $_SERVER['HTTP_REFERER']."?mes=success");
    }
}

if ($_GET['mes'] == 'success'){
    $err['success'] = '<div class="alert alert-success">The form has been successfully submitted!</div>';
    
}

