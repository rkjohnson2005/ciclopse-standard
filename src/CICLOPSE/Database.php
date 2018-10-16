<?php

namespace CICLOPSE;

class Database extends Standard
{
    public function select($database, $sql, $values = array())
    {
        try {
            $db_handle = new \PDO("mysql:host=" . $database_credentials[$database]['server'] . ";dbname=" . $database . ";charset=utf8", $database_credentials[$database]['user'], $database_credentials[$database]['password']);
        } catch (\PDOException $exception) {
            trigger_error($exception->getMessage(), E_WARNING );
            exit();
        }
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