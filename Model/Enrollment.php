<?php
namespace PhpLogin;

class Enrollment
{
    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    public function registerEnrollment()
    {
        $query = 'INSERT INTO national_mobility (first_name, last_name, email, phone, course, semester, id_home_institution, id_destination_institution) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
        $paramType = 'sssssiii';
        $paramValue = array(
            $_POST["first-name"],
            $_POST["last-name"],
            $_POST["email"],
            $_POST["phone"],
            $_POST["course"],
            $_POST["semester"],
            $_POST["home-institution"],
            $_POST["destination-institution"]
        );
        $insertEnrollmentRecord = $this->ds->insert($query, $paramType, $paramValue);
        if (!empty($insertEnrollmentRecord)) {
            $response = array(
                "status" => "success",
                "message" => "Inscrição realizada com sucesso."
            );
        } else {
            $response = array(
                "status" => "error",
                "message" => "Oops, algo deu errado."
            );
        }
        
        return $response;
    }

    public function updateEnrollment()
    {
        $query = 'UPDATE national_mobility SET theme = ?, local = ?, visible = ?, category = ?, date = ? WHERE id = ?';
        $paramType = 'sssssiiii';
        $paramValue = array(
            $_POST["first-name"],
            $_POST["last-name"],
            $_POST["email"],
            $_POST["phone"],
            $_POST["course"],
            $_POST["semester"],
            $_POST["home-institution"],
            $_POST["destination-institution"],
            $_POST["enrollment-id"]
        );
        $updateEnrollmentRecord = $this->ds->update($query, $paramType, $paramValue);
        if (!empty($updateEnrollmentRecord)) {
            $response = array(
                "status" => "success",
                "message" => "Registro adicionado com sucesso."
            );
        } else {
            $response = array(
                "status" => "error",
                "message" => "Oops, algo deu errado."
            );
        }
        
        return $response;
    }

    public function deleteEnrollment()
    {
        $id = $_POST["enrollment-id"];
        if (!empty($id)) {
            $query = 'DELETE FROM national_mobility WHERE id = ?';
            $paramType = 'i';
            $paramValue = array(
                $id
            );
            $deleteEnrollmentRecord = $this->ds->delete($query, $paramType, $paramValue);
        }
        if (!empty($deleteEnrollmentRecord)) {
            $response = array(
                "status" => "success",
                "message" => "Inscrição excluída com sucesso."
            );
        } else {
            $response = array(
                "status" => "error",
                "message" => "Oops, algo deu errado."
            );
        }
        return $response;
    }

    public function listEnrollment($where = null, $order = null, $limit = null)
    {
        $fields = 'a.id, CONCAT(a.first_name, " ", a.last_name) AS name, a.course, a.semester, b.institution AS home, c.institution AS destination';
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
        $query = 'SELECT '.$fields.' FROM national_mobility AS a INNER JOIN institution AS b ON a.id_home_institution = b.id INNER JOIN institution AS c ON a.id_destination_institution = c.id '.$where.' '.$order.' '.$limit;
        $resultEnrollments = $this->ds->select($query);
        
        return $resultEnrollments;
    }

    public function getNumberOfEnrollments($where = null)
    {
        $fields = 'COUNT(*) AS qdt';
        $where = strlen($where) ? 'WHERE '.$where : '';
        $query = 'SELECT '.$fields.' FROM national_mobility '.$where;
        $resultEnrollments = $this->ds->select($query);
        
        return $resultEnrollments;
    }

    public function getEnrollmentById($id)
    {
        $query = 'SELECT * FROM national_mobility WHERE id = ?';
        $paramType = 'i';
        $paramValue = array(
            $id
        );
        $enrollmentRecordById = $this->ds->select($query, $paramType, $paramValue);
        return $enrollmentRecordById;
    }
}