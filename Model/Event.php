<?php

namespace PhpLogin;

class Event
{
    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    public function registerEvent()
    {
        if (!empty($_POST["visible"])) {
            $visible = 1;
        } else {
            $visible = 0;
        }
        $query = 'INSERT INTO event (theme, local, visible, category, date) VALUES (?, ?, ?, ?, ?)';
        $paramType = 'ssiss';
        $paramValue = array(
            $_POST["theme"],
            $_POST["local"],
            $visible,
            $_POST["category"],
            $_POST["date"]
        );
        $insertEventRecord = $this->ds->insert($query, $paramType, $paramValue);
        if (!empty($insertEventRecord)) {
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

    public function updateEvent()
    {
        if (!empty($_POST["visible"])) {
            $visible = 1;
        } else {
            $visible = 0;
        }
        $query = 'UPDATE event SET theme = ?, local = ?, visible = ?, category = ?, date = ? WHERE id = ?';
        $paramType = 'ssissi';
        $paramValue = array(
            $_POST["theme"],
            $_POST["local"],
            $visible,
            $_POST["category"],
            $_POST["date"],
            $_POST["event-id"]
        );
        $updateEventRecord = $this->ds->update($query, $paramType, $paramValue);
        if (!empty($updateEventRecord)) {
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

    public function deleteEvent()
    {
        $id = $_POST["event-id"];
        if (!empty($id)) {
            $query = 'DELETE FROM event WHERE id = ?';
            $paramType = 'i';
            $paramValue = array(
                $id
            );
            $deleteEventRecord = $this->ds->delete($query, $paramType, $paramValue);
        }
        if (!empty($deleteEventRecord)) {
            $response = array(
                "status" => "success",
                "message" => "Evento deletado com sucesso."
            );
        } else {
            $response = array(
                "status" => "error",
                "message" => "Oops, algo deu errado."
            );
        }
        return $response;
    }

    public function listEvent($where = null, $order = null, $limit = null)
    {
        $fields = 'a.id, a.theme, a.local, a.visible, a.category, a.date';
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';
        $query = 'SELECT ' . $fields . ' FROM event AS a ' . $where . ' ' . $order . ' ' . $limit;
        $resultEvents = $this->ds->select($query);

        return $resultEvents;
    }

    public function getNumberOfEvents($where = null)
    {
        $fields = 'COUNT(*) AS qdt';
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $query = 'SELECT ' . $fields . ' FROM event ' . $where;
        $resultEvents = $this->ds->select($query);

        return $resultEvents;
    }

    public function getEventById($id)
    {
        $query = 'SELECT * FROM event WHERE id = ?';
        $paramType = 'i';
        $paramValue = array(
            $id
        );
        $eventRecordById = $this->ds->select($query, $paramType, $paramValue);
        return $eventRecordById;
    }
}
