<?php

class DatabaseShell
{
    public $host;
    public $user;
    public $password;
    public $database;

    public function __construct($host, $user, $password, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function save($table, $data)
    {
        $sql = "INSERT INTO $table SET ";
        $params = array();
        foreach ($data as $key => $value) {
            $sql .= "$key = ?, ";
            $params[] = $value;
        }

        $sql = substr($sql, 0, -2);

        $db = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($db);
    }

    public function del($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = ?";

        $db = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($db);
    }

    public function delAll($table, $ids)
    {
        $sql = "DELETE FROM $table WHERE id IN (";
        foreach ($ids as $key => $value) {
            $sql .= "?, ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= ")";

        $db = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, str_repeat('i', count($ids)), ...$ids);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($db);
    }

    public function get($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id = ?";

        $db = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        mysqli_close($db);
        return $row;
    }

    public function selectAll($table, $condition)
    {
        $sql = "SELECT * FROM $table";
        $params = array();
        if ($condition) {
            $sql .= " WHERE ";
            foreach ($condition as $key => $value) {
                $sql .= "$key = ? AND ";
                $params[] = $value;
            }
            $sql = substr($sql, 0, -4);
        }

        $db = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        mysqli_close($db);
        return $rows;
    }

    public function getAll($table, $ids)
    {
        $sql = "SELECT * FROM $table WHERE id IN (";
        foreach ($ids as $key => $value) {
            $sql .= "?, ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= ")";

        $db = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, str_repeat('i', count($ids)), ...$ids);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        mysqli_close($db);
        return $rows;
    }
}
