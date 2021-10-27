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
        $query = 'SELECT * FROM member WHERE username = ?';
        $paramType = 's';
        $paramValue = array(
            $username
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }

    public function getMemberById($id)
    {
        $query = 'SELECT * FROM member WHERE id = ?';
        $paramType = 'i';
        $paramValue = array(
            $id
        );
        $memberRecordById = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecordById;
    }

    public function registerLastAcess($username)
    {
        $dateTimeZone = new \DateTime(null, new \DateTimeZone('America/Sao_Paulo')); 
        $last_access = $dateTimeZone->format('Y-m-d H:i:s');
        $query = 'UPDATE member SET last_access = ? WHERE username = ?';
        $paramType = 'ss';
        $paramValue = array(
            $last_access,
            $username
        );
        $updateLastAcess = $this->ds->update($query, $paramType, $paramValue);
        return $updateLastAcess;
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
            $last_access = $this->registerLastAcess($_POST["username"]);
            if (!empty($last_access)) {
                session_start();
                $_SESSION["username"] = $memberRecord[0]["username"];
                $_SESSION["access"] = $memberRecord[0]["id_access_profile"];
                session_write_close();
                $url = "./";
                header("Location: $url");
            }
        } else if ($loginPassword == 0) {
            $loginStatus = "Nome de usuário ou senha inválido.";
            return $loginStatus;
        }
    }

    public function updatePassword($username, $newPassword)
    {
        $query = 'UPDATE member SET password = ? WHERE username = ?';
        $paramType = 'ss';
        $paramValue = array(
            $newPassword,
            $username
        );
        $updatePasswordRecord = $this->ds->update($query, $paramType, $paramValue);
        if (!empty($updatePasswordRecord)) {
            $updatePasswordRecord = 1;
        }else{
            $updatePasswordRecord = 0;
        }
        return $updatePasswordRecord;
    }

    public function updateMember($email, $acessProfile, $id)
    {
        $query = 'UPDATE member SET email = ?, id_access_profile = ? WHERE id = ?';
        $paramType = 'sii';
        $paramValue = array(
            $email,
            $acessProfile,
            $id
        );
        $updateMemberRecord = $this->ds->update($query, $paramType, $paramValue);
        if (!empty($updateMemberRecord)) {
            $updateMemberRecord = 1;
        }else{
            $updateMemberRecord = 0;
        }
        return $updateMemberRecord;
    }

    public function deleteMember()
    {
        $id = $_POST["user-id"];
        if (!empty($id)) {
            $query = 'DELETE FROM member WHERE id = ?';
            $paramType = 'i';
            $paramValue = array(
                $id
            );
            $deleteMemberRecord = $this->ds->delete($query, $paramType, $paramValue);
        }
        if (!empty($deleteMemberRecord)) {
            $response = array(
                "status" => "success",
                "message" => "Usuário deletado com sucesso."
            );
        } else {
            $response = array(
                "status" => "error",
                "message" => "Oops, algo deu errado."
            );
        }
        return $response;
    }

    public function changeMyPassword()
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
                $currentPassword = $this->updatePassword($_POST["username"], $hashedNewPassword);
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

    public function changeProfile()
    {
        $checkMember = $this->getMember($_POST["username"]);
        $id = $_POST["user-id"];
        $email = $_POST["email"];
        $acessProfile = $_POST["acess-profile"];
        if (!empty($checkMember)) {
            if (!empty($_POST["update-password"])) {
                $hashedNewPassword = password_hash($_POST["update-password"], PASSWORD_DEFAULT);
                $resultUpdate = $this->updatePassword($_POST["username"], $hashedNewPassword);
            }
            if($email !== $checkMember[0]["email"] || $acessProfile !== $checkMember[0]["id_access_profile"]){
                $resultUpdate = $this->updateMember($email, $acessProfile, $id);
            }
        } else {
            $resultUpdate = 0;
        }
        if ($resultUpdate == 1) {
            $response = array(
                "status" => "success",
                "message" => "Usuário atualizado com sucesso."
            );
        } else if ($resultUpdate == 0) {
            $response = array(
                "status" => "error",
                "message" => "Oops, algo deu errado."
            );
        }
        return $response;
    }

    public function listMember($where = null, $order = null, $limit = null)
    {
        $fields = 'a.id, a.username, a.email, b.access_profile, a.last_access, a.create_at';
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
        $query = 'SELECT '.$fields.' FROM member as a INNER JOIN access_profile AS b ON a.id_access_profile = b.id '.$where.' '.$order.' '.$limit;
        $resultMembers = $this->ds->select($query);
        
        return $resultMembers;
    }

    public function getNumberOfMembers($where = null)
    {
        $fields = 'COUNT(*) AS qdt';
        $where = strlen($where) ? 'WHERE '.$where : '';
        $query = 'SELECT '.$fields.' FROM member '.$where;
        $resultMembers = $this->ds->select($query);
        
        return $resultMembers;
    }
}