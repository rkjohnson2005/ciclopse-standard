<?php
/**
 * Created by PhpStorm.
 * User: Rick
 * Date: 11/5/2018
 * Time: 8:34 AM
 */

use CICLOPSE\User;
use \PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $test_user;
    protected $test_date;

    public function __construct()
    {
        parent::__construct();
        $this->test_user = new User();
    }

    protected function setUp()
    {
        $this->test_date = date('Y-m-d h:m:s');
    }

    public function testSetPasswordReset()
    {
        $this->test_user->setPasswordResetTime($this->test_date);
        $this->assertEquals($this->test_date,
            $this->test_user->getPasswordResetTime());
    }


    public function testGetPasswordResetTime()
    {
        $this->test_user->setPasswordResetTime($this->test_date);
        $password_reset_time = $this->test_user->getPasswordResetTime();
        $this->assertEquals($this->test_date,
            $password_reset_time);
    }

    public function testSetCreated()
    {
        $this->test_user->setCreated($this->test_date);
        $this->assertEquals($this->test_date,
            $this->test_user->getCreated());
    }

    public function testGetCreated()
    {
        $this->test_user->setCreated($this->test_date);
        $created = $this->test_user->getCreated();
        $this->assertEquals($this->test_date,
            $created);
    }


    public function testSetRealName()
    {
        $this->test_user->setRealName("Test User");
        $this->assertEquals("Test User",
            $this->test_user->getRealName());
    }

    public function testGetRealName()
    {
        $this->test_user->setRealName("Test User");
        $real_name = $this->test_user->getRealName();
        $this->assertEquals("Test User",
           $real_name);
    }

    public function testSetLastLogin()
    {
        $this->test_user->setLastLogin($this->test_date);
        $this->assertEquals($this->test_date,
            $this->test_user->getLastLogin());
    }

    public function testGetLastLogin()
    {
        $this->test_user->setLastLogin($this->test_date);
        $last_login = $this->test_user->getLastLogin();
        $this->assertEquals($this->test_date,
            $last_login);
    }

    public function testSetPasswordExpires()
    {
        $this->test_user->setPasswordExpires($this->test_date);
        $this->assertEquals($this->test_date,
            $this->test_user->getPasswordExpires());
    }

    public function testGetPasswordExpires()
    {
        $this->test_user->setPasswordExpires($this->test_date);
        $password_expires = $this->test_user->getPasswordExpires();
        $this->assertEquals($this->test_date,
            $password_expires);
    }


    public function testSetEmailWithValidEmail()
    {
        $this->test_user->setEmail('test@test.com');
        $this->assertEquals('test@test.com',
            $this->test_user->getEmail());
    }

    public function testSetEmailWithInvalidEmail()
    {
        $this->expectException(Exception::class);
        $this->test_user->setEmail('test.test.com');
    }

    public function testGetEmail()
    {
        $this->test_user->setEmail('test@test.com');
        $email = $this->test_user->getEmail();
        $this->assertEquals('test@test.com',
            $email);
    }

    public function testSetLastFailedLogin()
    {
        $this->test_user->setLastFailedLogin($this->test_date);
        $this->assertEquals($this->test_date,
            $this->test_user->getLastFailedLogin());
    }

    public function testGetLastFailedLogin()
    {
        $this->test_user->setLastFailedLogin($this->test_date);
        $last_failed_login = $this->test_user->getLastFailedLogin();
        $this->assertEquals($this->test_date,
            $last_failed_login);
    }

    public function testContructorLoadsAValidUser()
    {
        \CICLOPSE\Session::init(new \CICLOPSE\MemorySessionAdapter());
        $this->test_user = new User(1);
        $this->assertNotEmpty($this->test_user->getUserId());
    }

    public function testSetPassword()
    {
        $this->test_user->setPassword('testpassword');
        $this->assertTrue(password_verify('testpassword',$this->test_user->getPassword()));
    }

    public function testGetPassword()
    {
        $this->test_user->setPassword('testpassword');
        $password = $this->test_user->getPassword();
        $this->assertTrue(password_verify('testpassword',$password));
    }


    public function testSetDeactivated()
    {
        $this->test_user->SetDeactivated(1);
        $this->assertEquals(1,
            $this->test_user->getDeactivated());
    }

    public function testGetDeactivated()
    {
        $this->test_user->SetDeactivated(1);
        $deactivated = $this->test_user->getDeactivated();
        $this->assertEquals(1,
            $deactivated);
    }

    public function testGetLastUpdateUser()
    {
        $this->test_user->setLastUpdateUser(1);
        $this->assertEquals(1,
            $this->test_user->getLastUpdateUser());
    }

    public function testSetLastUpdateUser()
    {
        $this->test_user->setLastUpdateUser(1);
        $last_update_user = $this->test_user->getLastUpdateUser();
        $this->assertEquals(1,
            $last_update_user);
    }

    public function testSetLoginName()
    {
        $this->test_user->setLoginName('testuser');
        $this->assertEquals('testuser',
            $this->test_user->getLoginName());
    }

    public function testGetLoginName()
    {
        $this->test_user->setLoginName('testuser');
        $login_name = $this->test_user->getLoginName();
        $this->assertEquals('testuser',
            $login_name);
    }

    public function testSetPasswordResetTime()
    {
        $this->test_user->setPasswordResetTime($this->test_date);
        $this->assertEquals($this->test_date,
            $this->test_user->getPasswordResetTime());
    }

    public function testGetPasswordReset()
    {
        $this->test_user->setPasswordResetTime($this->test_date);
        $password_reset_time = $this->test_user->getPasswordResetTime();
        $this->assertEquals($this->test_date,
            $password_reset_time);
    }

    public function testSetPreferencesWithValidData()
    {
        $preferences = ['Test Preference' => 'Test Preference Value'];
        $this->test_user->setPreferences($preferences);
        $this->assertIsArray($this->test_user->getPreferences());
    }

    public function testSetPreferencesWithInvalidData()
    {
        $preferences = "Test Preference";
        $this->expectException(Exception::class);
        $this->test_user->setPreferences($preferences);
    }

    public function testGetPreferences()
    {
        $preferences = ['Test Preference' => 'Test Preference Value'];
        $this->test_user->setPreferences($preferences);
        $this->assertIsArray($this->test_user->getPreferences());
    }

    public function testSetLastUpdate()
    {
        $this->test_user->setLastUpdate($this->test_date);
        $this->assertEquals($this->test_date,
            $this->test_user->getLastUpdate());
    }

    public function testGetLastUpdate()
    {
        $this->test_user->setLastUpdate($this->test_date);
        $last_update = $this->test_user->getLastUpdate();
        $this->assertEquals($this->test_date,
            $last_update);
    }

    public function testSetUserId()
    {
        $this->test_user->setUserId(1);
        $this->assertEquals(1,
            $this->test_user->getUserId());
    }

    public function testGetUserId()
    {
        $this->test_user->setUserId(1);
        $user_id = $this->test_user->getUserId();
        $this->assertEquals(1,
            $user_id);
    }
}
