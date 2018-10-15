<?php

namespace CICLOPSE;
include '../database.config';

class Database
{
    public function select($database, $sql, $values = array())
    {
        $db_handle = new \PDO("mysql:host=" . $credentials[$database]['server'] . ";dbname=" . $database . ";charset=utf8", $credentials[$database]['user'], $credentials[$database]['password']);
        $query = $db_handle->prepare($sql);
        if (!$query) {
            trigger_error(print_r($db_handle->errorInfo(), true));
            exit();
        }
        $query->execute($values);
        $query_result = $query->fetchAll(\PDO::FETCH_ASSOC);
        $result = (!stristr($sql, 'LIMIT 1;') ? json_decode(json_encode($query_result)) : (!empty($query_result) ? (object)$query_result[0] : ""));

        return $result;
    }
}