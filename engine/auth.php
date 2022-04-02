<?php

function is_admin()
{
    return ($_SESSION['role'] == 1) ? true : false;
}

function is_auth()
{
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        $user = getOneResult("SELECT * FROM `users` WHERE `hash`='{$hash}'");
        $login = $user['login'];
        if (!empty($login)) {
            $_SESSION['login'] = $login;
        }
    }
    return isset($_SESSION['login']) ? true : false;
}

function getUserLogin()
{
    return $_SESSION['login'];
}

function regUser($login, $pass)
{
    if (!empty($login) && !empty($pass)) {
        $verifedLogin = securityInput(getDb(), $login);
        $verifedPass = securityInput(getDb(), $pass);
        if (checkLogin($verifedLogin)) {
            $pass_hash = password_hash($verifedPass, PASSWORD_DEFAULT);
            executeSql("INSERT INTO `users`(`login`, `pass`) VALUES ('{$verifedLogin}','{$pass_hash}')");

            return 'reg_ok';
        } else {
            return 'reg_repeat';
        }
    } else {
        return 'empty_input';
    }
}

function checkLogin($login)
{
    $result = getOneResult("SELECT `login` FROM `users` WHERE `login` = '{$login}'");
    return $result ? false : true;
}

function auth($login, $pass)
{
    $login = securityInput(getDb(), $login);
    $password = securityInput(getDb(), $pass);
    $user = getOneResult("SELECT * FROM users WHERE `login` = '{$login}'");

    if (password_verify($password, $user['pass'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        return true;
    }
    return false;
}

function doLoginAction($login, $pass, $params)
{
    if (isset($_POST['reg'])) {
        $message = regUser($login, $pass);
        header("Location: /surfhouse/?message={$message}");
        die();
    } elseif (isset($_POST['auth'])) {
        if (!auth($login, $pass)) {
            $params['allow'] = false;
            header("Location: /surfhouse/?message=wrong_auth");
            die();
        } else {
            if (isset($_POST['saveUser'])) {
                $hash = uniqid(rand(), true);
                $id = securityInput(getDb(), $_SESSION['id']);
                $result = executeSql("UPDATE `users` SET `hash` = '{$hash}' WHERE users.id = '{$id}'");
                setcookie("hash", $hash, time() + 3600 * 24 * 7);
            }
            $params['allow'] = true;
            $params['user_login'] = getUserLogin();
            header("Location: /surfhouse");
            die();
        }
    }

    return $params;
}
