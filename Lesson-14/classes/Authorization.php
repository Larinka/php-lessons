<?php

class Authorization
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function isLoggedIn()
    {
        if (empty($_SESSION['user_id'])) {
            header('Location: login.php');
        }
    }

    public function signUp()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->nameIsAlreadyExists($username) == true) {
                $_SESSION['error_reg'] = 'Это имя пользователя занято, попробуйте другое';
                return false;
            }

            if (preg_match("/^[0-9A-Za-z!@#$%]{5,20}$/", $password) !== 1) {
                $_SESSION['error_reg'] = 'Пароль должен состоять только из букв латинского алфавита,
                цифр и специальных символов. Пароль не может быть менее 5 символов.';
                return false;
            }

            $hasher = new PasswordHash(8, false);
            $hash = $hasher->HashPassword($password);

            if (strlen($hash) >= 20) {
                $sth = $this->db->pdo->prepare('INSERT INTO user (login, password) VALUES (:username, :pass)');
                $sth->bindValue(':username', $username, PDO::PARAM_STR);
                $sth->bindValue(':pass', $hash, PDO::PARAM_STR);
                $sth->execute();

                $sth = $this->db->pdo->prepare('SELECT id FROM user WHERE login = :username');
                $sth->bindValue(':username', $username, PDO::PARAM_STR);
                $sth->execute();
                $result = $sth->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['username'] = $username;
                header('Location: index.php');
            } else {
                echo 'Регистрация не удалась, попробуйте заново';
            }
        }
    }

    public function checkLogin()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {

            $hasher = new PasswordHash(8, false);
            $username = $_POST['username'];
            $password = $_POST['password'];
            $stored_hash = "*";

            $sth = $this->db->pdo->prepare('SELECT id, password FROM user WHERE login = :username');
            $sth->bindValue(':username', $username, PDO::PARAM_STR);
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            $stored_hash = $result['password'];

            $check = $hasher->CheckPassword($password, $stored_hash);

            if ($check) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['username'] = $username;
                header('Location: index.php');
            } else {
                $_SESSION['error_login'] = 'Неверно указаны логин или пароль';
            }
        }
    }

    protected function nameIsAlreadyExists($username)
    {
        $sth = $this->db->pdo->prepare('SELECT * FROM user WHERE login = :username');
        $sth->bindValue(':username', $username, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            return true;
        } else {
            return false;
        }
    }
}
