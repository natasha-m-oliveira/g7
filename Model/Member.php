<?php
namespace PhpLogin;

class Member
{
    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    public function isUsernameExists($username)
    {
        $query = 'SELECT * FROM member where username = ?';
        $paramType = 's';
        $paramValue = array(
            $username
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function isEmailExists($email)
    {
        $query = 'SELECT * FROM member where email = ?';
        $paramType = 's';
        $paramValue = array(
            $email
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function registerMember()
    {
        $isUsernameExists = $this->isUsernameExists($_POST["username"]);
        $isEmailExists = $this->isEmailExists($_POST["email"]);
        if ($isUsernameExists) {
            $response = array(
                "status" => "error",
                "message" => "Este nome de usuário já existe."
            );
        } else if ($isEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "Este email já está cadastrado."
            );
        } else {
            if (!empty($_POST["signup-password"])) {
                $hashedPassword = password_hash($_POST["signup-password"], PASSWORD_DEFAULT);
            }
            $id_access_profile = 1;
            $query = 'INSERT INTO member (username, password, email, id_access_profile) VALUES (?, ?, ?, ?)';
            $paramType = 'sssi';
            $paramValue = array(
                $_POST["username"],
                $hashedPassword,
                $_POST["email"],
                $id_access_profile
            );
            $memberId = $this->ds->insert($query, $paramType, $paramValue);
            if (!empty($memberId)) {
                $response = array(
                    "status" => "success",
                    "message" => "Registro adicionado com sucesso."
                );
            }
        }
        return $response;
    }

    public function getMember($username)
    {
        $query = 'SELECT * FROM member where username = ?';
        $paramType = 's';
        $paramValue = array(
            $username
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }

    public function loginMember()
    {
        $memberRecord = $this->getMember($_POST["username"]);
        $loginPassword = 0;
        if (!empty($memberRecord)) {
            if (!empty($_POST["login-password"])) {
                $password = $_POST["login-password"];
            }
            $hashedPassword = $memberRecord[0]["password"];
            $loginPassword = 0;
            if (password_verify($password, $hashedPassword)) {
                $loginPassword = 1;
            }
        } else {
            $loginPassword = 0;
        }
        if ($loginPassword == 1) {
            session_start();
            $_SESSION["username"] = $memberRecord[0]["username"];
            $_SESSION["id_access_profile"] = $memberRecord[0]["id_access_profile"];
            session_write_close();
            $url = "./";
            header("Location: $url");
        } else if ($loginPassword == 0) {
            $loginStatus = "Nome de usuário ou senha inválido.";
            return $loginStatus;
        }
    }

    public function updateMember($username, $newPassword)
    {
        $query = 'UPDATE member SET password = ? WHERE username = ?';
        $paramType = 'ss';
        $paramValue = array(
            $newPassword,
            $username
        );
        $updateMemberRecord = $this->ds->update($query, $paramType, $paramValue);
        if (!empty($updateMemberRecord)) {
            $updateMemberRecord = 1;
        }else{
            $updateMemberRecord = 0;
        }
        return $updateMemberRecord;
    }

    public function changeMyPassWord()
    {
        $checkMember = $this->getMember($_POST["username"]);
        $currentPassword = 0;
        if (!empty($checkMember)) {
            if (!empty($_POST["current-password"])) {
                $password = $_POST["current-password"];
            }
            $hashedPassword = $checkMember[0]["password"];
            $currentPassword = 0;
            if (password_verify($password, $hashedPassword)) {
                $hashedNewPassword = password_hash($_POST["new-password"], PASSWORD_DEFAULT);
                $currentPassword = $this->updateMember($_POST["username"], $hashedNewPassword);
            }
        } else {
            $currentPassword = 0;
        }
        if ($currentPassword == 1) {
            $response = array(
                "status" => "success",
                "message" => "Senha alterada com sucesso."
            );
        } else if ($currentPassword == 0) {
            $response = array(
                "status" => "error",
                "message" => "Senha inválida."
            );
        }
        return $response;
    }
}