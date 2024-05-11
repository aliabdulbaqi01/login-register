<?php
session_start();
include "validate.php";

// function that return the user and its data;
function getUser($username)
{
    $allData = getAllData("../storage/user.json");
    foreach ($allData as $one) {
        if ($one['username'] == $username) {
            return $one;
        } else {
            return false;
        }
    }
}


// fucntion to login
function login($username, $password)
{

    if (isUserExist($username)) {
        $user = getUser($username);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['user'];
            $_SESSION['username'] = $username;
            return true;
        }
            return 2;
        
    } else {
        return false;
    }
}
function clearInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function signUp($username, $email, $password, $user = "admin")
{
    $username = clearInput($username);
    $username = clearInput($email);
    $users = getAllData("storage/user.json");
    $id = getLastId("storage/user.json") + 1;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $users[] = ['id ' => $id, 'username' => $username, 'email' => $email, 'password' => $password, "user" => $user];
    file_put_contents("storage/user.json", json_encode($users, JSON_PRETTY_PRINT));
}

function logout()
{
    session_start();
    session_unset();
    session_destroy();
    header("location:index.php");
}
