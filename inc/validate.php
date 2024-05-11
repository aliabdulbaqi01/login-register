<?php
// to get all the data from a storage file as an array
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

// to check if the email is exit or not 
function isEmailExist($email)
{
    $allData = getAllData("storage/user.json");
    foreach ($allData as $one) {
        if ($one['email'] == $email) {
            return true;
        } else {
            return false;
        }
    }
}

// to get the last id in a storage
function getLastId($file)
{
    $allData = getAllData($file);
    $id = 0;
    foreach ($allData as $one) {
        if ($one['id'] > $id) {
            $id = $one['id'];
        }
    }
    return $id;
}
function validEmail($email)
{
    if (!empty($email)) {
        if (!isEmailExist($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
        }
    }
    return false;
}
function validUsername($username)
{
    if (!isUserExist($username)) {
        if (strlen($username) >= 6) {
            if (preg_match('/[a-z]/i', $username)) {
                if (preg_match('/[0-9]/', $username)) {
                    return true;
                }
            }
        }
    }

    return false;
}
function validPassword($password)
{
    if (strlen($password) >= 8) {
        if (preg_match('/[a-z]/i', $password)) {
            if (preg_match('/[A-Z]/', $password)) {
                if (preg_match('/[0-9]/', $password)) {
                    return true;
                }
            }
        }
    }
    return false;
}
