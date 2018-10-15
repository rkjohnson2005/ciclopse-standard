<?php
/**
 * Created by PhpStorm.
 * User: Rick
 * Date: 10/15/2018
 * Time: 10:40 AM
 */

namespace CICLOPSE;


class Standard implements \StandardInterface
{
    protected $table;
    protected $table_id;
    protected $database;

    public function __construct($table, $database, $id = '')
    {
        $this->table = $table;
        $this->database = $database;
        $this->fields = new \stdClass();
        $DB = new Database();

        $columns = $DB->select($this->database,"SELECT DISTINCT COLUMN_NAME AS Field, COLUMN_TYPE AS Type, IS_NULLABLE AS `Null`, COLUMN_COMMENT AS Comment FROM `information_schema`.`columns` where `table_schema` = '$database' and `table_name` in ($table)");

        $fields = $DB->select($this->database, "SELECT * FROM `{$table}` WHERE {$table}_id = ? LIMIT 1;", [$id]);

        $this->{"{$table}_id"} = (isset($id) && !is_array($id) && !is_object($id) ? $id : (isset($id) && !empty($id) && is_object($id) ? $id->{"{$table}_id"} : ""));
        $this->table_id = $this->{"{$table}_id"};
        foreach ($columns as $column) {
            if ($column->Field != "{$table}_id") {
                $this->fields->{$column->Field} = new \stdClass();
                if (isset($fields->{$column->Field})) {
                    $this->fields->{$column->Field}->value = $fields->{$column->Field};
                }
                $this->fields->{$column->Field}->type = $column->Type;
                $this->fields->{$column->Field}->required = ($column->Null == 'NO' ? 1 : 0);
                $this->fields->{$column->Field}->display = $column->Comment;
            }
        }
    }

    public function getLink($url, $display, $class = '')
    {
        $link = vsprintf("<a class='%s' href='%s'>%s</a>", [$class, $url, $display]);
        return $link;
    }
}