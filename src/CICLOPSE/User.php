<?php
/**
 * Created by PhpStorm.
 * User: Rick
 * Date: 10/15/2018
 * Time: 11:52 AM
 */

namespace CICLOPSE;

/**
 * Class User
 * @package CICLOPSE
 * @property int user_id
 * @property string login_name
 * @property string password
 * @property string password_expires
 * @property string real_name
 * @property string email
 * @property string jira_login
 * @property string jira_password
 * @property int enable_message
 * @property string message
 * @property string preferences
 * @property string group_id
 * @property string last_login
 * @property string password_reset
 * @property string password_reset_time
 * @property string last_update
 * @property int last_update_user
 * @property string created
 * @property int deactivated
 * @property string last_failed_login
 */
class User extends Standard
{
    private $user_id;
    private $login_name;
    private $password;
    private $password_expires;
    private $real_name;
    private $email;
    private $preferences;
    private $group_id;
    private $last_login;
    private $password_reset;
    private $password_reset_time;
    private $last_update;
    private $last_update_user;
    private $created;
    private $deactivated;
    private $last_failed_login;

    /**
     * User constructor.
     * @param int $user_id
     */
    public function __construct($user_id)
    {
        $user_information = \CICLOPSE\Database::select(CICLOPSE_DATABASE, "SELECT user_id, login_name, password, password_expires, real_name, email, preferences, group_id, last_login, password_reset, password_reset_time, last_update, last_update_user, created, deactivated, last_failed_login FROM user WHERE user_id = ? LIMIT 1;", [$user_id]);
        $this->user_id = $user_information->user_id;
        $this->login_name = $user_information->login_name;
        $this->password = $user_information->password;
        $this->password_expires = $user_information->password_expires;
        $this->real_name = $user_information->real_name;
        $this->email = $user_information->email;
        $this->preferences = $user_information->preferences;
        $this->last_login = $user_information->last_login;
        $this->password_reset = $user_information->password_reset;
        $this->password_reset_time = $user_information->password_reset_time;
        $this->last_update = $user_information->last_update;
        $this->last_update_user = $user_information->last_update_user;
        $this->created = $user_information->created;
        $this->deactivated = $user_information->deactivated;
        $this->last_failed_login = $user_information->last_failed_login;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getLoginName()
    {
        return $this->login_name;
    }

    /**
     * @param string $login_name
     */
    public function setLoginName($login_name)
    {
        $this->login_name = $login_name;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = crypt($password);
    }

    /**
     * @return string
     */
    public function getPasswordExpires()
    {
        return $this->password_expires;
    }

    /**
     * @param string $password_expires
     */
    public function setPasswordExpires($password_expires)
    {
        $this->password_expires = $password_expires;
    }

    /**
     * @return string
     */
    public function getRealName()
    {
        return $this->real_name;
    }

    /**
     * @param string $real_name
     */
    public function setRealName($real_name)
    {
        $this->real_name = $real_name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPreferences()
    {
        return $this->preferences;
    }

    /**
     * @param string $preferences
     */
    public function setPreferences($preferences)
    {
        $this->preferences = $preferences;
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param string $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @return string
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * @param string $last_login
     */
    public function setLastLogin($last_login)
    {
        $this->last_login = $last_login;
    }

    /**
     * @return string
     */
    public function getPasswordReset()
    {
        return $this->password_reset;
    }

    /**
     * @param string $password_reset
     */
    public function setPasswordReset($password_reset)
    {
        $this->password_reset = $password_reset;
    }

    /**
     * @return string
     */
    public function getPasswordResetTime()
    {
        return $this->password_reset_time;
    }

    /**
     * @param string $password_reset_time
     */
    public function setPasswordResetTime($password_reset_time)
    {
        $this->password_reset_time = $password_reset_time;
    }

    /**
     * @return string
     */
    public function getLastUpdate()
    {
        return $this->last_update;
    }

    /**
     * @param string $last_update
     */
    public function setLastUpdate($last_update)
    {
        $this->last_update = $last_update;
    }

    /**
     * @return int
     */
    public function getLastUpdateUser()
    {
        return $this->last_update_user;
    }

    /**
     * @param int $last_update_user
     */
    public function setLastUpdateUser($last_update_user)
    {
        $this->last_update_user = $last_update_user;
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param string $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return int
     */
    public function getDeactivated()
    {
        return $this->deactivated;
    }

    /**
     * @param int $deactivated
     */
    public function setDeactivated($deactivated)
    {
        $this->deactivated = $deactivated;
    }

    /**
     * @return string
     */
    public function getLastFailedLogin()
    {
        return $this->last_failed_login;
    }

    /**
     * @param string $last_failed_login
     */
    public function setLastFailedLogin($last_failed_login)
    {
        $this->last_failed_login = $last_failed_login;
    }

    public function commit()
    {
        $session_user = self::decode($_SESSION['CICLOPSEUser']);
        if ($session_user->getUserId()) {
            if ($this->getUserId()) {
                Database::execute(CICLOPSE_DATABASE, "UPDATE user SET login_name = ?, password = ?, password_expires = ?, real_name = ?, email = ?, preferences = ?, last_login = ?, password_reset = ?, password_reset_time = ?, last_update = NOW(), last_update_user = ?, created = ?, deactivated = ?, last_failed_login = ? LIMIT 1;", [$this->getLoginName(), $this->getPassword(), $this->getPasswordExpires(), $this->getRealName(), $this->getEmail(), $this->preferences, $this->getGroupId(), $this->getLastLogin(), $this->getPasswordReset(), $this->getPasswordResetTime(), $session_user->getUserId(), $this->getCreated(), $this->getDeactivated(), $this->getLastFailedLogin()]);
            } else {
                Database::execute(CICLOPSE_DATABASE, "INSERT INTO user (login_name, password, password_expires, real_name, email, preferences, last_login, password_reset, password_reset_time, last_update, last_update_user, created, deactivated, last_failed_login) VALUES (?,?,?,?,?,?,?,?,?,NOW(),?,NOW(),?,?);", [$this->getLoginName(), $this->getPassword(), $this->getPasswordExpires(), $this->getRealName(), $this->getEmail(), $this->preferences, $this->getGroupId(), $this->getLastLogin(), $this->getPasswordReset(), $this->getPasswordResetTime(), $session_user->getUserId(), $this->getCreated(), $this->getDeactivated(), $this->getLastFailedLogin()]);
            }
        }
    }

    public static function authenticate($user_name, $password)
    {
        $user_information = Database::select(CICLOPSE_DATABASE, "SELECT user_id FROM user WHERE login_name = ? LIMIT 1;",[$user_name]);
        $user = new User($user_information->user_id);
        if (crypt($password, $user->getPassword()) == $user->getPassword() && $user->getDeactivated() != 1) {
            //$_SESSION['CICLOPSEUser'] = self::encode($user);
            //$_SESSION['LoginTime'] = time();
            $user->setLastLogin(date('Y-m-d H:i:s', time()));
            var_dump($user);
            //$user->commit();
            //header("Location: {$_SERVER['HTTP_REFERER']}");
            die();
        } else {
            throw new \Exception("CICLOPSE EXCEPTION: Password not correct for given user\n");
        }
    }
}