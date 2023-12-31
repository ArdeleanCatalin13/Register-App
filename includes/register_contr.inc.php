<?php
declare(strict_types=1);

function isInputEmpty(string $username, string $pwd, string $email) {
    if (empty($username) || empty($email) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function isEmailInvalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function isUsernameInvalid(string $username) {
    if (strlen($username) < 5) {
        return true;
    } else {
        return false;
    }
}

function isPasswordInvalid(string $pwd) {
    $is_special = preg_match('/[+#!\?*.@]/', $pwd);
    $is_numeric = preg_match('/[0-9]/', $pwd);
    $is_char = preg_match('/[a-zA-Z]/', $pwd);

    if (!$is_special || !$is_numeric || !$is_char || strlen($pwd) < 5) {
        return true;
    } else {
        return false;
    }
}

function isUsernameTaken(object $pdo, string $username) {
    if (getUsername($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function isEmailRegistered(object $pdo, string $email) {
    if (getEmail($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function createUser(object $pdo, string $email, string $pwd, string $username) {
    setUser($pdo, $email, $pwd, $username);
}