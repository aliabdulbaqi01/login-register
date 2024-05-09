<?php
session_start();
// function to get all Data as array
function getAllData($file)
{
    $allData = json_decode(file_get_contents($file), true);
    return $allData;
}


// to check if the user is exist or not 
function isUserExist($username)
{
    $allData = getAllData("storage/user.json");
    foreach ($allData as $one) {
        if ($one['username'] == $username) {
            return true;
        } else {
            return false;
        }
    }
}


// function that return the user and its data;
function getUser($username)
{
    $allData = getAllData("storage/user.json");
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
        } else {
            return "password is wrong";
        }
    } else {
        return false;
    }
}


function logout()
{
    session_start();
    session_unset();
    session_destroy();
    header("location:index.php");
}
