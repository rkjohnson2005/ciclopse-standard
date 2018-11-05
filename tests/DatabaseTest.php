<?php
/**
 * Created by PhpStorm.
 * User: Rick
 * Date: 11/5/2018
 * Time: 8:12 AM
 */

use \PHPUnit\Framework\TestCase;
use CICLOPSE\Database;

class DatabaseTest extends TestCase
{

    public function testSelectReturnsValidData()
    {
        $this->assertEquals(1,
            count(Database::select(CICLOPSE_DATABASE, "SHOW DATABASES LIKE ?", [CICLOPSE_DATABASE])));
    }

    public function testExecuteProperlyExecutesDatabaseCall()
    {
        Database::execute(CICLOPSE_DATABASE, 'CREATE DATABASE TESTDATABASE');
        $this->assertEquals(1,
            count(Database::select(CICLOPSE_DATABASE, "SHOW DATABASES LIKE ?", ['TESTDATABASE'])));
        Database::execute(CICLOPSE_DATABASE, 'DROP DATABASE TESTDATABASE');
    }
}
