<?php


function isUserLoggedIn()
{
    return isset($_SESSION['loginUser']);
}

function logoutUser()
{
    unset($_SESSION['loginUser']);
}



// create user
function createUser($name, $username, $email, $password)
{
    global $pdo;
    $sql = "INSERT INTO users (name, username, email, password) values (:name, :username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
    $stmt->execute();
    // return true or false depending on user creation
    return $stmt->rowCount();
}

// check for username existance in database
function isUsernameExist($username) {

    global $pdo;

    $sql = "SELECT * from users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);

    return $stmt->fetchAll() ? true : false;
}

// check for email existance in database
function isEmailExist($email) {
    global $pdo;
    $sql = "SELECT * from users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    return $stmt->fetchAll() ? true : false;
}




function loginUser($username, $password) 
{
    global $pdo;

    $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);
    
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    if ($user)
    {
        if (password_verify($password, $user->password)) {
            $_SESSION['loginUser'] = [
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email
            ];
            return true;
        }
    }

    return false;
}